<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TLDs;
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
    public function order(Request $request){
        if($request->isMethod('get')){
            $hosting = Product::where('tipe', 'hosting')->latest()->get();
            $webdev = Product::where('tipe', 'webdev')->latest()->get();
            return view('backend.client.order.index', compact('hosting', 'webdev'));
        }else{

            if(empty($request->session()->get('product'))){
                $product = new Product();
                $request->session()->put('product', $product);
            }else{
                $product = $request->session()->get('product');
                $request->session()->put('product', $product);
            }

            return redirect(route('order.domain'));

        }
    }

    public function domain(Request $request){
        if($request->isMethod('get')){
            $hosting = Product::where('tipe', 'hosting')->latest()->get();
            $tld = TLDs::latest()->get();
            return view('backend.client.order.kedua', compact('hosting', 'tld'));
        }else{

            if(empty($request->session()->get('product'))){
                $product = new Product();
                $request->session()->put('product', $product);
            }else{
                $product = $request->session()->get('product');
                $request->session()->put('product', $product);
            }

            return redirect(route('order.domain'));

        }
    }

    public function my_product(){
        return view('backend.client.product.my_product');
    }


    public function my_license(){
        return view('backend.client.product.my_license');
    }
}
