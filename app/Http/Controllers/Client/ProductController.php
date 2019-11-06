<?php

namespace App\Http\Controllers\Client;

use App\Helpers\GeneralHelp;
use App\Models\Hosting;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TLDs;
use Cart;
use Yajra\DataTables\DataTables;
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
            return view('backend.client.order.first', compact('hosting', 'webdev'));
        }else{

            Cart::clear();
            $value = $request->get('product_id');
            $data = Product::where('id', $value)->first();
            if($data->tipe == 'webapp')
            {
                $tipe = 'Web Application';
                $harga  = $data->harga->sekali;
                $bill_cycles = $data->harga->tipe;
                $durasi = $data->harga->tipe;
            }else{
                if($data->tipe == 'hosting')
                {
                    $tipe = 'Hosting';
                }elseif($data->tipe == 'webdev')
                {
                    $tipe = 'Web Development';
                }
                $harga  = $data->harga->bulanan;
                $bill_cycles = 'bulanan';
                $durasi = '1 Bulan';
            }
            $request->session()->put('product', $data);

            Cart::add(array(
                'id' => 11 . $data->id,
                'name' => $data->name,
                'price' => $data->harga->bulanan,
                'quantity' => 1,
                'attributes' => array(
                    'bill_cycles' => $bill_cycles,
                    'durasi' => $durasi,
                    'tipe' => $tipe,
                ),
            ));

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

    public function my_product(Request $request){
        if ($request->ajax()) {
            $data = Hosting::where('user_id', auth()->guard('web')->user()->id)->latest()->get();
            return Datatables::of($data)
                ->addColumn('tipe', function($row){
                    return $row->produk->category->name;
                })
                ->addColumn('produk', function($row){
                    return $row->produk->name.'<br>'.$row->domain;
                })
                ->addColumn('price', function($row){
                    return 'Rp '. number_format($row->jml_payment,0,",",".").',- <br>'. ucwords($row->durasi);
                })
                ->addColumn('next', function($row){
                    return GeneralHelp::tgl_indo($row->tgl_tempo);
                })
                ->addColumn('status', function($row){
                    if($row->status == 0)
                    {
                        $pembayaran = '<span class="badge badge-warning">Belum Bayar</span>';
                    }else if($row->invoice->status == 1){
                        $pembayaran = '<span class="badge badge-success">Sudah Bayar</span>';
                    }else{
                        $pembayaran = '<span class="badge badge-danger">Dibatalkan</span>';
                    }
                    return $pembayaran;
                })
                ->rawColumns(['hrg'])
                ->rawColumns(['tipe', 'produk', 'hrg'. 'next', 'status', 'price'])
                ->make(true);
        }
        return view('backend.client.product.my_product', compact(''));
    }


    public function my_license(){
        return view('backend.client.product.my_license');
    }
}
