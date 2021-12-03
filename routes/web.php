<?php

use Illuminate\Support\Facades\Route;

//artisan routes
Route::get('migrate', function(){
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('key:generate');
    \Artisan::call('migrate');
    return 'Migration Done "<a href="/ladies">Go to Home</a>"';
});

Route::get('migrate/rollback', function(){
    \Artisan::call('migrate:rollback --step=1');
    dd('migration rolled 1 step back!');
});

//front routes
Route::get('/', 'FrontController@ladiesHome')->name('homepage');
Route::get('/ladies', 'FrontController@ladiesHome')->name('ladies.home');
Route::get('/search', 'FrontController@search')->name('search.home');
Route::any('/search/result', 'FrontController@searchResult')->name('get.search.results');
Route::get('/club-agencies', 'FrontController@clubAgenciesHome')->name('club.agencies.home');
Route::get('/reviews', 'FrontController@getReviews')->name('reviews.home');

Route::middleware(['user.login'])->group(function () {
Route::get('/login-user', 'FrontController@login')->name('user.login');
});

//front user rgistration
Route::get('/register-user', 'FrontController@register')->name('user.register');
Route::get('/mens-register', 'FrontController@registerView')->name('user.mens.register');
Route::get('/ladies-register', 'FrontController@registerView')->name('user.ladies.register');
Route::get('/clubs-register', 'FrontController@registerView')->name('user.clubs.register');
Route::post('/mens-store', 'MensController@store')->name('mens.store');
Route::post('/ladies-store', 'LadiesController@store')->name('ladies.store');
Route::post('/clubs-store', 'ClubsController@store')->name('clubs.store');

//Auth
Auth::routes(['verify' => true,'register' => false,'logout' => false]);
Route::any('logout','HomeController@logout')->name('logout');

Route::get('verify/my/account','VerifyAccountController@emailverification')->name('verify.user.account');
//user dashboard
Route::middleware(['user.auth'])->group(function () {
    Route::get('/user/dashboard', 'FrontController@dashboard')->name('user.dashboard');
    Route::post('delete/my/{userId}/account','HomeController@deleteMyAccount')->name('user.account.delete');
    //advertisements
    Route::prefix('advertisements')->group(function () {
        route::get('list', 'AdvertisementController@index')->name('advertisement.list');
        route::get('show/{id}', 'AdvertisementController@show')->name('advertisement.show');
        route::get('add', 'AdvertisementController@add')->name('advertisement.add');
        route::post('store', 'AdvertisementController@store')->name('advertisement.store');
        route::get('edit/{id}', 'AdvertisementController@edit')->name('advertisement.edit');
        route::post('update/{adId}', 'AdvertisementController@update')->name('advertisement.update');
        Route::get('delete/{id}', 'AdvertisementController@delete')->name('advertisement.delete');
    });
    Route::post('advertisement/image_delete','AdvertisementController@deleteAdvertisementImage')->name('advertisement.image.delete');

    //reviews
    Route::prefix('reviews')->group(function () {
        route::get('list', 'ReviewController@index')->name('review.list');
        route::get('show/{id}', 'ReviewController@show')->name('review.show');
        route::get('add', 'ReviewController@add')->name('review.add');
        route::post('reply', 'ReviewController@reply')->name('review.reply');
        route::post('positive-negative', 'ReviewController@positiveNegative')->name('review.positive.negative');
        route::post('store', 'ReviewController@store')->name('review.store');
        // route::get('edit/{id}', 'ReviewController@edit')->name('review.edit');
        // route::post('update', 'ReviewController@update')->name('review.update');
        Route::get('delete/{id}', 'ReviewController@delete')->name('review.delete');
    });

    //messages
    Route::prefix('messages')->group(function () {
        route::get('list', 'MessageController@showConversations')->name('message.list');
        route::post('send-message-from-front', 'MessageController@messageSubmit')->name('message.from.front');
        route::post('get-messages-by-id', 'MessageController@getMessagesById')->name('get.messages.by.id');
        route::post('send-message-universal', 'MessageController@sendMessageUniversal')->name('send.message.universal');
    });

    //prchases
    Route::prefix('purchase')->group(function() {
        route::get('list', 'Transaction\TransactionController@getUserTransactions')->name('transaction.history');
        // route::get('buy/datekelly-coins', 'Transaction\TransactionController@buyDatekellyCoins')->name('transaction.history');
    });

    //datekelly coins
    Route::prefix('coins')->group(function() {
        route::get('buy', 'Transaction\TransactionController@buyCoins')->name('coins.buy');
        route::post('purchase/coin', 'Transaction\TransactionController@purchaseCoins')->name('coins.purchase');
    });
    
    //booking
    Route::prefix('booking')->group(function() {
        route::post('book', 'BookingController@book')->name('booking.create');
        route::get('list', 'BookingController@list')->name('booking.list');
        route::get('confirmation/{bookingId}', 'BookingController@confirmation')->name('booking.confirmation');
        route::get('manage/{bookingId}', 'BookingController@manage')->name('booking.manage');
        route::post('confirmed', 'BookingController@confirmed')->name('booking.confirmed');
        route::post('update', 'BookingController@update')->name('booking.update');
    });

    //verify account
    Route::prefix('verify-account')->group(function() {
        route::get('/', 'VerifyAccountController@index')->name('verify.account.view');
        route::post('/submit-verification', 'VerifyAccountController@submitImages')->name('verify.account.submit');
    });

    Route::prefix('profile/ladies')->group(function () {
        require 'profile/ladies.php';
    });
    Route::prefix('profile/clubs')->group(function () {
        require 'profile/clubs.php';
    });
    Route::prefix('profile/mens')->group(function () {
        require 'profile/mens.php';
    });
});

//love 
Route::post('check-love', 'AdvertisementController@checkLove')->name('check.love');
Route::post('count-love', 'AdvertisementController@countLove')->name('count.love');

//review like dislke 
Route::post('check-like-dislike', 'AdvertisementController@checkLikeDislike')->name('check.like.dislike');
Route::post('count-like-dislike', 'AdvertisementController@countLikeDislike')->name('count.like.dislike');

//change password
Route::group(['middleware' => 'auth'], function() {
    Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('change.password');
    Route::post('/update-password', 'Auth\ChangePasswordController@update')->name('update.password');
});

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    require 'admin.php';
});

//city and country ajax call
Route::post('/get-all-countries', 'Admin\CityController@getCountry')->name('get.country');
Route::post('/get-cities', 'Admin\CountryController@getCity')->name('get.country-wise.city');

//contact us
Route::get('/contact-us', 'FrontController@contactus')->name('contact.us');
Route::post('/submit-contact-us', 'FrontController@submitContact')->name('submit.contact');

Route::get('/terms-and-conditions', 'FrontController@termsConditions')->name('terms.conditions');
Route::get('/privacy-policy', 'FrontController@privacyPolicy')->name('privacy.policy');
Route::get('/faq', 'FrontController@faq')->name('faq');
Route::get('/about-us', 'FrontController@aboutUs')->name('about.us');


//category wise advertisement listing
Route::get('/advertisement-category/{categoryId}/{categoryName}', 'FrontController@adCategoryList')->name('advertisement.category.list');

//advertisements details
Route::get('/advertisement/details/{id}', 'AdvertisementController@show')->name('advertisement.detail');
