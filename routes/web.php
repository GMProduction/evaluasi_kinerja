<?php

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

Route::get('/', [\App\Http\Controllers\AuthController::class, 'pageLogin']);

Route::get('/indicators', [\App\Http\Controllers\IndicatorController::class, 'index']);
Route::get('/package', [\App\Http\Controllers\PackageController::class, 'index']);
Route::get('/ppk', [\App\Http\Controllers\PPKController::class, 'index']);
Route::get('/accessor-ppk', [\App\Http\Controllers\AccessorPpkController::class, 'index']);
Route::post('/accessor-ppk/create', [\App\Http\Controllers\AccessorPpkController::class, 'store']);


Route::get('/superuser', function () {
    return view('superuser/dashboard');
});

Route::get('/superuser/users', function () {
    return view('superuser/user/user');
});