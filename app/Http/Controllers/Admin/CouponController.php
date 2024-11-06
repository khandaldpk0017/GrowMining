<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\AdminCouponsServiceAll;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    //
    protected $adminCouponsServiceAll;

    
    public function __construct(AdminCouponsServiceAll $adminCouponsServiceAll)
    {
        $this->adminCouponsServiceAll = $adminCouponsServiceAll;
    } public function index()
    {
        return view('admin.coupons.coupons');
    }

    public function getCoupons()
    {
        return $this->adminCouponsServiceAll->view();
    }

    public function create()
    {
        return view('admin.coupons.createCoupon');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'expiration_date' => 'required|date'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Coupon::create($request->all());

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.editCoupon', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'expiration_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $coupon->update($request->all());

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
       
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index');
    }
}