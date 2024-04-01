<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderID',
        'productID',
        'price',
        'quantity',
        'status',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'productID');
    }

    public function audit()
    {
        return $this->hasOne(Audit::class, 'inventory_id', 'productID');
    }
    
}
