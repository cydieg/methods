<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderID',
        'inventory_id', // Update to inventory_id
        'price',
        'quantity',
        'status',
        'branch_id',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function audit()
    {
        return $this->hasOne(Audit::class, 'sale_id'); // Assuming 'sale_id' is the foreign key in the audits table
    }
    
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
