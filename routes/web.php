<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\EvaluatesController;
use App\Http\Controllers\Admin\AddressShipController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\Admin\FilerPriceController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TypeBookController;
use App\Http\Controllers\Admin\ThemeBookController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\AuthorParticipateController;
use App\Http\Controllers\Admin\LoginController as LoginAdmin;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\NewsController as NewsClient;
use App\Http\Controllers\FaceBookController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EvaluateController;
use Illuminate\Support\Facades\Artisan;

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

// Ngân hàng:	NCB
// Số thẻ:	9704198526191432198
// Tên chủ thẻ:	NGUYEN VAN A
// Ngày phát hành:	07/15
// Mật khẩu OTP:	123456

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'ok';
});

//---------client
Route::get('/', [Homecontroller::class, 'index'])->name('home');

Route::prefix('news')->group(function () {
    Route::get('/', [NewsClient::class, 'index'])->name('news');
    Route::get('/detail/{id}', [NewsClient::class, 'detail'])->name('new_detail');
});

Route::get('/introduction', [Homecontroller::class, 'introduction'])->name('introduction');

Route::get('/contact', [Homecontroller::class, 'contact'])->name('contact');

Route::get('/products', [Homecontroller::class, 'products'])->name('products');

Route::get('/products_detail/{id}', [Homecontroller::class, 'products_detail'])->name('products_detail');

Route::get('/products_search', [Homecontroller::class, 'products_search'])->name('products_search');

//client login
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

// client logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//client register
Route::match(['get', 'post'], '/register', [RegisterController::class, 'register'])->name('register');

//client account
Route::get('/account', [LoginController::class, 'account'])->name('account');

Route::get('/infoCongrats/{id}', [LoginController::class, 'infoCongrats'])->name('infoCongrats');

//client order
Route::get('/detail_order', [LoginController::class, 'detail_order'])->name('detail_order');

Route::get('/cancel_order', [LoginController::class, 'cancel_order'])->name('cancel_order');

// client cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::get('/InfoCart', [CartController::class, 'InfoCart'])->name('InfoCart');

Route::get('/AddCart', [CartController::class, 'AddCart'])->name('AddCart');

Route::get('/orderNow', [CartController::class, 'orderNow'])->name('orderNow');

Route::get('/DeleteItemCart', [CartController::class, 'DeleteItemCart'])->name('DeleteItemCart');

Route::get('/UpdateItemCart', [CartController::class, 'UpdateItemCart'])->name('UpdateItemCart');

Route::get('/html_cart_partial', [CartController::class, 'html_cart_partial'])->name('html_cart_partial');

Route::get('/html_cart_partial_1', [CartController::class, 'html_cart_partial_1'])->name('html_cart_partial_1');

//client payment
Route::match(['get', 'post'], '/payment_check', [PaymentController::class, 'payment_check'])->name('payment_check');

Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');

Route::get('/change_ship', [PaymentController::class, 'change_ship'])->name('change_ship');

Route::get('/vnpReturn', [PaymentController::class, 'vnpReturn'])->name('vnpReturn');

Route::post('/client_order', [PaymentController::class, 'client_order'])->name('client_order');

Route::post('/paymentOnline', [PaymentController::class, 'paymentOnline'])->name('paymentOnline');

Route::match(['get', 'post'], '/payment_cart', [PaymentController::class, 'payment_cart'])->name('payment_cart');

// evaluate
Route::post('/evaluate', [EvaluateController::class, 'evaluate'])->name('evaluate');

Route::get('/get_evaluate', [EvaluateController::class, 'get_evaluate'])->name('get_evaluate');

Route::post('/Delete_evaluate', [EvaluateController::class, 'Delete_evaluate'])->name('Delete_evaluate');


