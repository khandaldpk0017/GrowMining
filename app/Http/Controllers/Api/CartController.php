<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    //
 
    public function saveCart(Request $request)
    {
        $user = Auth::user();
        $user->cart = json_encode($request->cartItems);
        $user->save();

        return response()->json(['message' => 'Cart saved successfully']);
    }

    public function getCart()
    {
        $user = Auth::user();
        $cartItems = json_decode($user->cart, true);

        return response()->json(['cartItems' => $cartItems]);
    }
}
