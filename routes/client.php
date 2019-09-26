<?php
Route::namespace('Client')->group(function(){
    Route::get('/beranda', 'BerandaController@index')->name('beranda')->middleware('verified');

    Route::group(['prefix' => 'produk'], function () {
        Route::match(['get', 'post'], '/order', 'ProductController@order')->name('order');
        Route::match(['get', 'post'], '/order/domain', 'ProductController@domain')->name('order.domain');
        // Route::get('/order', 'ProductController@order')->name('order');
        Route::get('/produk-layanan-saya','ProductController@my_product')->name('my_product');
        Route::get('/lisensi-saya','ProductController@my_license')->name('my_license');
    });

    Route::group(['prefix' => 'domain'], function () {
        Route::match(['get', 'post'], '/cari', 'DomainController@cari')->name('domain.cari');
        Route::get('/', 'DomainController@index')->name('domain');
        Route::get('/detail/{id}', 'DomainController@detail')->name('domain.detail');
    });

    Route::group(['prefix' => 'tagihan'], function () {
        Route::get('/', 'InvoiceController@index')->name('invoice');
        Route::get('/detail/{id}', 'InvoiceController@detail')->name('invoice.detail');
    });
});
