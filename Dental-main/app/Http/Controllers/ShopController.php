<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Clinic;
use App\Models\Audit;
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
}