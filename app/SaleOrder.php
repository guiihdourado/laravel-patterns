<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'total', 'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function saleOrderProducts()
    {
        return $this->hasMany(SaleOrderProduct::class);
    }
}
