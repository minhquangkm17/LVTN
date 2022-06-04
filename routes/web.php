<?php

use App\Models\Category;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProductViewController;
use App\Http\Controllers\Frontend\UserDetailController;
use App\Http\Controllers\Frontend\BlogViewController;
use App\Http\Controllers\Frontend\IntroduceController;
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

//login auth laravel
require __DIR__ . '/auth.php';

// index
Route::get('/', [HomeController::class, 'home']);
Route::get('/trang-chu', [HomeController::class, 'home'])->name('index');

//cart
Route::prefix('/gio-hang')->name('cart.')->group(function () {
    Route::get('/number', [CartController::class, 'number'])->name('number')->middleware(['auth']);
    Route::get('/', [CartController::class, 'cart'])->middleware(['auth'])->name('shoppingcart'); 
    Route::get('/add-cart/{productInfo}', [CartController::class, 'addCart'])->middleware(['auth'])->name('addCart');
    Route::post('/remove-cart', [CartController::class, 'removeCart'])->middleware(['auth'])->name('removeCart');
    Route::get('/del-cart-item/{cartInfor}', [CartController::class, 'delItem'])->middleware(['auth'])->name('delItem');
});

Route::prefix('/payment')->name('payment.')->group(function () {
    Route::post('/', [CartController::class, 'paymentProcessor'])->name('paymentProcessor')->middleware(['auth']);
    Route::get('/callback', [CartController::class, 'callback'])->name('callback')->middleware(['auth']);
});


Route::prefix('/payment-histories')->name('payment.')->group(function () {
    Route::get('/', [\App\Http\Controllers\PaymentHistories::class, 'index'])->name('index')->middleware(['auth']);
    Route::get('detail/{paymentInfo}', [\App\Http\Controllers\PaymentHistories::class, 'detail'])->name('detail')->middleware(['auth']);
});


Route::prefix('/san-pham')->name('product.')->group(function () {
    Route::get('/', [ProductViewController::class, 'viewProduct']);
    Route::get('/{slug}', [ProductViewController::class, 'detail']);
});

// show blog frontend
Route::prefix('/tin-tuc')->name('blog.')->group(function () {
    Route::get('/', [BlogViewController::class, 'blog']);
    Route::get('/{slug}', [BlogViewController::class, 'detail'])->name('detail');
});

//introduce
Route::get('/gioi-thieu', [IntroduceController::class, 'introduce'])->name('intro');

// user
Route::prefix('/user')->name('user.')->group(function () {
    Route::get('/user-detail', [UserDetailController::class, 'userDetail'])->name('userDetail')->middleware(['auth']);
    Route::post('/edit-user-detail/{userInfo}', [UserDetailController::class, 'editUserDetail'])->name('editUserDetail.')->middleware(['auth']);
    Route::get('/edit-password', [UserDetailController::class, 'editUserPassword'])->name('editUserPassword')->middleware(['auth']);
    Route::post('/post-edit-password/{userInfo}', [UserDetailController::class, 'postEditUserPassword'])->name('postEditUserPassword')->middleware(['auth']);

});


//admin
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'admin']);
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::get('/index', [AdminController::class, 'showDashboard'])->name('index');
    Route::post('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/map', [AdminController::class, 'map'])->name('map');

//category
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'showCategory'])->name('show'); //show category
        Route::get('/add', [CategoryController::class, 'showForm'])->name('add'); // add category
        Route::post('/postadd', [CategoryController::class, 'addCategory'])->name('postadd'); // post add category
        Route::get('active/{id}', [CategoryController::class, 'active'])->name('active'); // update active category
        Route::get('unactive/{id}', [CategoryController::class, 'unactive'])->name('unactive'); // update unactive category
        Route::get('deleted/{id}', [CategoryController::class, 'destroy'])->name('deleted'); //deleted category
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit'); // show form edit
        Route::post('postedit/{id}', [CategoryController::class, 'postEdit'])->name('postedit.'); // post edit category
    });

//brand
    Route::prefix('brand')->name('brand.')->group(function () {
        Route::get('/', [BrandController::class, 'showBrand'])->name('show'); //show brand
        Route::get('/add', [BrandController::class, 'showForm'])->name('add'); // add brand
        Route::get('enable/{id}', [BrandController::class, 'enable'])->name('enable'); // update active category
        Route::get('disable/{id}', [BrandController::class, 'disable'])->name('disable'); // update unactive category
        Route::post('/postadd', [BrandController::class, 'addBrand'])->name('postadd'); // post add brand
        Route::get('deleted/{id}', [BrandController::class, 'destroy'])->name('deleted'); //deleted brand
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('edit'); // show form edit
        Route::post('postedit/{id}', [BrandController::class, 'postEdit'])->name('postedit.'); // post edit brand
    });

    // product
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'showProduct'])->name('show'); //show product
        Route::get('/add', [ProductController::class, 'showForm'])->name('add'); // add product
        Route::post('/postadd', [ProductController::class, 'postAddProduct'])->name('postadd'); // post add brand
        Route::get('deleted/{id}', [ProductController::class, 'destroy'])->name('deleted'); //deleted product
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit'); // show form edit
        Route::post('postedit/{id}', [ProductController::class, 'postEdit'])->name('postedit.'); // post edit product
        Route::get('enable/{id}', [ProductController::class, 'enable'])->name('enable'); // update active product
        Route::get('disable/{id}', [ProductController::class, 'disable'])->name('disable'); // update unactive product
        Route::get('gallery/{id}', [GalleryController::class, 'gallery'])->name('gallery'); // add to gallery
        Route::post('add-gallery/{id}', [GalleryController::class, 'addGallery'])->name('addgallery'); // add to gallery
        Route::post('select-gallery', [GalleryController::class, 'selectGallery'])->name('postgallery'); // post edit product
        Route::get('/destroy/{id}', [GalleryController::class, 'destroy']);
    });

    //blog
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'showPost'])->name('show');
        Route::get('/add', [BlogController::class, 'addBlog'])->name('add');
        Route::post('/postadd', [BlogController::class, 'postAddBlog'])->name('postadd');
        Route::get('enable/{id}', [BlogController::class, 'enable'])->name('enable'); // update active blog
        Route::get('disable/{id}', [BlogController::class, 'disable'])->name('disable'); // update unactive blog
        Route::get('deleted/{id}', [BlogController::class, 'destroy'])->name('deleted');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('edit'); // show form edit
        Route::post('postedit/{id}', [BlogController::class, 'postEdit'])->name('postedit.'); // post edit
    });

    Route::prefix('static-page')->name('static.')->group(function () 
    {
        Route::get('edit-intro', [StaticPageController::class, 'intro'])->name('editIntro');
        Route::post('post-edit-intro', [StaticPageController::class, 'postEditIntro'])->name('postedit');
        Route::get('edit-img', [StaticPageController::class, 'img'])->name('editImg');
        Route::post('post-logo', [StaticPageController::class, 'postEditLogo'])->name('postEditLogo');
    });


});
