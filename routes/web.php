<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::post('/change-language', function (Request $request) {
        $request->session()->put('language', $request->input('language'));
        return back();
    });

    // Show Login Form
    Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

    //Log In User
    Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

    // Show Register Form
    Route::get('/register', [UserController::class, 'create'])->middleware('guest');

    // Create New User
    Route::post('/users', [UserController::class, 'store'])->middleware('guest');

    // Show Items Index Page
    Route::get('/home', [ItemController::class, 'index'])->middleware('auth');

    // Show Item Detail Page
    Route::get('/items/{item}', [ItemController::class, 'show'])->middleware('auth');

    // Show Edit Profile Form
    Route::get('/users/{user}', [UserController::class, 'edit'])->middleware('auth');

    // Update User Profile
    Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

    // Log Out User
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

    // Show Success Log Out Page
    Route::get('/logout', [UserController::class, 'showLogoutPage'])->middleware('guest');

    // Show Success Saved Profile Page
    Route::get('/users/{user}/saved', [UserController::class, 'saved'])->middleware('auth');

    // Show Account Maintenance Page
    Route::get('/account-maintenance', [UserController::class, 'accountMaintenance'])->middleware('admin');

    // Show User Edit Role Form
    Route::get('/account-maintenance/{user}/edit', [UserController::class, 'showEditRoleForm'])->middleware('admin');

    // Update User Role
    Route::put('/account-maintenance/{user}', [UserController::class, 'updateRole'])->middleware('admin');

    // Delete User
    Route::delete('/account-maintenance/{user}', [UserController::class, 'deleteUser'])->middleware('admin');

    // Show Cart Page
    Route::get('/cart', [CartController::class, 'index'])->middleware('auth');

    // Add Item To Cart
    Route::post('/items/{item}/add-to-cart', [ItemController::class, 'addToCart'])->middleware('auth');

    // Delete Cart Value
    Route::post('/cart/{item}', [CartController::class, 'delete'])->middleware('auth');

    // Checkout From Cart
    Route::post('/checkout', [CartController::class, 'checkout'])->middleware('auth');

    // Show Success Checkout Page
    Route::get('/checkout', [CartController::class, 'showCheckoutPage'])->middleware('auth');
});
