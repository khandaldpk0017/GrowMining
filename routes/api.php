<?php
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\LevelsController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RazorPayController;
use App\Http\Controllers\Api\TicketChatController;
use App\Http\Controllers\Api\TeamEarningController;
use App\Http\Controllers\Api\OrderProductController;
use App\Http\Controllers\Api\TransactionsController;
use App\Http\Controllers\Api\DepositRequestController;
use App\Http\Controllers\Api\ReferCommissionController;
use App\Http\Controllers\Api\WithdrawRequestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class,'registered']);
Route::post('login', [AuthController::class,'authenticated']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'index']);
    Route::post('/cart', [CartController::class, 'saveCart']);
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::post('/apply-coupon', [CouponController::class, 'applyCoupon']);
    Route::post('/get-coupon', [CouponController::class, 'getCoupons']);

    Route::post('/create-order', [OrderController::class, 'create']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/order-products', [OrderProductController::class, 'index']);


    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
    Route::post('/tickets/{ticket}/chat', [TicketChatController::class, 'store']);

    // razorpay
    Route::post('create-order-payment', [RazorPayController::class, 'createOrder']);
    Route::post('verify-payment', [RazorPayController::class, 'verifyPayment']);
    Route::get('/api/razorpay-key', [RazorPayController::class, 'getRazorpayKey']);

    // wallet 
    Route::get('/wallet', [WalletController::class, 'getWalletBalance']);
    Route::post('/wallet/add', [WalletController::class, 'addMoney']);
    Route::get('/qrcodes/random', [WalletController::class, 'getRandomQrOrUpi']);
    Route::post('/wallet/withdraw', [WalletController::class, 'withdrawMoney']);
    Route::post('/wallet/updateAcDetails', [WalletController::class, 'updateACdetails']);

    Route::get('withdraw-request', [WithdrawRequestController::class, 'index']);
    Route::get('deposit-request', [DepositRequestController::class, 'index']);

    Route::get('levels/{userId}', [LevelsController::class, 'index']);
    Route::get('referrals/level1', [LevelsController::class, 'getLevel1Referrals']);
    Route::get('referrals/level2', [LevelsController::class, 'getLevel2Referrals']);
    Route::get('referrals/level3', [LevelsController::class, 'getLevel3Referrals']);
    // refer commission
    Route::get('refer-commission', [ReferCommissionController::class, 'index']);
    Route::get('transaction', [TransactionsController::class, 'index']);
    Route::get('team-earning', [TeamEarningController::class, 'index']);
});
