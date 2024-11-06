<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'product_id',
        'product_name',
        'product_quantity',
        'product_unit_price',
        'total_amount',
        'delivery_fee',
        'tax',
        'order_date',
    ];

    // Define relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
