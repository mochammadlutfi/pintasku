<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
    public function order(){

        $hosting = Product::where('tipe', 'hosting')->latest()->get();
        $webdev = Product::where('tipe', 'webdev')->latest()->get();

        return view('backend.client.order.first', compact('hosting', 'webdev'));
    }


    public function my_product(){
        return view('backend.client.product.my_product');
    }


    public function my_license(){
        return view('backend.client.product.my_license');
    }
}
