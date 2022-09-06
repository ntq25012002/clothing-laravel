<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/')->name('route');
Route::get('/404',function() {
    return view('client.404');
})->name('404');

Route::prefix('home')->group(function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/product/{slug?}/d',[ProductController::class,'productList'])->name('product-list');
    // Route::get('/product',[ProductController::class],'productList')->name('product-list');
    
    Route::get('/product/product-detail/{slug?}',[ProductController::class,'productDetail'])->name('prd-detail');
    Route::get('/product/product-detail/{id?}/{slug?}',[CartController::class,'addToCart'])->name('add-to-cart');

    Route::get('/shopping-cart',[CartController::class,'showCart'])->name('shopping-cart');
    Route::post('/shopping-cart',[CartController::class,'updateCart'])->name('update-cart');
    Route::get('/shopping-cart/delete/{id}',[CartController::class,'removeCartItem'])->name('remove-cart-item');
    Route::get('/checkout',[CartController::class,'checkOut'])->name('checkout');
    Route::post('/checkout',[CartController::class,'postCheckOut'])->name('post-checkout');

    Route::get('/complete-order',[CartController::class,'completeOrder'])->name('complete-order');
});

// Route::get('admin/login',[AuthController::class,'index']);
Route::post('/home',[LoginController::class,'clientLogin'])->name('login');
Route::middleware('auth.admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    // User
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('create',[UserController::class,'create'])->name('create-form');
        Route::post('create',[UserController::class,'store'])->name('create');
        // Route::put('create',[UserController::class,'store'])->name('create');
        Route::get('edit/{id}',[UserController::class,'show'])->name('edit-form');
        Route::post('edit/{id}',[UserController::class,'update'])->name('edit');
        Route::get('delete/{id?}',[UserController::class,'destroy'])->name('delete');
        Route::post('delete-users',[UserController::class,'deleteUsers'])->name('delete-users');
    });

    // Category
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('create',[CategoryController::class,'create'])->name('create-form');
        Route::post('create',[CategoryController::class,'store'])->name('create');
        Route::get('edit/{id}',[CategoryController::class,'show'])->name('edit-form');
        Route::post('edit/{id}',[CategoryController::class,'update'])->name('edit');
        Route::get('delete/{id?}',[CategoryController::class,'destroy'])->name('delete');
        Route::post('delete-categories',[CategoryController::class,'deleteCategories'])->name('delete-categories');

    });

    // Product
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/{category_id?}',[ProductController::class, 'index'])->name('index');
        Route::get('create',[ProductController::class, 'create'])->name('create-form');
        Route::post('create',[ProductController::class, 'store'])->name('create');
        Route::get('edit/{id}',[ProductController::class, 'show'])->name('edit-form');
        Route::post('edit/{id}',[ProductController::class, 'update'])->name('edit');
        Route::get('delete/{id}',[ProductController::class, 'destroy'])->name('delete');
        Route::post('delete-products',[ProductController::class, 'deleteProducts'])->name('delete-products');

    });

    // Attributes
    Route::prefix('attribute')->name('attribute.')->group(function () {
        Route::get('/',[AttributeController::class, 'index'])->name('index');
        Route::get('create',[AttributeController::class, 'create'])->name('create-form');
        Route::post('create',[AttributeController::class, 'store'])->name('create');
        Route::get('edit/{id}',[AttributeController::class, 'show'])->name('edit-form');
        Route::post('edit/{id}',[AttributeController::class, 'update'])->name('edit');
        Route::get('delete/{id}',[AttributeController::class, 'destroy'])->name('delete');
        Route::post('delete-attributes',[AttributeController::class, 'deleteAttributes'])->name('delete-attributes');
    });

    // Slider
    Route::prefix('slider')->name('slider.')->group(function () {
        Route::get('/',[SliderController::class,'index'])->name('index');
        Route::get('create',[SliderController::class,'create'])->name('create-form');
        Route::post('create',[SliderController::class,'store'])->name('create');
        Route::get('edit/{id}',[SliderController::class,'show'])->name('edit-form');
        Route::post('edit/{id}',[SliderController::class,'update'])->name('edit');
        Route::get('delete/{id}',[SliderController::class,'destroy'])->name('delete');
        Route::post('delete-sliders',[SliderController::class,'deleteSliders'])->name('delete-sliders');
    });

    // Role
    Route::prefix('role')->name('role.')->group(function () {
        Route::get('/',[RoleController::class,'index'])->name('index');
        Route::get('create',[RoleController::class,'create'])->name('create-form');
        Route::post('create',[RoleController::class,'store'])->name('create');
        Route::get('edit/{id}',[RoleController::class,'show'])->name('edit-form');
        Route::post('edit/{id}',[RoleController::class,'update'])->name('edit');
        Route::get('delete/{id}',[RoleController::class,'destroy'])->name('delete');
        Route::post('delete-roles',[RoleController::class,'deleteRoles'])->name('delete-roles');
    });
    Route::get('setting',[SettingController::class,'index'])->name('setting');
    Route::post('setting',[SettingController::class,'update'])->name('update');
   
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
// Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
// Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
