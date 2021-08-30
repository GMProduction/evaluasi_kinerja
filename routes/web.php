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


Route::prefix('/superuser')->group(function (){
    Route::get('/', function () {
        return view('superuser/dashboard');
    });

    Route::prefix('/users')->group(function (){
        Route::match(['post','get'],'/', [\App\Http\Controllers\Superadmin\UserController::class,'index']);
        Route::get('/{id}/delete', [\App\Http\Controllers\Superadmin\UserController::class,'delete']);
        Route::get('/datatable/{role}',[\App\Http\Controllers\Superadmin\UserController::class,'datatable'])->name('user_datatable');
    });

    Route::get('/ppk', function () {
        return view('superuser/ppk/ppk');
    });

    Route::get('/paket-konstruksi', [\App\Http\Controllers\PackageController::class, 'index']);

    Route::get('/indikator', function () {
        return view('superuser/indikator/indikator');
    });
});