//----------Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware('CheckLogout');

    //login
    Route::match(['get', 'post'], '/login', [LoginAdmin::class, 'login'])->middleware('CheckUser');

    Route::match(['get'], '/logout', [LoginAdmin::class, 'logout']);


    //news - tin tuc
    Route::prefix('new')->group(function () {
        Route::get('/manage', [NewsController::class, 'manage'])->middleware('CheckLogout');

        Route::get('/manage_image', [NewsController::class, 'manage_image'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [NewsController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [NewsController::class, 'edit'])->middleware('CheckLogout');

        // Route::get('/detail/{id}', [NewsController::class, 'detail']);

        Route::post('/delete', [NewsController::class, 'delete'])->middleware('CheckLogout');

        Route::post('/delete_image', [NewsController::class, 'delete_image'])->middleware('CheckLogout');

        Route::post('/add_image', [NewsController::class, 'add_image'])->middleware('CheckLogout');

        Route::get('/status', [NewsController::class, 'status'])->middleware('CheckLogout');

        Route::get('/active', [NewsController::class, 'active'])->middleware('CheckLogout');

    });

    //book - sach
    Route::prefix('book')->group(function () {
        Route::get('/manage', [BooksController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [BooksController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [BooksController::class, 'edit'])->middleware('CheckLogout');

        // Route::get('/detail/{id}', [BooksController::class, 'detail']);

        Route::post('/delete', [BooksController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [BooksController::class, 'status'])->middleware('CheckLogout');

        Route::get('/active', [BooksController::class, 'active'])->middleware('CheckLogout');

    });

    //invoice - hoa don
    Route::prefix('invoice')->group(function () {
        Route::get('/manage', [InvoiceController::class, 'manage'])->middleware('CheckLogout');

        Route::get('/detail/{id}', [InvoiceController::class, 'detail'])->middleware('CheckLogout');

        // Route::post('/delete', [InvoiceController::class, 'delete']);

        Route::post('/active', [InvoiceController::class, 'active'])->middleware('CheckLogout');

        Route::post('/cancel', [InvoiceController::class, 'cancel'])->middleware('CheckLogout');

        Route::post('/delivery_date', [InvoiceController::class, 'deliveryDate'])->middleware('CheckLogout');
    });

    //customer - khach hang
    Route::prefix('customer')->group(function () {
        Route::get('/manage', [CustomersController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [CustomersController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [CustomersController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [CustomersController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [CustomersController::class, 'status'])->middleware('CheckLogout');

        Route::get('/detail/{id}', [CustomersController::class, 'detail'])->middleware('CheckLogout');
    });

    //author - tac gia
    Route::prefix('author')->group(function () {
        Route::get('/manage', [AuthorController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [AuthorController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [AuthorController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [AuthorController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [AuthorController::class, 'status'])->middleware('CheckLogout');
    });

    //participate author - tac gia tham gia
    Route::prefix('author_participate')->group(function () {
        Route::get('/manage', [AuthorParticipateController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [AuthorParticipateController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{MaSach}-{MaTacGia}', [AuthorParticipateController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [AuthorParticipateController::class, 'delete'])->middleware('CheckLogout');
    });

    //theme book - the loai
    Route::prefix('theme_book')->group(function () {
        Route::get('/manage', [ThemeBookController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [ThemeBookController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [ThemeBookController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [ThemeBookController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [ThemeBookController::class, 'status'])->middleware('CheckLogout');
    });

    //type book - loai
    Route::prefix('type_book')->group(function () {
        Route::get('/manage', [TypeBookController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [TypeBookController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [TypeBookController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [TypeBookController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [TypeBookController::class, 'status'])->middleware('CheckLogout');
    });

    //category - the loai
    Route::prefix('category')->group(function () {
        Route::get('/manage', [CategoryController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [CategoryController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [CategoryController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [CategoryController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [CategoryController::class, 'status'])->middleware('CheckLogout');
    });

    //supplier - nha xuat ban
    Route::prefix('supplier')->group(function () {
        Route::get('/manage', [SupplierController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [SupplierController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [SupplierController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [SupplierController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [SupplierController::class, 'status'])->middleware('CheckLogout');
    });

    //filter price - loc gia
    Route::prefix('filter_price')->group(function () {
        Route::get('/manage', [FilerPriceController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [FilerPriceController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [FilerPriceController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [FilerPriceController::class, 'delete'])->middleware('CheckLogout');
    });

    //promotion - khuyen mai
    Route::prefix('promotion')->group(function () {
        Route::get('/manage', [PromotionsController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [PromotionsController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [PromotionsController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [PromotionsController::class, 'delete'])->middleware('CheckLogout');
    });

    //address ship - dia chi ship
    Route::prefix('address_ship')->group(function () {
        Route::get('/manage', [AddressShipController::class, 'manage'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/create', [AddressShipController::class, 'create'])->middleware('CheckLogout');

        Route::match(['get', 'post'], '/edit/{id}', [AddressShipController::class, 'edit'])->middleware('CheckLogout');

        Route::post('/delete', [AddressShipController::class, 'delete'])->middleware('CheckLogout');

        Route::get('/status', [AddressShipController::class, 'status'])->middleware('CheckLogout');
    });

    //evaluate - danh gia
    Route::prefix('evaluate')->group(function () {
        Route::get('/users', [EvaluatesController::class, 'users'])->name('users')->middleware('CheckLogout');

        Route::post('/delete_user', [EvaluatesController::class, 'delete_user'])->middleware('CheckLogout');

        Route::get('/messages', [EvaluatesController::class, 'messages'])->name('messages')->middleware('CheckLogout');

        Route::post('/delete_message', [EvaluatesController::class, 'delete_message'])->middleware('CheckLogout');
    });
});
