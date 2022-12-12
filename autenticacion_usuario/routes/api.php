<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\images;
use App\Http\Controllers\sales_details;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route:: post('/register', [AuthController::class, 'register'])->name('register');
Route:: post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout'])->name('logout');

//*reset password
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('password-reset', [NewPasswordController::class, 'reset']);


Route:: middleware(['auth:sanctum'])->group(function(){
Route::get('/user', [AuthController::class, 'user']);
}
);
Route::resource('/articles', ArticlesController::class);
Route::resource('/users', Usercontroller::class);
Route::resource('/sales', SalesController::class);
Route::resource('/sales_details', sales_details::class);
Route::resource('/images', images::class);