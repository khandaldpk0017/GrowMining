<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    //
 
    public function applyCoupon(Request $request)
    {
        $code = $request->input('code');
        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon) {
            return response()->json(['message' => 'Invalid coupon code'], 404);
        }

        if ($coupon->expiration_date && Carbon::now()->gt($coupon->expiration_date)) {
            return response()->json(['message' => 'Coupon has expired'], 400);
        }

        return response()->json(['coupon' => $coupon], 200);
    }
    public function getCoupons(Request $request)
    {
        // $coupon=Coupon::where('user_id',$request->id)->first();
        // if ($coupon->expiration_date && Carbon::now()->gt($coupon->expiration_date)) {
        //     return response()->json(['coupon' => ''], 200);
        // }
        // return response()->json(['coupon' => $coupon], 200);
        $userId = $request->id;

    // Retrieve all coupons where user_id matches or is null and check for expiration
    $coupons = Coupon::where(function ($query) use ($userId) {
        $query->where('user_id', $userId)
              ->orWhereNull('user_id');
    })->where(function ($query) {
        $query->whereNull('expiration_date')
              ->orWhere('expiration_date', '>=', Carbon::now());
    })->get();

    return response()->json(['coupons' => $coupons], 200);
    }
}
