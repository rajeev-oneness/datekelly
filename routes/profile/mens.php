<?php

//profile
Route::prefix('account')->group(function () {
    route::get('edit/{id}', 'MensController@edit')->name('men.account.edit');
    route::post('update', 'MensController@update')->name('men.account.update');
});

//profile
Route::prefix('premium/pictures')->group(function () {
    route::get('show', 'MensController@purchaedPremiumPictures')->name('men.premium.picture');
});

//profile
Route::prefix('favourites')->group(function () {
    route::get('list', 'MensController@favourites')->name('men.favourite.list');
});

?>