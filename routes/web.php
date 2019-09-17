<?php
    use Iodev\Whois\Whois;
Route::get('coba',function(){

    // Creating default configured client
    $whois = Whois::create();

    // Checking availability
    if ($whois->isDomainAvailable("makaroniaku.com")) {
        print "Bingo! Domain is available! :)";
    }

    // // Supports Unicode (converts to punycode)
    // if ($whois->isDomainAvailable("почта.рф")) {
    //     print "Bingo! Domain is available! :)";
    // }

    // // Getting raw-text lookup
    // $response = $whois->lookupDomain("google.com");
    // print $response->getText();

    // // Getting parsed domain info
    // $info = $whois->loadDomainInfo("google.com");
    // print_r([
    //     'Domain created' => date("Y-m-d", $info->getCreationDate()),
    //     'Domain expires' => date("Y-m-d", $info->getExpirationDate()),
    //     'Domain owner' => $info->getOwner(),
    // ]);
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
Route::group(['prefix' => '/wilayah'], function () {
    Route::post('/kota', 'WilayahController@get_kota')->name('wilayah.kota');
    Route::post('/kecamatan','WilayahController@get_kecamatan')->name('wilayah.kecamatan');
    Route::post('/kelurahan','WilayahController@get_kelurahan')->name('wilayah.kelurahan');
});
Auth::routes([ 'verify' => true ]);

Auth::routes();




