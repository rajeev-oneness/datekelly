<?php
    Route::group(['middleware' => 'admin'], function() {

        //category section
        Route::get('/admin-category', 'Admin\CategoryController@index')->name('admin.category');
        Route::get('/admin-category-add', 'Admin\CategoryController@add')->name('admin.category.add');
        Route::post('/admin-category-store', 'Admin\CategoryController@store')->name('admin.category.store');
        Route::get('/admin-category-edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('/admin-category-update', 'Admin\CategoryController@update')->name('admin.category.update');
        Route::get('/admin-category-delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');

        // Services
        Route::group(['prefix' => 'services'],function(){
            
        });
    
        
        //country section
        Route::get('/admin-country', 'Admin\CountryController@index')->name('admin.country');
        Route::get('/admin-country-add', 'Admin\CountryController@add')->name('admin.country.add');
        Route::post('/admin-country-store', 'Admin\CountryController@store')->name('admin.country.store');
        Route::get('/admin-country-edit/{id}', 'Admin\CountryController@edit')->name('admin.country.edit');
        Route::post('/admin-country-update', 'Admin\CountryController@update')->name('admin.country.update');
        Route::get('/admin-country-delete/{id}', 'Admin\CountryController@delete')->name('admin.country.delete');

        
        //package section
        Route::get('/admin-package', 'Admin\PackageController@index')->name('admin.package');
        Route::get('/admin-package-add', 'Admin\PackageController@add')->name('admin.package.add');
        Route::post('/admin-package-store', 'Admin\PackageController@store')->name('admin.package.store');
        Route::get('/admin-package-edit/{id}', 'Admin\PackageController@edit')->name('admin.package.edit');
        Route::post('/admin-package-update', 'Admin\PackageController@update')->name('admin.package.update');
        Route::get('/admin-package-delete/{id}', 'Admin\PackageController@delete')->name('admin.package.delete');

        
        //city section
        Route::get('/admin-city', 'Admin\CityController@index')->name('admin.city');
        Route::get('/admin-city-add', 'Admin\CityController@add')->name('admin.city.add');
        Route::post('/admin-city-store', 'Admin\CityController@store')->name('admin.city.store');
        Route::get('/admin-city-edit/{id}', 'Admin\CityController@edit')->name('admin.city.edit');
        Route::post('/admin-city-update', 'Admin\CityController@update')->name('admin.city.update');
        Route::get('/admin-city-delete/{id}', 'Admin\CityController@delete')->name('admin.city.delete');

        
        //site settings section
        Route::get('/admin/site-settings/manage', 'AdminController@siteSettingsEdit')->name('admin.site-settings.edit');
        Route::post('/admin/site-settings/update', 'AdminController@siteSettingsUpdate')->name('admin.site-settings.update');


        //mens section
        Route::get('/admin-mens', 'MensController@index')->name('admin.mens');
        Route::get('/admin-mens-add', 'MensController@add')->name('admin.mens.add');
        Route::post('/admin-mens-store', 'MensController@store')->name('admin.mens.store');
        Route::get('/admin-mens-edit/{id}', 'MensController@edit')->name('admin.mens.edit');
        Route::post('/admin-mens-update', 'MensController@update')->name('admin.mens.update');
        Route::get('/admin-mens-delete/{id}', 'MensController@delete')->name('admin.mens.delete');
        Route::get('/admin-mens-details/{id}', 'MensController@show')->name('admin.mens.details');


        //clubs section
        Route::get('/admin-clubs', 'ClubsController@index')->name('admin.clubs');
        Route::get('/admin-clubs-add', 'ClubsController@add')->name('admin.clubs.add');
        Route::post('/admin-clubs-store', 'ClubsController@store')->name('admin.clubs.store');
        Route::get('/admin-clubs-edit/{id}', 'ClubsController@edit')->name('admin.clubs.edit');
        Route::post('/admin-clubs-update', 'ClubsController@update')->name('admin.clubs.update');
        Route::get('/admin-clubs-delete/{id}', 'ClubsController@delete')->name('admin.clubs.delete');
        Route::get('/admin-clubs-details/{id}', 'ClubsController@show')->name('admin.clubs.details');

        
        //ladies section
        Route::get('/admin-ladies', 'LadiesController@index')->name('admin.ladies');
        Route::get('/admin-ladies-add', 'LadiesController@add')->name('admin.ladies.add');
        Route::post('/admin-ladies-store', 'LadiesController@store')->name('admin.ladies.store');
        Route::get('/admin-ladies-edit/{id}', 'LadiesController@edit')->name('admin.ladies.edit');
        Route::post('/admin-ladies-update', 'LadiesController@update')->name('admin.ladies.update');
        Route::get('/admin-ladies-delete/{id}', 'LadiesController@delete')->name('admin.ladies.delete');
        Route::get('/admin-ladies-details/{id}', 'LadiesController@show')->name('admin.ladies.details');
        
        
        //advertisement section
        Route::get('/admin-advertisement', 'AdvertisementController@index')->name('admin.advertisement');
        Route::get('/admin-advertisement-show/{id}', 'AdvertisementController@show')->name('admin.advertisement.show');
        Route::get('/admin-advertisement-verify/{id}', 'AdvertisementController@verify')->name('admin.advertisement.verify');
        Route::get('/admin-advertisement-delete/{id}', 'AdvertisementController@delete')->name('admin.advertisement.delete');


        //transaction section
        Route::get('/admin-transaction', 'Transaction\TransactionController@index')->name('admin.transaction');
        Route::get('/admin-transaction-delete/{id}', 'Transaction\TransactionController@delete')->name('admin.transaction.delete');


        //reports
        Route::get('/admin-reports', 'ReportController@index')->name('admin.report');
        Route::post('/get-transaction-reports', 'ReportController@getTransactionReport')->name('transaction.report');
        Route::post('/get-advertisements-reports', 'ReportController@getAdvertisementReport')->name('advertisement.report');


        //admin profile change
        Route::get('/admin-profile', 'AdminController@changeProfile')->name('admin.change.profile');
        Route::post('/update-admin-profile', 'AdminController@updateProfile')->name('admin.update.profile');

        //cup size
        Route::prefix('cups')->group(function () {
            Route::get('/', 'Admin\CupSizeController@index')->name('admin.cup.list');
            Route::post('/store', 'Admin\CupSizeController@store')->name('admin.cup.store');
            Route::post('/update', 'Admin\CupSizeController@update')->name('admin.cup.update');
            Route::get('/delete/{id}', 'Admin\CupSizeController@delete')->name('admin.cup.delete');
        });
        
        //body size
        Route::prefix('body/size')->group(function () {
            Route::get('/', 'Admin\BodySizeController@index')->name('admin.body.list');
            Route::post('/store', 'Admin\BodySizeController@store')->name('admin.body.store');
            Route::post('/update', 'Admin\BodySizeController@update')->name('admin.body.update');
            Route::get('/delete/{id}', 'Admin\BodySizeController@delete')->name('admin.body.delete');
        });
        
        //origin
        Route::prefix('origin')->group(function () {
            Route::get('/', 'Admin\OriginController@index')->name('admin.origin.list');
            Route::post('/store', 'Admin\OriginController@store')->name('admin.origin.store');
            Route::post('/update', 'Admin\OriginController@update')->name('admin.origin.update');
            Route::get('/delete/{id}', 'Admin\OriginController@delete')->name('admin.origin.delete');
        });
        
        //language
        Route::prefix('language')->group(function () {
            Route::get('/', 'Admin\LanguageController@index')->name('admin.language.list');
            Route::post('/store', 'Admin\LanguageController@store')->name('admin.language.store');
            Route::post('/update', 'Admin\LanguageController@update')->name('admin.language.update');
            Route::get('/delete/{id}', 'Admin\LanguageController@delete')->name('admin.language.delete');
        });
    });
?>