<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;

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

// Route::get('/', function () {
//     return view('route');
// });

//auth
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/proseslogin', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout']);

//admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//users
Route::get('/', [FrontendController::class, 'index']);