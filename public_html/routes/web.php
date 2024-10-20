<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Front\HomeController as FrontHomeController;

use App\Http\Controllers\Admin\SpecificationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/setting', [HomeController::class, 'setting'])->name('setting');
    Route::get('/setting-home-video', [HomeController::class, 'settingHomeVideo'])->name('setting.home.video');
    Route::post('/setting-home-video-update', [HomeController::class, 'settingHomeVideoUpdate'])->name('home-video.update');
    Route::get('/setting-download-file', [HomeController::class, 'settingDownloadFile'])->name('setting.download.file');
    Route::post('/setting-download-file-update', [HomeController::class, 'settingDownloadFileUpdate'])->name('download-file.update');

    Route::resource('specification', SpecificationController::class);
    Route::get('specification-status-{id}', [SpecificationController::class, 'status'])->name('specification.status');

    Route::resource('category', CategoryController::class);

    Route::resource('product', ProductController::class);

    Route::resource('tag', TagController::class);
    Route::get('tag-status-{id}', [TagController::class, 'status'])->name('tag.status');

    Route::resource('media', MediaController::class);
    Route::get('media-status-{id}', [MediaController::class, 'status'])->name('media.status');
    Route::post('post-image-upload', [MediaController::class, 'imageupload'])->name('imageupload');

    Route::get('/work-with-us', [ContactusController::class, 'workWithUs'])->name('work.with.us');
    Route::get('/contact-us/part', [ContactusController::class, 'contactUsPart'])->name('contactus.part');
    Route::get('/contact-us/channel', [ContactusController::class, 'contactUsChannel'])->name('contactus.channel');
    Route::post('/channel-export', [ContactusController::class, 'channelExport'])->name('channel.export');
    Route::post('/part-export', [ContactusController::class, 'partExport'])->name('part.export');
    Route::post('/work-with-us-export', [ContactusController::class, 'workWithUsExport'])->name('work.with.us.export');

    Route::delete('/contact-us/part/{id}', [ContactusController::class, 'contactUsPartDelete'])->name('contactus.part.delete');
    Route::delete('/contact-us/channel/{id}', [ContactusController::class, 'contactUsChannelDelete'])->name('contactus.channel.delete');
    Route::delete('/work-with-us/{id}', [ContactusController::class, 'workWithUsDelete'])->name('work.with.us.delete');
});

Route::middleware(['frontdatashare'])->group(function () {
    Route::get('/search', [FrontHomeController::class, 'productSearch'])->name('product.search');
    Route::get('/', [FrontHomeController::class, 'index'])->name('home');
    Route::get('/category/{slug}', [FrontHomeController::class, 'category'])->name('category');
    Route::get('/products/{slug}', [FrontHomeController::class, 'products'])->name('products');
    Route::get('/product/{slug}', [FrontHomeController::class, 'productDetails'])->name('product');
    Route::get('/about', [FrontHomeController::class, 'about'])->name('about');
    Route::get('/publications', [FrontHomeController::class, 'publications'])->name('publications');
    Route::get('/events', [FrontHomeController::class, 'events'])->name('events');
    Route::get('/newsletters', [FrontHomeController::class, 'newsletters'])->name('newsletters');
    Route::get('/tag-blogs/{slug}', [FrontHomeController::class, 'tagBlogs'])->name('tag.blogs');
    Route::get('/blogs', [FrontHomeController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [FrontHomeController::class, 'blogView'])->name('blog.view');
    Route::get('/blog/details', [FrontHomeController::class, 'blogDetails'])->name('blog.details');
    Route::get('/contact-us', [FrontHomeController::class, 'contactUs'])->name('contactus');
    Route::get('/download-content', [FrontHomeController::class, 'downloadContent'])->name('download.content');
    Route::get('/work-with-us', [FrontHomeController::class, 'workWithUs'])->name('work.with.us');
    Route::post('/work-with-us-submit', [FrontHomeController::class, 'workWithUsSubmit'])->name('work.with.us.submit');
    Route::post('/contact-us/part', [FrontHomeController::class, 'contactUsPart'])->name('contactus.part');
    Route::post('/contact-us/channel', [FrontHomeController::class, 'contactUsChannel'])->name('contactus.channel');
});
