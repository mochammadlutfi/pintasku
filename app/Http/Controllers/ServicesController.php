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
        return view('front.services.web_dev');
    }

    public function app_dev()
    {
        return view('front.services.app_dev');
    }

    public function domain()
    {
        return view('front.services.domain');
    }

    public function web_host()
    {
        return view('front.services.hosting');
    }
}
