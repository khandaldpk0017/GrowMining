<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
 
    public function index(Request $request)
    {
   
    $query = Product::where('status', 1)->orderBy('price','ASC');

    
    // Paginate the results (e.g., 10 items per page)
    $products = $query->paginate(10);

    // Modify each product to include image_url (if necessary)
    $products->getCollection()->transform(function ($product) {
        if ($product->thumbnail_image) {
            // Get the full URL of the image from storage
            $product->thumbnail_image_url = Storage::url('images/' . $product->thumbnail_image);
        } else {
            // You can set a default image URL if needed
            $product->thumbnail_image_url = null;
        }
        // if ($product->expire_days) {
        //     $product->expire_days = $product->expire_date;
        // }
            return $product;
    });

    return response()->json([
        "success" => true,
        "message" => "Products found successfully",
        "data" => $products
    ]);
    
    }
}
