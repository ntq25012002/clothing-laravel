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
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RoleController;
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
Route::get('/', function () {
    return view('welcome');
    // return view('home');
})->name('welcome');

// Route::group([ 'prefix' => 'admin', 'before'=>'check-login' ], function () {});
// 
// Route::group([ 'prefix' => 'admin'], function () {
//     Route::get('list-students',[StudentContronller::class,'index']);
//     Route::get('add-student',[StudentContronller::class],'formAddStudent');
//     Route::post('add-student',[StudentContronller::class],'addStudent');
// });

// Route::get('admin/login',[AuthController::class,'index']);
// // Route::post('admin/login',[AuthController::class,'postLogin'])->name('login');
// Route::middleware('auth.admin')->name('admin.')->prefix('admin')->group(function () {
//     Route::get('/',[DashboardController::class,'index'])->name('dashboard');
//     // User
//     Route::prefix('user')->name('user.')->group(function () {
//         Route::get('/',[UserController::class,'index'])->name('index');
//         Route::get('create',[UserController::class,'create'])->name('create-form');
//         Route::post('create',[UserController::class,'store'])->name('create');
//         // Route::put('create',[UserController::class,'store'])->name('create');
//         Route::get('edit/{id}',[UserController::class,'show'])->name('edit-form');
//         Route::post('edit/{id}',[UserController::class,'update'])->name('edit');
//         Route::get('delete/{id?}',[UserController::class,'destroy'])->name('delete');
//         Route::post('delete-users',[UserController::class,'deleteUsers'])->name('delete-users');
//     });

//     // Category
//     Route::prefix('category')->name('category.')->group(function () {
//         Route::get('/',[CategoryController::class,'index'])->name('index');
//         Route::get('create',[CategoryController::class,'create'])->name('create-form');
//         Route::post('create',[CategoryController::class,'store'])->name('create');
//         Route::get('edit/{id}',[CategoryController::class,'show'])->name('edit-form');
//         Route::post('edit/{id}',[CategoryController::class,'update'])->name('edit');
//         Route::get('delete/{id?}',[CategoryController::class,'destroy'])->name('delete');
//         Route::post('delete-categories',[CategoryController::class,'deleteCategories'])->name('delete-categories');
//         Route::get('/search',[CategoryController::class,'searchUser'])->name('search');
//     });

//     // Product
//     Route::prefix('product')->name('product.')->group(function () {
//         Route::get('/',[ProductController::class, 'index'])->name('index');
//         Route::get('create',[ProductController::class, 'create'])->name('create-form');
//         Route::post('create',[ProductController::class, 'store'])->name('create');
//         Route::get('edit/{id}',[ProductController::class, 'show'])->name('edit-form');
//         Route::post('edit/{id}',[ProductController::class, 'update'])->name('edit');
//         Route::get('delete/{id}',[ProductController::class, 'destroy'])->name('delete');
//         Route::post('delete-products',[ProductController::class, 'deleteProducts'])->name('delete-products');
//     });

//     // Attributes
//     Route::prefix('attribute')->name('attribute.')->group(function () {
//         Route::get('/',[AttributeController::class, 'index'])->name('index');
//         Route::get('create',[AttributeController::class, 'create'])->name('create-form');
//         Route::post('create',[AttributeController::class, 'store'])->name('create');
//         Route::get('edit/{id}',[AttributeController::class, 'show'])->name('edit-form');
//         Route::post('edit/{id}',[AttributeController::class, 'update'])->name('edit');
//         Route::get('delete/{id}',[AttributeController::class, 'destroy'])->name('delete');
//         Route::post('delete-attributes',[AttributeController::class, 'deleteAttributes'])->name('delete-attributes');
//     });

//     // Slider
//     Route::prefix('slider')->name('slider.')->group(function () {
//         Route::get('/',[SliderController::class,'index'])->name('index');
//         Route::get('create',[SliderController::class,'create'])->name('create-form');
//         Route::post('create',[SliderController::class,'store'])->name('create');
//         Route::get('edit/{id}',[SliderController::class,'show'])->name('edit-form');
//         Route::post('edit/{id}',[SliderController::class,'update'])->name('edit');
//         Route::get('delete/{id}',[SliderController::class,'destroy'])->name('delete');
//         Route::post('delete-sliders',[SliderController::class,'deleteSliders'])->name('delete-sliders');
//     });

//     // Role
//     Route::prefix('role')->name('role.')->group(function () {
//         Route::get('/',[RoleController::class,'index'])->name('index');
//         Route::get('create',[RoleController::class,'create'])->name('create-form');
//         Route::post('create',[RoleController::class,'store'])->name('create');
//         Route::get('edit/{id}',[RoleController::class,'show'])->name('edit-form');
//         Route::post('edit/{id}',[RoleController::class,'update'])->name('edit');
//         Route::get('delete/{id}',[RoleController::class,'destroy'])->name('delete');
//         Route::post('delete-roles',[RoleController::class,'deleteRoles'])->name('delete-roles');
//     });
//     Route::get('setting',[SettingController::class,'index'])->name('setting');
//     Route::post('setting',[SettingController::class,'update'])->name('update');
//     // Route::middleware('admin.add')->get('add-student',[StudentContronller::class,'formAddStudent'])->name('formAddStudent');
//     // Route::middleware('admin.add')->post('add-student',[StudentContronller::class,'addStudent']);
//     // Route::get('edit-student/{id?}',[StudentContronller::class,'getStudent']);
// });

Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('postLogin');
// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
// Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
// Route::post('registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
