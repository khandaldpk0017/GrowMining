<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'order_id',
        'amount',
        'tax',
        'customer_name',
        'customer_email',
        'payment_status',
        'payment_method',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
   
}
