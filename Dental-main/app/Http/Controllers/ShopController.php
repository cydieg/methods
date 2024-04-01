<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Inventory;
use App\Models\Audit;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $clinicId = $request->input('clinic_id');
        $clinics = Clinic::all();
        
        // If no clinic ID is provided in the request, get the ID of the first clinic in the database
        if (!$clinicId && $clinics->isNotEmpty()) {
            $clinicId = $clinics->first()->id;
        }
        
        // Fetch inventory items based on the provided or default clinic ID
        $inventoryItems = Inventory::where('clinic_id', $clinicId)->paginate(9);

        return view('shop.shop', compact('inventoryItems', 'clinics', 'clinicId'));
    }
    public function orderProduct(Request $request)
    {
        try {
            // Get product details from the request
            $productId = $request->input('productId');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $clinicId = $request->input('clinicId');
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