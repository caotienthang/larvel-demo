<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PayPalController;

Route::get('/', [ServiceController::class,'index'])->name('home');

// Services
Route::get('/services', [ServiceController::class,'showAll'])->name('services.all');
Route::get('/services/{id}', [ServiceController::class,'show'])->name('services.detail');
Route::post('/services/{id}/buy', [ServiceController::class,'buy'])->name('services.buy')->middleware('auth');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Change password (phải đăng nhập)
Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])
    ->middleware('auth')
    ->name('password.change.form');

Route::post('/change-password', [AuthController::class, 'changePassword'])
    ->middleware('auth')
    ->name('password.change');

// Forgot password
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])
    ->name('password.forgot.form');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('password.forgot');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{invoice}', [OrderController::class, 'show'])->whereNumber('invoice')->name('orders.show');
    Route::patch('/orders/{invoice}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::put('/profile/phone', [UserProfileController::class, 'updatePhone'])->name('profile.phone.update');
});
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/faqs', 'faqs')->name('faqs');
Route::view('/order-payment-policy', 'pages.order-payment-policy')->name('policy.payment');
Route::view('/shipping-policy', 'pages.shipping-policy')->name('policy.shipping');
Route::view('/return-refund-policy', 'pages.return-refund-policy')->name('policy.returns');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('policy.privacy');
Route::view('/intellectual-property-policy', 'pages.intellectual-property-policy')->name('policy.ip');
Route::view('/subscription-cancellation-policy', 'pages.subscription')->name('policy.subscription');
Route::view('/warranty-policy', 'pages.warranty')->name('policy.warranty');
Route::view('/review-feedback-policy', 'pages.review-feedback')->name('policy.review_feedback');
Route::view('/customer-support-issue-resolution-policy', 'pages.support-issue-resolution')->name('policy.support_issue_resolution');
Route::view('/cookie-policy', 'pages.cookie')->name('policy.cookie');
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');
Route::view('/terms-of-use', 'pages.terms-of-use')->name('terms');
Route::middleware(['auth'])->group(function () {
    // Trang hiển thị checkout (PayNow -> show)
    Route::get('/checkout/{service}', [CheckoutController::class, 'show'])
        ->name('checkout.show');

    // Nút "Continue to PayPal" -> tạo invoice + tạo paypal order + redirect
    Route::post('/checkout/{service}/paypal', [CheckoutController::class, 'payWithPaypal'])
        ->name('checkout.paypal');

    // PayPal return/cancel
    Route::get('/paypal/return', [PayPalController::class, 'return'])
        ->name('paypal.return');
    Route::get('/orders/success', function () {
        return view('orders.success');
    })->name('orders.success');

    Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])
        ->name('paypal.cancel');
});








