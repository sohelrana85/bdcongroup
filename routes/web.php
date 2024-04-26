<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientreviewController;
use App\Http\Controllers\Admin\CompanyprofileController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MissionvisionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/management', [HomeController::class, 'management'])->name('management');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product/single/{slug}', [HomeController::class, 'productDetails'])->name('product.single');
Route::get('/product/category/{id}', [HomeController::class, 'productCategory'])->name('product.category');
Route::get('/export/product/category/{id}', [HomeController::class, 'productExport'])->name('export.product.category');
Route::get('/import/product/category/{id}', [HomeController::class, 'productImport'])->name('import.product.category');
Route::get('/product/suplier', [HomeController::class, 'productSuplier'])->name('product.suplier');
Route::get('/product/brand/{id}', [HomeController::class, 'productBrand'])->name('product.brand');
Route::get('/gallery/page', [HomeController::class, 'gallery'])->name('gallery.page');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/send/message', [HomeController::class, 'sendMessage'])->name('send.message');

Route::get('/product/search', [HomeController::class, 'search'])->name('search.product');

Route::group(['middleware' => 'guest'], function () {
    // Authentication
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authCheck'])->name('login.check');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/registration', [AuthenticationController::class, 'registration'])->name('admin.registration');
    Route::post('/registration', [AuthenticationController::class, 'newUser'])->name('registration.store');
    Route::put('/password', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    Route::get('/profile', [AuthenticationController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthenticationController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');

    Route::get('/table', [DashboardController::class, 'table'])->name('table');
    Route::get('/form', [DashboardController::class, 'form'])->name('form');

    // Category Routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    //Brand Routes
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/brand/delete', [BrandController::class, 'destroy'])->name('brand.delete');

    //Product Routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/delete', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/remove-image/{id}', [ProductController::class, 'removeImage'])->name('product.remove.image');

    //Slider Routes
    Route::get('/sliders', [SliderController::class, 'index'])->name('slider.index');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/slider/delete', [SliderController::class, 'destroy'])->name('slider.delete');

    //About Routes
    Route::get('/abouts', [AboutController::class, 'index'])->name('abouts');
    Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');

    // Management Routes
    Route::get('/managements', [ManagementController::class, 'index'])->name('management.index');
    Route::post('/management/store', [ManagementController::class, 'store'])->name('management.store');
    Route::get('/management/edit/{id}', [ManagementController::class, 'edit'])->name('management.edit');
    Route::post('/management/update/{id}', [ManagementController::class, 'update'])->name('management.update');
    Route::post('/management/delete', [ManagementController::class, 'destroy'])->name('management.delete');

    // Gallery Routes
    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/gallery/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');

    // Client Review Routes
    Route::get('/clients', [ClientreviewController::class, 'index'])->name('clients.index');
    Route::post('/client/store', [ClientreviewController::class, 'store'])->name('client.store');
    Route::get('/client/edit/{id}', [ClientreviewController::class, 'edit'])->name('client.edit');
    Route::post('/client/update/{id}', [ClientreviewController::class, 'update'])->name('client.update');
    Route::post('/client/delete', [ClientreviewController::class, 'destroy'])->name('client.delete');

    //Company Profile Routes
    Route::get('/company/profile', [CompanyprofileController::class, 'index'])->name('company.profile');
    Route::post('/company/profile/update/{id}', [CompanyprofileController::class, 'update'])->name('company.profile.update');

    //Mission Vision Routes
    Route::get('/mission/vision', [MissionvisionController::class, 'index'])->name('mission.vision');
    Route::post('/mission/vision/update/{id}', [MissionvisionController::class, 'update'])->name('mission.vision.update');

    // Public Message Routes
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::post('/message/delete', [ContactController::class, 'destroy'])->name('message.delete');
    Route::post('/message/delete', [ContactController::class, 'destroy'])->name('message.delete');
});
