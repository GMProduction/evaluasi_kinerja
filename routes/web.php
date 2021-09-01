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

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'pageLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/indicators', [\App\Http\Controllers\IndicatorController::class, 'index']);
Route::get('/package', [\App\Http\Controllers\PackageController::class, 'index']);
Route::get('/ppk', [\App\Http\Controllers\PPKController::class, 'index']);
Route::get('/accessor-ppk', [\App\Http\Controllers\AccessorPpkController::class, 'index']);
Route::post('/accessor-ppk/create', [\App\Http\Controllers\AccessorPpkController::class, 'store']);

Route::get(
    '/login',
    function () {
        return view('login');
    }
);

Route::prefix('/')->middleware('auth')->group(
    function () {
        Route::get(
            '/',
            function () {
                return view('superuser/dashboard');
            }
        );

        Route::get('/get-count-dashboard', [\App\Http\Controllers\DashboardController::class, 'getAllCountData']);
Route::get('/datatable-package-ongoing', [\App\Http\Controllers\DashboardController::class, 'datatable']);
        Route::prefix('/users')->middleware('roles:superuser,admin')->group(
            function () {
                Route::match(['post', 'get'], '/', [\App\Http\Controllers\Superadmin\UserController::class, 'index']);
                Route::get('/{id}/delete', [\App\Http\Controllers\Superadmin\UserController::class, 'delete']);
                Route::get('/count', [\App\Http\Controllers\Superadmin\UserController::class, 'getCountUser']);
                Route::get('/datatable/{role}', [\App\Http\Controllers\Superadmin\UserController::class, 'datatable'])->name('user_datatable');
                Route::get('/count-all', [\App\Http\Controllers\Superadmin\UserController::class, 'getAllCountUser']);
            }
        );

        Route::prefix('/ppk')->group(
            function () {
                Route::match(['post', 'get'], '/', [\App\Http\Controllers\Superadmin\PPKController::class, 'index']);
                Route::get('/get-all', [\App\Http\Controllers\Superadmin\PPKController::class, 'getPPK']);
                Route::get('/datatable', [\App\Http\Controllers\Superadmin\PPKController::class, 'datatable']);
            }
        );

        Route::prefix('/paket-konstruksi')->group(
            function () {
                Route::match(['post', 'get'], '/', [\App\Http\Controllers\PackageController::class, 'index']);
                Route::match(['post', 'get'], '/detail/{id}', [\App\Http\Controllers\PackageController::class, 'detail']);
                Route::get('/datatable', [\App\Http\Controllers\PackageController::class, 'datatable'])->name('package_datatable');
                Route::get('/addendum-datatable/{id}', [\App\Http\Controllers\PackageController::class, 'datatableAddendum']);
                Route::post('/addendum/add', [\App\Http\Controllers\PackageController::class, 'addDetail']);
            }
        );

        Route::prefix('/indikator')->middleware('roles:superuser,admin')->group(
            function () {
                Route::match(['post', 'get'], '/', [\App\Http\Controllers\Superadmin\IndicatorController::class, 'index']);
                Route::post('/{idIndikator}', [\App\Http\Controllers\Superadmin\IndicatorController::class, 'storeSubIndikator']);
                Route::get('/{idIndikator}/sub', [\App\Http\Controllers\Superadmin\IndicatorController::class, 'getSubIndicator']);
                Route::get('/get-all', [\App\Http\Controllers\Superadmin\IndicatorController::class, 'getIndicator']);
            }
        );

        Route::prefix('/penilaian')->group(
            function () {
                Route::get('/', [\App\Http\Controllers\ScoreController::class, 'index']);
                Route::get('/datatable', [\App\Http\Controllers\ScoreController::class, 'datatable']);
                Route::get('/detail/{id}', [\App\Http\Controllers\ScoreController::class, 'detail']);
                Route::get('/results', [\App\Http\Controllers\ScoreController::class, 'getScore']);
                Route::get('/radar', [\App\Http\Controllers\ScoreController::class, 'getRadarChart']);
            }
        );

        Route::get(
            '/detail-penilaian',
            function () {
                return view('superuser/penilaian/detail-penilaian');
            }
        );
    }
);
