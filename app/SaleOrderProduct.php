<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrderProduct extends Model
{
    protected $fillable = [
        'sale_order_id', 'product_id', 'quantity', 'value', 'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function saleOrder()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id');
    }
}
