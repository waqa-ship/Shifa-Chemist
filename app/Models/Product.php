<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'category', // ✅ new FK field
        'barcode',
        'purchase_price',
        'selling_price',
        'discount',
        'quantity_in_stock',
        'minimum_stock_alert',
        'manufacture_date',
        'expiry_date',
        'added_date',
        'storage_requirements',
        'prescription_required',
        'product_image',
        'description',
    ];

    
    public function medicineCategory()
    {
        return $this->belongsTo(MedicineCategory::class, 'category');
    }
}

