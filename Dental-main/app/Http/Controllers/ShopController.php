<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Clinic;
use App\Models\Audit;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::paginate(9); // Paginate with 9 items per page
        return view('shop.shop', compact('inventoryItems'));
    }
}