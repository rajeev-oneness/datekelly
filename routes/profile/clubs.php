<?php

//profile
Route::prefix('account')->group(function () {
    route::get('edit/{id}', 'ClubsController@edit')->name('club.account.edit');
    route::post('update', 'ClubsController@update')->name('club.account.update');
});

//Banners
Route::prefix('business-banners')->group(function () {
    route::get('list', 'Clubs\BusinessBannerController@index')->name('club.business.banner.list');
    // route::get('show/{id}', 'Clubs\BusinessBannerController@show')->name('club.business.banner.show');
    route::get('add', 'Clubs\BusinessBannerController@add')->name('club.business.banner.add');
    route::post('store', 'Clubs\BusinessBannerController@store')->name('club.business.banner.store');
    route::get('edit/{id}', 'Clubs\BusinessBannerController@edit')->name('club.business.banner.edit');
    route::post('update', 'Clubs\BusinessBannerController@update')->name('club.business.banner.update');
    Route::get('delete/{id}', 'Clubs\BusinessBannerController@delete')->name('club.business.banner.delete');
});


?>