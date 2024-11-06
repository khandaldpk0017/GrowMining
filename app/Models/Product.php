<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'tax_id',
        'stock',
        'thumbnail_image',
        'images',
        'category',
        'status',
        'admin_id',
        'perday_earning',
        'total_earning',
        'expire_days',
    ];

    // Define relationship with OrderTransaction
    public function orderTransactions()
    {
        return $this->hasMany(OrderTransaction::class);
    }   
    public function getImageUrlAttribute()
    {
        return Storage::url('images/' . $this->thumbnail_image);
    }
    public function getImagesAttribute($value)
    {
        return explode(',', $value);
    }
    public function isOutOfStock()
{
    return $this->quantity <= 0;
}
public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}
