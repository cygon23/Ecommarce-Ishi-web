<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwitterController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware('auth');
Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('product_details/{id}', [HomeController::class, 'product_details']);
Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart', [HomeController::class, 'mycart']);
Route::post('comfirm_order', [HomeController::class, 'comfirm_order'])->middleware(['auth', 'verified']);
Route::get('myOrders', [HomeController::class, 'myOrders'])->middleware(['auth', 'verified']);
Route::get('shop-home', [HomeController::class, 'shop']);
Route::get('why-home', [HomeController::class, 'whyPage']);
Route::get('testmonial-home', [HomeController::class, 'testmonial']);
Route::get('contact-home', [HomeController::class, 'contact']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('view_categoty', [AdminController::class, 'view_categoty'])->middleware(['auth', 'admin']);
Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);
Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);
Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);
Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);
Route::get('add_products', [AdminController::class, 'add_products'])->middleware(['auth', 'admin']);
Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);
Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);
Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);
Route::post('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);
Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);
Route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);
Route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);
Route::get('product_transfer/{id}', [AdminController::class, 'product_transfer'])->middleware(['auth', 'admin']);
Route::get('product_delivered/{id}', [AdminController::class, 'product_delivered'])->middleware(['auth', 'admin']);
Route::get('product_statement/{id}', [AdminController::class, 'product_statement'])->middleware(['auth', 'admin']);


//payment
Route::controller(HomeController::class)->group(function () {

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});


Route::controller(TwitterController::class)->group(function () {
    Route::get('auth/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('auth/twitter/callback', 'handleTwitterCallback');
});



Route::get('/auth/google/redirect', function (Request $request) {
    return Socialite::driver("google")->redirect();
});


Route::get('/auth/google/callback', function (Request $request) {
    $googleUser = Socialite::driver("google")->user();

    $user = User::updateOrCreate(
        ['google_id' => $googleUser->id],
        [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => Hash::make(Str::random(12)),
            'email_verified_at' => now(),
            'address' => $googleUser->address ?? 'Arusha' // default address here
        ]
    );

    Auth::login($user);
    return redirect('/dashboard');
});


Route::get('chart', [GoogleChartController::class, 'index']);
Route::get('lang/{lang}', [LanguageController::class, 'change'])->name('change.lang');
