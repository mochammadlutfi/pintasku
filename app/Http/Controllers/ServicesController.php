<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function web_dev()
    {
        return view('services.web');
    }
    

    public function app_dev()
    {
        return view('services.app_dev');
    }

    public function domain()
    {
        return view('services.domain');
    }

    public function web_host()
    {
        return view('services.hosting');
    }
    public function detail_service()
    {
        return view('services.detail');
    }
}
