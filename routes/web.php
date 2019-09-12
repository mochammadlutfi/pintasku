<?php


/* --------------------- Common/User Routes START -------------------------------- */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-us', 'AboutController@index')->name('about');
Route::get('/products', 'ProductController@index')->name('product');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::group(['prefix' => 'services'], function(){
    Route::get('/web-development', 'ServicesController@web_dev')->name('service.web');
    Route::get('/app-development', 'ServicesController@app_dev')->name('service.app');
    Route::get('/domain-registration', 'ServicesController@domain')->name('service.domain');
    Route::get('/web-hosting', 'ServicesController@web_host')->name('service.hosting');
});

Auth::routes([ 'verify' => true ]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/wilayah'], function () {
    Route::post('/kota', 'WilayahController@get_kota')->name('wilayah.kota');
    Route::post('/kecamatan','WilayahController@get_kecamatan')->name('wilayah.kecamatan');
    Route::post('/kelurahan','WilayahController@get_kelurahan')->name('wilayah.kelurahan');
});
