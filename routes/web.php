<?php

use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\RazorPayController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderProductsController;
use App\Http\Controllers\Admin\DepositRequestController;
use App\Http\Controllers\Admin\ReferCommissionController;
use App\Http\Controllers\Admin\WithdrawRequestController;
use App\Http\Controllers\Admin\OrderTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');
    Route::post('managesignin', [AuthController::class,'ManageSignIn'])->name('admin.ManageSignIn');

    Route::middleware('auth:admin')->group(function () {
        // Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // });
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
        // profile
        Route::get('/profile', [AuthController::class, 'profile'])->name('admin.profile');
        Route::post('/profile-update', [AuthController::class, 'updateProfile'])->name('admin.updateProfile');
        // user
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/add-user',[UserController::class, 'add'])->name('admin.addUser');
        Route::post('/create-user',[UserController::class, 'create'])->name('admin.createUser');
        Route::get('/edit-user/{id}',[UserController::class, 'edit'])->name('admin.editUser');
        Route::post('/update-user',[UserController::class, 'update'])->name('admin.updateUser');
        Route::delete('/delete-user/{id}',[UserController::class, 'delete'])->name('admin.deleteUser');
        // support tickets
        Route::get('/support-tickets',[TicketController::class, 'allTickets'])->name('admin.allTickets');  
        Route::get('/view-tickets/{id}',[TicketController::class, 'viewTickets'])->name('admin.viewTickets');
        Route::post('/reply-chat',[TicketController::class, 'replyChat'])->name('admin.replyChat');
        Route::post('/manage-ticket-status',[TicketController::class, 'managetTicketStatus'])->name('admin.managetTicketStatus');
        

        Route::get('/order-transactions', [OrderTransactionController::class, 'index'])->name('admin.orderTransaction');
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.AllOrders');
        Route::post('/update-order-status', [OrderController::class, 'updateOrderStatus'])->name('admin.updateOrderStatus');
        Route::get('admin/orders/products/{order}', [OrderProductsController::class, 'view'])->name('admin.orders.products');
        // Route::get('admin/fetch-orders-products/{order}', [OrderProductsController::class, 'fetchOrderProducts'])->name('admin.fetch.orders.products');
        Route::get('admin/fetch-orders-products/', [OrderProductsController::class, 'fetchOrderProducts'])->name('admin.fetch.orders.products');
        Route::post('/admin/orders/update-status', [OrderProductsController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');


        // products
        Route::get('/products',[ProductController::class, 'index'])->name('admin.products'); 
        Route::post('/products/update-status', [ProductController::class, 'updateStatus'])->name('admin.productUpdateStatus');
        Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');

        // coupon
    

        // List all coupons
        Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
        Route::get('coupons/data', [CouponController::class, 'getCoupons'])->name('coupons.data');
        Route::get('coupons/create', [CouponController::class, 'create'])->name('coupons.create');
        Route::post('create-coupons', [CouponController::class, 'store'])->name('coupons.store');
        Route::get('coupons/{coupon}/edit', [CouponController::class, 'edit'])->name('coupons.edit');
        Route::put('coupons/{coupon}', [CouponController::class, 'update'])->name('coupons.update');
        Route::delete('coupons/{coupon}', [CouponController::class, 'destroy'])->name('coupons.destroy');
        

        // tax

        Route::get('tax', [TaxController::class, 'index'])->name('tax');
        Route::get('create-tax', [TaxController::class, 'create'])->name('create-tax');
        Route::post('store-tax', [TaxController::class, 'store'])->name('store-tax');
        Route::get('edit-tax/{id}', [TaxController::class, 'edit'])->name('edit-tax');
        Route::post('update-tax/{id}', [TaxController::class, 'update'])->name('update-tax');
        Route::delete('delete-tax/{id}', [TaxController::class, 'destroy'])->name('delete-tax');

        // salary
        Route::get('salary', [SalaryController::class, 'index'])->name('salary');
        Route::get('create-salary', [SalaryController::class, 'create'])->name('create-salary');
        Route::post('store-salary', [SalaryController::class, 'store'])->name('store-salary');
        Route::get('edit-salary/{id}', [SalaryController::class, 'edit'])->name('edit-salary');
        Route::post('update-salary/{id}', [SalaryController::class, 'update'])->name('update-salary');
        Route::delete('delete-salary/{id}', [SalaryController::class, 'destroy'])->name('delete-salary');

        // payments
        Route::get('payments', [PaymentsController::class, 'index'])->name('admin.allPayments');

        // invoice 
        Route::get('invoice/{id}', [InvoiceController::class, 'show'])->name('admin.invoice');
        Route::get('invoice/download/{id}', [InvoiceController::class, 'downloadInvoice'])
    ->name('admin.invoice.download');
// transaction
    Route::get('transactions', [TransactionsController::class, 'index'])->name('admin.transactions');
    // withdraw request 
    Route::get('withdraw-request', [WithdrawRequestController::class, 'index'])->name('admin.withdrawRequest');
    Route::post('withdraw-request-update', [WithdrawRequestController::class, 'updateStatus'])->name('admin.withdraw.updateStatus');
    Route::get('deposit-request', [DepositRequestController::class, 'index'])->name('admin.depositRequest');
    Route::post('deposit-request-update', [DepositRequestController::class, 'updateStatus'])->name('admin.deposit.updateStatus');

    Route::get('/qr-codes', [QrCodeController::class, 'index'])->name('admin.qr_codes.index');
    Route::get('/qr-codes/create', [QrCodeController::class, 'create'])->name('admin.qr_codes.create');
    Route::post('/qr-codes', [QrCodeController::class, 'store'])->name('admin.qr_codes.store');
    Route::delete('/qr-codes/{id}', [QrCodeController::class, 'destroy'])->name('admin.qr_codes.destroy');
    Route::get('edit-referCommission', [ReferCommissionController::class, 'edit'])->name('edit-referCommission');
        Route::post('update-referCommission/{id}', [ReferCommissionController::class, 'update'])->name('update-referCommission');
    });


});

Route::get('/{any}', function () {
    return view('welcome'); // This should be your main Vue component or Blade view.
})->where('any', '.*');