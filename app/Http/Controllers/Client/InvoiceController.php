<?php

namespace App\Http\Controllers\Client;

use App\Models\TLDs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('backend.client.tagihan.index');
    }


    public function detail($id){
        return view('backend.client.tagihan.detail');
    }

}
