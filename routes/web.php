<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FirstPage\FaqController;
use App\Http\Controllers\Admin\FirstPage\GuidelineController;
use App\Http\Controllers\Admin\FirstPage\PrivacyPolicyController;
use App\Http\Controllers\Admin\FirstPage\TouController;
use App\Http\Controllers\Admin\MakerController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/aboutme', [WelcomeController::class, 'aboutMe'])->name('about-me');
Route::get('/tos', [WelcomeController::class, 'tos'])->name('tos');
Route::get('/privacy', [WelcomeController::class, 'privacy'])->name('privacy');
Route::get('/faq', [WelcomeController::class, 'faq'])->name('faq');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::get('/guideline', [WelcomeController::class, 'guideline'])->name('guideline');
Route::get('/infor_setting', [WelcomeController::class, 'infor_setting'])->name('infor_setting');
Route::get('/blogs', [WelcomeController::class, 'blogIndex'])->name('blogs');
Route::get('/blogs/{blog}', [WelcomeController::class, 'blogDetail'])->name('blogs.detail');
Route::post('/products-by-maker', [WelcomeController::class, 'searchByMaker'])->name('search-by-maker');
Route::post('/reviews-by-features', [WelcomeController::class, 'searchByFeatures'])->name('search-by-features');
Route::post('/products-by-name', [WelcomeController::class, 'searchByName'])->name('search-by-name');
Route::get('/products/{product}', [WelcomeController::class, 'productDetail'])->name('products.detail');
Route::post('/add-review', [WelcomeController::class, 'addReview'])->name('add-review');
Route::post('/add-favorites', [WelcomeController::class, 'addFavorites'])->name('add-favorites');
Route::get('/notifications/{notifidatin}', [WelcomeController::class, 'detailNotification'])->name('detail-notification');
Route::get('/notifications', [WelcomeController::class, 'notificationList'])->name('notification-list');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/contact-confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');
// Route::middleware('guest')->group(function () {
// });

// Route::middleware('auth')->group(function () {
//     Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');
// });

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->name('admin.')->group(function () {
  
    Route::get('home', [HomeController::class, 'adminHome'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('products', ProductController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('product-reviews', ProductReviewController::class);
    Route::resource('makers', MakerController::class);
    Route::prefix('first-page')->name('first-page.')->group(function () {
        Route::resource('privacy-policies', PrivacyPolicyController::class);
        Route::resource('tou', TouController::class);
        Route::resource('guidelines', GuidelineController::class);
        Route::resource('faq', FaqController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile-confirm', [ProfileController::class, 'editConfirm'])->name('profile.edit-confirm');
    Route::get('/profile-favorite', [ProfileController::class, 'favorite'])->name('profile.edit-favorite');
    Route::get('/profile-review', [ProfileController::class, 'review'])->name('profile.edit-review');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/get-review', [ProfileController::class, 'getReview'])->name('profile.get-review');
    Route::post('/profile/update-review', [ProfileController::class, 'updateReview'])->name('profile.update-review');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/favorite-delete/{id}', [ProfileController::class, 'favoriteDelete'])->name('profile.favorite-delete');
    Route::delete('/profile/review-delete/{id}', [ProfileController::class, 'reviewDelete'])->name('profile.review-delete');
});

require __DIR__.'/auth.php';
