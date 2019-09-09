<?php
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        Route::get('/','LoginController@showLoginForm');
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');
    });

    Route::get('/beranda','HomeController@index')->name('beranda')->middleware('guard.verified:admin,admin.verification.notice');

    Route::group(['prefix' => '/wilayah'], function () {
        Route::post('/kota', 'WilayahController@get_kota')->name('wilayah.kota');
        Route::post('/kecamatan','WilayahController@get_kecamatan')->name('wilayah.kecamatan');
        Route::post('/kelurahan','WilayahController@get_kelurahan')->name('wilayah.kelurahan');
    });

    Route::group(['prefix' => 'client'], function(){
        Route::get('/list', 'ClientController@index')->name('client.list');
        Route::get('/detail/{id}', 'ClientController@detail')->name('client.detail');
        Route::match(['get', 'post'], '/tambah', 'ClientController@tambah')->name('client.tambah');
    });

    Route::get('/domains', 'DomainController@index')->name('domain');

    Route::group(['prefix' => 'services'], function(){

    });

    Route::group(['prefix' => 'product'],function(){
        Route::get('/list','ProductController@index')->name('product');
        Route::match(['get', 'post'], 'tambah', 'ProductController@tambah')->name('product.tambah');
        Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
        Route::post('/update/{id}','ProductController@update')->name('product.update');
        Route::post('hapus/{id}','ProductController@delete')->name('product.delete');

        Route::group(['prefix' => 'category'], function(){
            Route::get('/', 'CategoryController@index')->name('category');
            Route::post('/simpan','CategoryController@simpan')->name('category.simpan');
            Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
            Route::post('/update','CategoryController@update')->name('category.update');
            Route::get('/hapus/{id}','CategoryController@hapus')->name('category.hapus');
        });
    });

    Route::group(['prefix' => 'domain'],function(){
        Route::match(['get','post'],'tambah','DomainController@tambah')->name('domain.tambah');
        Route::get('/list','DomainController@index')->name('domain.list');
        Route::get('/edit/{id}','DomainController@edit')->name('domain.edit');
        Route::post('/update/{id}','DomainController@update')->name('domain.update');

        Route::group(['prefix' => 'tld'], function(){
            Route::get('/', 'TLDsController@index')->name('tld');
            Route::post('/simpan','TLDsController@simpan')->name('tld.simpan');
            Route::get('/edit/{id}','TLDsController@edit')->name('tld.edit');
            Route::post('/update','TLDsController@update')->name('tld.update');
            Route::get('/hapus/{id}','TLDsController@hapus')->name('tld.hapus');
        });

    });

});

/* ----------------------- Admin Routes END -------------------------------- */
