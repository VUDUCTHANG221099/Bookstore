<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdsController;
use Modules\Admin\Http\Controllers\LoginController;
use Modules\Admin\Http\Controllers\UsersController;

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

Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});

// Route::post('/addAds', [AdsController::class, 'addAds'])->name('AddAds');

// Route::post('/admin_login', [LoginController::class, 'login'])->name('admin_login');
