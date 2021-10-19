<?php

//profile
Route::prefix('account')->group(function () {
    route::get('edit/{id}', 'LadiesController@edit')->name('lady.account.edit');
    route::post('update', 'LadiesController@update')->name('lady.account.update');
});
//premium pictures
Route::prefix('premium-pictures')->group(function () {
    route::get('list', 'Ladies\PremiumPictureController@index')->name('lady.premium.picture.list');
    // route::get('show/{id}', 'Ladies\PremiumPictureController@show')->name('lady.premium.picture.show');
    route::get('add', 'Ladies\PremiumPictureController@add')->name('lady.premium.picture.add');
    route::post('store', 'Ladies\PremiumPictureController@store')->name('lady.premium.picture.store');
    route::get('edit', 'Ladies\PremiumPictureController@edit')->name('lady.premium.picture.edit');
    route::post('update', 'Ladies\PremiumPictureController@update')->name('lady.premium.picture.update');
    Route::get('delete/{id}', 'Ladies\PremiumPictureController@delete')->name('lady.premium.picture.delete');
    Route::get('set-delete', 'Ladies\PremiumPictureController@setDelete')->name('lady.premium.picture.delete.set');
});


?>