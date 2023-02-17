<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

Route::get('/test', function (){
    $users = User::get();
});

Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function () {
	Route::get('/ShowCategories', 'showCategories')->name('category');
    Route::get('/GetCategories', 'getCategories');
});

Route::get('/', [ProductController::class, 'productsList'])->name('home');
Route::get('/home', [ProductController::class, 'productsList'])->name('home');

// Cart
Route::group([
    'prefix' => 'Cart',
    'controller' => CartController::class
], function () {
    Route::get('/', 'shop')->name('shop');
    Route::get('/check', 'check')->name('cart.index');
    Route::post('/add', 'add')->name('cart.store');
    Route::post('/update', 'update')->name('cart.update');
    Route::post('/remove', 'remove')->name('cart.remove');
    Route::post('/clear', 'clear')->name('cart.clear');

});

// Products
Route::group([
    'prefix' => 'Products', 'middleware' => ['auth'],
    'controller' => ProductController::class
], function () {
    Route::get('/GetAllProducts', 'getAllProducts');
    Route::get('/GetProduct', 'getProduct');
    Route::get('/ShowProductsList', 'showProductsList')->name('product.create');
    Route::get('/ShowCreateProduct', 'showCreateproduct')->name('product.create.post');
    Route::get('/ShowEditProduct/{product}', 'showEditproduct')->name('product.edit');

    Route::post('/SaveProduct', 'saveProduct')->name('product.create.post');
    Route::put('/UpdateProduct/{product}', 'updateProduct')->name('product.edit.put');
    Route::delete('/DeleteProduct/{product}', 'deleteProduct')->name('product.delete');
});

// Users
Route::group([
    'prefix' => 'Users', 'middleware' => ['auth'],
    'controller' => UserController::class
], function () {
    Route::get('/', 'ShowAllUsers')->name('users.index');
    Route::get('/GetAllUsers', 'getAllUsers');
    Route::get('/GetUser/{user}', 'getUser');
    Route::get('/ShowCreateUser', 'showCreateUser')->name('user.create');
    Route::get('/EditUser/{user}', 'showEditUser')->name('user.edit');

    Route::post('/CreateUser', 'createUser')->name('user.create.post');
    Route::put('/EditUser/{user}', 'updateUser')->name('user.edit.put');
    Route::delete('/DeleteUser/{user}', 'deleteUser')->name('user.delete');
});

// Auth Routes
// Registration Routes...
Route::group(['controller' => RegisterController::class],
function () {
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register')->name('registerForm');
});

// Login Routes...
Route::group(['controller' => LoginController::class], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', 'login');

    // Logout Routes...
    Route::post('logout', 'logout')->name('logout');
});

// Password Reset Routes...
Route::group(['controller' => ForgotPasswordController::class], function () {
    Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
});
Route::group(['controller' => ResetPasswordController::class], function () {

    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
});

// Password Confirmation Routes...
Route::group(['controller' => ConfirmPasswordController::class], function () {

    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')
        ->name('password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
});

// Email Verification Routes...
Route::group(['controller' => VerificationController::class], function () {

    Route::get('email/verify', 'show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'verify')
        ->name('verification.verify');
    Route::post('email/resend', 'resend')
        ->name('verification.resend');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
