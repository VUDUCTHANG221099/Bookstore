<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\DB;
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

Route::middleware(['CheckLogout'])->group(function () {

    Route::get('dang-nhap', [LoginController::class, 'index'])->name('loginViewFE');
    Route::get('dang-ky/',[RegisterController::class,'index'])->name('registerViewFE');
    Route::get('reset_password',[LoginController::class,'reset_password'])->name('reset_password');
    Route::post('reset_password',[LoginController::class,'Postreset_password'])->name('Postreset_password');

    Route::prefix('api')->group(function () {
        Route::post('login', [LoginController::class, 'login'])->name('loginPost'); //
        Route::post('register',[RegisterController::class,'register'])->name('registerPost');
        Route::post('forgotPassword',[LoginController::class,'forgotPassword'])->name('forgotPassword');

    });
});

Route::middleware(['CheckLogin'])->group(function () {
    Route::prefix('tai-khoan')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('profileFE');
        Route::get('/don-hang', [ProfileController::class, 'index'])->name('profileFEOrder');
        Route::get('/doi-mat-khau', [ProfileController::class, 'index'])->name('profileFEChangePass');
        Route::get('/dia-chi', [ProfileController::class, 'index'])->name('profileFEAddress');
        Route::get('/bai-viet', [ProfileController::class, 'index'])->name('profileFEPost');
        Route::get('/bai-viet/cap-nhat-bai-viet/{slug}',[ProfileController::class,'updatePost'])->name('updatePostFE');
        Route::put('Update_Post',[ProfileController::class,'Update_Post'])->name('Update_Post');
    });

    Route::prefix('cart')->group(function(){
        Route::get('add/{id}',[CartController::class,'addToCart'])->name('addToCart');
        Route::get('delete/{id}',[CartController::class,'deleteCart'])->name('deleteCart');
        Route::get("update",[CartController::class,"updateCart"])->name('updateCart');


        Route::get('cart_hover',[CartController::class,'Gio_Hang'])->name('Gio_Hang');
        Route::get('showCart',[CartController::class,'Them_Gio_Hang'])->name('Them_Gio_Hang');
        
        
    });
    Route::get('gio-hang',[CartController::class,'GioHangView'])->name('GioHangView');
    Route::get('gio-hang-sub',[CartController::class,'GioHangView_Sub'])->name('GioHangView_Sub');
    /*Sub-Cart*/
    Route::get('sub-cart/',[CartController::class,'GetdataBook'])->name('GetdataBook');

    /*Sub-Cart*/

    Route::get('sach-chi-tiet/{book_slug}',[BookController::class,'bookDetails'])->name('bookDetailsFE');
    Route::prefix('api')->group(function () {
        Route::get('logoutFE', [LoginController::class, 'logout'])->name('logoutFE');
        Route::get('GetProfile', [ProfileController::class, 'Profile'])->name('GetProfile');
        Route::post('ChangePassFE/',[LoginController::class,'ChangePassFE'])->name('ChangePassFE');
        Route::get('viewquick', [HomeController::class, 'viewquick'])->name('viewquick'); //Get Book
        
        
        Route::get('Province',[ProfileController::class,'Province'])->name('Province');
        Route::get('District/{province_id}',[ProfileController::class,'District'])->name('District');
        Route::get('Ward/{district_id}',[ProfileController::class,'Ward'])->name('Ward');
        Route::post('AddAddress',[ProfileController::class,'AddAddressFE'])->name('AddAddressFE');
        Route::get('CountAddress',[ProfileController::class,'CountAddress'])->name('CountAddress');
        Route::get('checkAddress',[ProfileController::class,'CheckAddressFE'])->name('CheckAddressFE');
        Route::delete('DeleteAddress',[ProfileController::class,'DeleteAddress'])->name('DeleteAddress');
        Route::get('GetAddress',[ProfileController::class,'GetAddress'])->name('GetAddress');
        Route::post('UpdateAddressFE',[ProfileController::class,'UpdateAddressFE'])->name('UpdateAddressFE');
        
        Route::delete('removePostFE',[ProfileController::class,'removePostFE'])->name('removePostFE');
        Route::post('CreatePost',[ProfileController::class,'CreatePost'])->name('CreatePost');
        
    });



    /*Checkout*/
    Route::get('thanh-toan/{token}',[PaymentController::class,'checkout'])->name('checkout');
    Route::post('thanh-toan/{token}', [PaymentController::class,'orderBook'])->name('orderBook');
    Route::get('cam-on/{token_cod}',[PaymentController::class,'Thankyoucod'])->name('Thankyoucod');
    Route::get('cam-on/{token_vnpay}/vnpay', [PaymentController::class,'vnpay'])->name('vnpay');
    

});


// Route::get('trang-ca-nhan',[ProfileController::class,'index']);


Route::get('/', [HomeController::class, 'index'])->name('index'); //Trang chủ
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('search'); //Kìm kiếm
Route::get('/sach/{slug?}', [BookController::class, 'index'])->name('book'); //Sách
Route::get('/gioi-thieu',[HomeController::class, 'introduce'])->name('introduce');//Giới thiệu


Route::prefix('bai-viet')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post'); // Bài viết
    Route::get('bai-viet-chi-tiet/{slug}', [PostController::class, 'details'])->name('postdetails'); // Bài viết chi tiết
    
});
//Login song API Mới chạy được


// Route::get('MyAddress', [ProfileController::class, 'MyAddress'])->name('MyAddress');




///Send Mail Test
// Route::get('registerAccount',[RegisterController::class,'SendEmailRegister'])->name('SendEmailRegister');

//Errors
// Route::get('tests',[ProfileController::class,'CheckAddressFE'])->name('CheckAddressFE');
Route::fallback(function () {
    return view("errors.404");
});