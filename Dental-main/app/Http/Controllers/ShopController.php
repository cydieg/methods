<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Inventory;
use App\Models\Audit;
use App\Models\Branch; // Update namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $branchId = $request->input('branch_id'); // Update variable name
        $branches = Branch::all(); // Update model name
        
        // If no branch ID is provided in the request, get the ID of the first branch in the database
        if (!$branchId && $branches->isNotEmpty()) {
            $branchId = $branches->first()->id;
        }
        
        // Fetch inventory items based on the provided or default branch ID
        $inventoryItems = Inventory::where('branch_id', $branchId)->paginate(9); // Update field name

        return view('shop.shop', compact('inventoryItems', 'branches', 'branchId')); // Update variable name
    }
    
    public function orderProduct(Request $request)
    {
        try {
            // Get product details from the request
            $productId = $request->input('productId');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $branchId = $request->input('branchId'); // Update variable name
            $status = 'pending'; // Set initial status as pending

            // Generate unique order ID (You can use a more sophisticated method here)
            $orderId = uniqid();

            // Create a new sale record
            $sale = Sale::create([
                'orderID' => $orderId,
                'productID' => $productId,
                'price' => $price,
                'quantity' => $quantity,
                'status' => $status,
            ]);

            // Find the inventory item
            $inventoryItem = Inventory::findOrFail($productId);

            // Update the quantity of the inventory item
            $newQuantity = $inventoryItem->quantity - $quantity;
            $inventoryItem->update(['quantity' => $newQuantity]);

            // Create an audit record
            Audit::create([
                'inventory_id' => $productId,
                'upc' => $inventoryItem->upc,
                'name' => $inventoryItem->name,
                'description' => $inventoryItem->description,
                'old_quantity' => $inventoryItem->quantity,
                'quantity' => $quantity,
                'type' => 'sale', // Indicates this is a sale audit record
            ]);

            // Return the order ID as response
            return response()->json(['orderID' => $orderId]);
        } catch (\Exception $e) {
            // Log or handle the exception
            return response()->json(['error' => 'An error occurred while placing the order.'], 500);
        }
    }
}
