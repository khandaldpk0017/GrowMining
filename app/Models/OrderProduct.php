<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_quantity',
        'product_unit_price',
        'tax',
        'total_price'
        ,'thumbnail_image'
        ,'admin_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
