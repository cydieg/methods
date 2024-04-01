<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Branch;
use App\Models\Audit;
use App\Models\Sale;
use Illuminate\Support\Facades\Log; // Import Log facade for logging

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $branchId = $request->input('branch_id');
        $branches = Branch::all();
        
        if (!$branchId && $branches->isNotEmpty()) {
            $branchId = $branches->first()->id;
        }
        
        $inventoryItems = Inventory::where('branch_id', $branchId)->paginate(9);

        return view('shop.shop', compact('inventoryItems', 'branches', 'branchId'));
    }

    public function orderProduct(Request $request)
    {
        try {
            // Create a new sale record
            $sale = Sale::create([
                'orderID' => uniqid(), 
                'inventory_id' => $request->inventoryId,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => 'pending',
                'branch_id' => $request->branchId,
            ]);
        
            // Log successful sale creation
            Log::info('Sale created successfully. Order ID: ' . $sale->orderID);
        
            // Return the created sale record
            return response()->json(['orderID' => $sale->orderID]);
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while creating sale: ' . $e->getMessage());
            // Return error response
            return response()->json(['error' => 'An error occurred while processing your order. Please try again later.'], 500);
        }
    }
}
