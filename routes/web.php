<?php
Route::get('coba',function(){
    $list_accounts = CpanelWhm::listpkgs();

    // dd($list_accounts);
    // return $list_accounts->package['name'];
    // $list_accounts->package->name;
    $data = json_decode($list_accounts);

    foreach($data->package as $d)
    {
        echo $d->name;
    }
});

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

Auth::routes();


Route::get('/beranda', 'Client\BerandaController@index')->name('beranda')->middleware('verified');

Route::group(['prefix' => '/wilayah'], function () {
    Route::post('/kota', 'WilayahController@get_kota')->name('wilayah.kota');
    Route::post('/kecamatan','WilayahController@get_kecamatan')->name('wilayah.kecamatan');
    Route::post('/kelurahan','WilayahController@get_kelurahan')->name('wilayah.kelurahan');
});
