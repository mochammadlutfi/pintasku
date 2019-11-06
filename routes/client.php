<?php
Route::namespace('Client')->group(function(){
    Route::get('/beranda', 'BerandaController@index')->name('beranda')->middleware('verified');

    Route::group(['prefix' => 'produk'], function () {
        // Route::match(['get', 'post'], '/order', 'ProductController@order')->name('order');
        // Route::match(['get', 'post'], '/order/domain', 'ProductController@domain')->name('order.domain');
        Route::get('/produk-layanan-saya','ProductController@my_product')->name('my_product');
        Route::get('/lisensi-saya','ProductController@my_license')->name('my_license');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::match(['get', 'post'], '/', 'OrderController@index')->name('order');
        Route::get('/domain','OrderController@domain')->name('order.domain');
        Route::post('domain_addon','OrderController@domain_addon')->name('order.domain_addon');
        Route::match(['get', 'post'], '/konfigurasi', 'OrderController@config')->name('order.config');
        Route::match(['get', 'post'], '/check-out', 'OrderController@checkout')->name('order.checkout');
        Route::post('domain_register','OrderController@domain_register')->name('order.domain_register');
        Route::post('change_cycles','OrderController@change_cycles')->name('order.change_cycles');
    });

    Route::group(['prefix' => 'domain'], function () {
        Route::match(['get', 'post'], '/cari', 'DomainController@cari')->name('domain.cari');
        Route::get('/', 'DomainController@index')->name('domain');
        Route::get('/detail/{id}', 'DomainController@detail')->name('domain.detail');
        Route::post('cek_register','DomainController@cek_register')->name('domain.cek_register');
    });

    Route::group(['prefix' => 'tagihan'], function () {
        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/', 'InvoiceController@index')->name('invoice');
            Route::get('/detail/{id}', 'InvoiceController@detail')->name('invoice.detail');
        });

    });
});
