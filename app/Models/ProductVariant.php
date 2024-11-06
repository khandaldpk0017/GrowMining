<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'stock',
        'price',
        'thumbnail_image',
        'images',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getImageUrlAttribute()
    {
        return Storage::url('images/' . $this->thumbnail_image);
    }
    public function getImagesAttribute($value)
    {
        return explode(',', $value);
    }
}
