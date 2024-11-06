<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\OrderProduct;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'total_amount',
        'product_id',
        'product_name',
        'perday_earning',
        'total_earning',
        'expire_days',
        
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
