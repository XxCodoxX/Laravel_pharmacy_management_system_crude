<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DruginventoryController;

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
    return view('login');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['islogin']], function () {
Route::get('/dashbord', [AuthController::class, 'dashbord']);

Route::get('/customer', [CustomerController::class, 'customerView'])->name('customer');
Route::post('/customerup', [CustomerController::class, 'update'])->name('customerupdate');
Route::resource('customerresource', CustomerController::class);

Route::get('/druginventory', [DruginventoryController::class, 'customerView'])->name('druginventory');
Route::post('/druginventoryup', [DruginventoryController::class, 'update'])->name('druginventoryupdate');
Route::resource('druginventoryresource', DruginventoryController::class);

});

Route::group(['middleware' => ['allredyloging']], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register_user', [AuthController::class, 'registerUser'])->name('register_user');
    Route::post('/login_user', [AuthController::class, 'loginUser'])->name('login_user');
});
