<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_id','customer_name','grand_total'];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
    
}