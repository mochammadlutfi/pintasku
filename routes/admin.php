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

    Route::group(['prefix' => 'client'], function(){
        Route::get('/list', 'ClientController@index')->name('client.list');
        Route::get('/detail/{id}', 'ClientController@detail')->name('client.detail');
        Route::match(['get', 'post'], '/tambah', 'ClientController@tambah')->name('client.tambah');
    });

    Route::group(['prefix' => 'lisensi'], function(){
        Route::get('/list', 'LicenseController@index')->name('license.list');
        Route::get('/detail/{id}', 'LicenseController@detail')->name('license.detail');
        Route::match(['get', 'post'], '/tambah', 'LicenseController@tambah')->name('license.tambah');

        Route::group(['prefix' => 'tipe'], function(){
            Route::get('/', 'LicenseTipeController@index')->name('license_tipe');
            Route::post('/simpan','LicenseTipeController@simpan')->name('license_tipe.simpan');
            Route::get('/edit/{id}','LicenseTipeController@edit')->name('license_tipe.edit');
            Route::post('/update','LicenseTipeController@update')->name('license_tipe.update');
            Route::get('/hapus/{id}','LicenseTipeController@hapus')->name('license_tipe.hapus');
        });
    });


    Route::get('/domains', 'DomainController@index')->name('domain');

    Route::group(['prefix' => 'order'], function(){
        Route::get('/list','OrderController@index')->name('order');
        Route::match(['get', 'post'], 'tambah', 'OrderController@tambah')->name('order.tambah');
        Route::get('/detail/{id}','OrderController@detail')->name('order.detail');
        Route::post('/update/{id}','OrderController@update')->name('order.update');
        Route::post('hapus/{id}','OrderController@delete')->name('order.delete');
        Route::post('add_cart','OrderController@add_cart')->name('order.add_cart');
        Route::get('remove_cart/{id}','OrderController@remove_cart')->name('order.remove_cart');
        Route::post('change_cycles','OrderController@change_cycles')->name('order.change_cycles');
        Route::post('add_domain','OrderController@add_domain')->name('order.add_domain');
    });

    Route::group(['prefix' => 'product'],function(){
        Route::get('/list','ProductController@index')->name('product');
        Route::match(['get', 'post'], 'tambah', 'ProductController@tambah')->name('product.tambah');
        Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
        Route::post('/update/{id}','ProductController@update')->name('product.update');
        Route::post('hapus/{id}','ProductController@delete')->name('product.delete');
        Route::post('/product', 'ProductController@get_kota')->name('product.json');
        Route::get('/web_app', 'ProductController@web_app')->name('product.web_app');
        Route::get('/web_dev', 'ProductController@web_dev')->name('product.web_dev');
        Route::get('/app_dev', 'ProductController@app_dev')->name('product.app_dev');

        Route::group(['prefix' => 'category'], function(){
            Route::get('/', 'CategoryController@index')->name('category');
            Route::post('/simpan','CategoryController@simpan')->name('category.simpan');
            Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
            Route::post('/update','CategoryController@update')->name('category.update');
            Route::get('/hapus/{id}','CategoryController@hapus')->name('category.hapus');
        });
    });

    Route::group(['prefix' => 'domain'],function(){
        Route::get('/', 'TLDsController@index')->name('tld');
        Route::post('/simpan','TLDsController@simpan')->name('tld.simpan');
        Route::get('/edit/{id}','TLDsController@edit')->name('tld.edit');
        Route::post('/update','TLDsController@update')->name('tld.update');
        Route::get('/hapus/{id}','TLDsController@hapus')->name('tld.hapus');
    });

    Route::group(['prefix' => 'billing'], function(){

        Route::group(['prefix' => 'invoice'], function(){
            Route::get('/', 'InvoiceController@index')->name('invoice');
            Route::get('/detail/{id}','InvoiceController@detail')->name('invoice.detail');
            Route::post('/pembayaran','InvoiceController@pembayaran')->name('invoice.pembayaran');
        });

        Route::group(['prefix' => 'transaksi'], function(){
            Route::get('/', 'TransaksiController@index')->name('transaksi');
            Route::get('/detail/{id}','TransaksiController@detail')->name('transaksi.detail');
        });


    });

});

/* ----------------------- Admin Routes END -------------------------------- */
