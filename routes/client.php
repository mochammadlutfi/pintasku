<?php
Route::namespace('Client')->group(function(){
    Route::get('/beranda', 'BerandaController@index')->name('beranda')->middleware('verified');

    Route::group(['prefix' => 'produk'], function () {
        Route::get('/order', 'ProductController@order')->name('order');
        Route::get('/produk-layanan-saya','ProductController@my_product')->name('my_product');
        Route::get('/lisensi-saya','ProductController@my_license')->name('my_license');
    });

    Route::group(['prefix' => 'domain'], function () {
        Route::post('/', 'DomainController@index')->name('domain');
    });
});
