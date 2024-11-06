<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        // '_token', // Token for CSRF protection
        'code',
        'discount',
        'type',
        'expiration_date',
        'user_id',
    ];
}
