<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleItem extends Model
{
    protected $fillable = [
        'sale_id','name','mrp','qty','rate','total','disc','tax_amt','cgst','sgst','total_amt'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}

