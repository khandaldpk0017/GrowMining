<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Tax;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RazorPayController extends Controller
{
    //
    public function getRazorpayKey()
{
    return response()->json(['key' => config('services.razorpay.key')]);
}
 
    public function createOrder(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'delivery_fee' => 'required|numeric',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
            'cart_items' => 'required|array',
            'cart_items.*.id' => 'required|exists:product_variants,id',
            'cart_items.*.product_id' => 'required|exists:products,id',
            'cart_items.*.name' => 'required|string',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.price' => 'required|numeric',
            'cart_items.*.thumbnail_image' => 'required',
            'cart_items.*.taxRate' => 'required',
            'couponCode' => 'nullable',
        ]);
        foreach ($validatedData['cart_items'] as $item) {
            $product = ProductVariant::find($item['id']);
        
            if ($product->stock >= $item['quantity']) {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $order = $api->order->create([
            'receipt'         => uniqid(),
            'amount' => $request->total_amount * 100, 
            'currency' => 'INR',
            'payment_capture' => 1, 
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount' => $request->total_amount * 100,
            'city'=>$request->city,
            'pincode'=>$request->pincode,
            'country'=>$request->country,
            'total_amount'=>$request->total_amount,
            'state'=>$request->state,
            'address'=>$request->address,
            'couponCode'=>$request->couponCode,
        ]);
    } else {
        return response()->json(['error' => 'Not enough stock for product: ' . $product->name], 400);
    }
}
    }
    public function verifyPayment(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        
        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        ];
        $razorpayOrderId = $request->razorpay_order_id;
    $razorpayPaymentId = $request->razorpay_payment_id;
    $razorpaySignature = $request->razorpay_signature;
    $apiSecret = config('services.razorpay.secret');
        $generatedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, $apiSecret);

        if ($generatedSignature === $razorpaySignature) {
        // try {
            $payment = $api->payment->fetch($request->razorpay_payment_id);

        // Extract payment method
        $paymentMethod = $payment->method; // 'card', 'upi', etc.

            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'user_name' => 'required|string|max:255',
                'user_email' => 'required',
                'total_amount' => 'required|numeric',
                'delivery_fee' => 'required|numeric',
                'address' => 'required|string|max:255',
                'country' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'pincode' => 'required|string|max:10',
                'cart_items' => 'required|array',
                'cart_items.*.id' => 'required|exists:product_variants,id',
                'cart_items.*.product_id' => 'required|exists:products,id',
                'cart_items.*.name' => 'required|string',
                'cart_items.*.quantity' => 'required|integer|min:1',
                'cart_items.*.price' => 'required|numeric',
                'cart_items.*.thumbnail_image' => 'required',
                'cart_items.*.taxRate' => 'required',
                'couponCode' => 'nullable',
                
            ]);
         
            $order = Order::create([
                'user_id' => $validatedData['user_id'],
                'user_name' => $validatedData['user_name'],
                'total_amount' => $validatedData['total_amount'],
                'delivery_fee' => $validatedData['delivery_fee'],
                'address' => $validatedData['address'],
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
                'pincode' => $validatedData['pincode']
            ]);
            $totalWithoutTax=0;
            foreach ($validatedData['cart_items'] as $item) {
                $product = ProductVariant::find($item['id']);
            
                if ($product->stock >= $item['quantity']) {
                    $totalWithoutTax+=$item['price']*$item['quantity'];

                    // Reduce the product quantity
                    $product->stock -= $item['quantity'];
                    // increase order count
                    $product->order_count++;
                    $product->save();
                    $producttotal=$item['price']*$item['quantity'];
                    $tax=$item['taxRate']*$producttotal;
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'product_name' => $item['name'],
                        'admin_id' => Product::where('id',$item['product_id'])->pluck('admin_id')->first(),
                        'product_quantity' => $item['quantity'],
                        'product_unit_price' => $item['price'],
                        'total_price' => $item['price']*$item['quantity'],
                        'thumbnail_image' => $item['thumbnail_image'],
                        'tax' => $tax,
                    ]);
                } else {
                    // Handle the case when there is not enough stock
                    Order::where('id',$order->id)->delete();
                    return response()->json(['error' => 'Not enough stock for product: ' . $product->name], 400);
                }
            }
            // if(isset($order->id)){
                Payment::create([
                    'payment_id'=>$request->razorpay_payment_id,
                    'order_id'=>$order->id,
                    'amount'=>$validatedData['total_amount'],
                    'tax'=>$validatedData['total_amount']-$totalWithoutTax,
                    'customer_name'=>$validatedData['user_name'],
                    'customer_email'=>$validatedData['user_email'],
                    'payment_status'=>'success',
                    'payment_method'=>$paymentMethod,
                ]);
            // }
            if(isset($validatedData['couponCode'])){
                Coupon::where('code',$validatedData['couponCode'])->update(['expiration_date'=>Carbon::now()]);
            }
            return response()->json(['success' => true, 'message' => 'Payment verified successfully.']);
        } else {
            // Signature is invalid
            return response()->json(['status' => 'error', 'message' => 'Invalid signature passed'], 400);
        }
        // } 
        // // catch (\Exception $e) {
        //     catch (ValidationException $e) {
        //         return response()->json([
        //             'status' => 'error',
        //             'message' => 'Validation failed',
        //             'errors' => $e->errors(),
        //         ], 422);
        //     }
        // }
    }

   
}
