<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AdsController;
use Modules\Admin\Http\Controllers\AuthorController;
use Modules\Admin\Http\Controllers\BookController;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\LoginController;
use Modules\Admin\Http\Controllers\OrderController;
use Modules\Admin\Http\Controllers\PaymentController;
use Modules\Admin\Http\Controllers\PostController;
use Modules\Admin\Http\Controllers\ShipperController;
use Modules\Admin\Http\Controllers\UsersController;

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

Route::prefix('admin')->group(function () {

    

    Route::middleware(['CheckLoginMiddeware'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin_dashboard');
        Route::get('/khach-hang', [UsersController::class, 'customerManagement'])->name('admin_users');
        Route::get('/quan-tri-vien', [UsersController::class, 'AdminManagement'])->name('Admin');
        Route::get('/the-loai', [CategoryController::class, 'index'])->name('admin_categories');

        Route::get('/tac-gia', [AuthorController::class, 'index'])->name('admin_author');
        Route::get('/them-tac-gia', [AuthorController::class, 'ViewAddAuthor'])->name('ViewAddAuthor');
        Route::get('/cap-nhat-tac-gia/{slug}',[AuthorController::class, 'getAuthor'])->name('getAuthor');
        Route::get('/chi-tiet-tac-gia/{slug}',[AuthorController::class, 'authorDetails'])->name('authorDetails');
        // Route::post('tin-kiem-tac-gia/',[AuthorController::class, 'SearchAuthor'])->name('searchAuthor');


        Route::get('/sach', [BookController::class, 'index'])->name('admin_book');
        Route::get('/them-sach', [BookController::class, 'ViewAddBook'])->name('ViewAddBook');
        Route::get('/cap-nhat-sach/{slug}', [BookController::class, 'getBook'])->name('getBook');
        Route::get('/chi-tiet-sach/{slug}',[BookController::class, 'bookDetails'])->name('bookDetails');


        Route::get('/don-hang', [OrderController::class, 'index'])->name('admin_order');
        Route::get('chi-tiet-don-hang/{id_code}',[OrderController::class, 'details'])->name('admin_orderDetails');
        
        Route::get('/bai-viet',[PostController::class, 'index'])->name('admin_posts');
        Route::get('/chi-tet-bai-viet/{slug}',[PostController::class, 'PostDetails'])->name('postDetails');


        Route::get('/quang-cao', [AdsController::class, 'index'])->name('admin_ads');
        Route::get('/them-quang-cao', [AdsController::class, 'ViewAddAds'])->name('ViewAddAds');
        Route::get('/cap-nhat-quang-cao/{slug}', [AdsController::class, 'GetAdsUpdate'])->name('GetAdsUpdate');
        Route::put('/updateAds',[AdsController::class, 'UpdateAds'])->name('UpdateAds');


        Route::get('/thanh-toan-online',[PaymentController::class, 'index'])->name('admin_pay');


        Route::get('/don-vi-van-chuyen',[ShipperController::class, 'index'])->name('admin_shipper');
        Route::get('/them-don-vi-van-chuyen', [ShipperController::class, 'ViewAddShipper'])->name('ViewAddShipper');

    });
    Route::middleware(['CheckLogoutMiddeware'])->group(function () {
        Route::get('/login', [AdminController::class, 'login'])->name('admin_login_View');
        Route::prefix('api/')->group(function () {
           
            Route::post('/admin_login', [LoginController::class, 'login'])->name('admin_login');
           
           
            // Route::post('/admin_login_pass', [LoginController::class, 'loginAdmin'])->name('admin_login_pass');
        });
    });
});
Route::middleware(['CheckLoginMiddeware'])->group(function () {

    Route::prefix('api/')->group(function () {
        Route::get('/admin_logout', [LoginController::class, 'logout'])->name('admin_logout');
        Route::get('/countusers', [AdminController::class, 'countUsers'])->name('countUsers');
        Route::get('/countorder', [AdminController::class, 'countOrder'])->name('countOrder');
        Route::get('totalbook',[AdminController::class, 'totalBook'])->name('totalbook');

        Route::post('/profile',[LoginController::class,'Profile'])->name('profile');

        //Admin
        Route::get('/GetAdmin/{id}', [UsersController::class, 'GetAdmin'])->name('GetAdmin');
        Route::post('/AddAdmin', [UsersController::class, 'AddAdmin'])->name('AddAdmin');
        Route::post('/UpdateAdmin/{id}', [UsersController::class, 'UpdateAdmin'])->name('UpdateAdmin');
        Route::delete('/RemoveAdmin/{id}', [UsersController::class, 'RemoveAdmin'])->name('RemoveAdmin');

        //Khách hàng
        Route::get('/GetCustomer/{id}', [UsersController::class, 'GetCustomer'])->name('GetCustomer');
        Route::delete('/RemoveCustomer/{id}', [UsersController::class, 'RemoveCustomer'])->name('RemoveCustomer');

        //Thể loại
        Route::get('/GetCategory/{slug}', [CategoryController::class, 'GetCategory'])->name('GetCategory');
        Route::post('/AddCate', [CategoryController::class, 'AddCate'])->name('AddCate');
        Route::post('/UpdateCate/{slug}', [CategoryController::class, 'UpdateCate'])->name('UpdateCate');
        Route::delete('/RemoveCategory/{slug}', [CategoryController::class, 'RemoveCategory'])->name('RemoveCategory');

        //Tác gỉả
        // Route::post('/uploadAvatar', [AuthorController::class, 'uploadAvatar'])->name('uploadAvatar');
        Route::post('addAuthor',[AuthorController::class, 'addAuthor'])->name('addAuthor');
        Route::delete('RemoveAuthor/{slug}',[AuthorController::class, 'RemoveAuthor'])->name('RemoveAuthor');
        // Route::get('SearchAuthor',[AuthorController::class, 'SearchAuthor'])->name('SearchAuthor');
        Route::post('updateAuthor/',[AuthorController::class, 'updateAuthor'])->name('updateAuthor');
        Route::post('loadmore',[AuthorController::class, 'loadmore'])->name('loadmore');


        //Sách
        Route::post('addBook',[BookController::class, 'addBook'])->name('addBook');
        Route::delete('removeBook',[BookController::class, 'removeBook'])->name('removeBook');
        Route::post('updateBook/',[BookController::class, 'updateBook'])->name('updateBook');
        
        //Bài viết
        Route::delete('removePost',[PostController::class, 'removePost'])->name('removePost');

        //Quảng cáo
        Route::post('/addAds', [AdsController::class, 'addAds'])->name('AddAds');
        Route::get('/GetAds',[AdsController::class, 'GetAds'])->name('GetAds');
        Route::delete('/removeAds',[AdsController::class, 'RemoveAds'])->name('RemoveAds');

        //Phương thức thanh toán
        Route::post('/addPay',[PaymentController::class, 'AddPay'])->name('addPay');
        Route::get('getPay',[PaymentController::class, 'GetPay'])->name('getPay');
        Route::post('UpdatePay',[PaymentController::class, 'UpdatePay'])->name('UpdatePay');
        Route::delete('/removePay', [PaymentController::class, 'destroy'])->name('RemovePay');

        //Đơn vị vận chuyển
        Route::get('/getShipper',[ShipperController::class, 'GetShipper'])->name('GetShipper');
        Route::post('/addShipper', [ShipperController::class, 'AddShipper'])->name('AddShipper');
        Route::delete('/removeShipper', [ShipperController::class, 'destroy'])->name('RemoveShipper');

        //Đơn hàng
        Route::post('/confirmOrder',[OrderController::class, 'confirmOrder'])->name('confirmOrder');
        
        
        // Route::get('test',[AdminController::class, 'test']);
        
    });
});

