<?php

namespace App\Http\Controllers\Client;

use App\Helpers\InvoiceHelp;
use Cart;
use App\User;
use App\Models\Domain;
use App\Models\Product;
use App\Models\TLDs;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Order;
use App\Models\Provinsi;
use App\Models\Hosting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use LayerShifter\TLDExtract\Extract;
use Iodev\Whois\Whois;
use Illuminate\Support\Facades\Auth;
use Carbon;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
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

    public function index(Request $request){
        if($request->isMethod('get')){
            $hosting = Product::where('tipe', 'hosting')->latest()->get();
            $webdev = Product::where('tipe', 'webdev')->latest()->get();
            $cat_webdev = Category::where('tipe', 'webdev')->latest()->get();
            $web_app = Product::where('tipe', 'webapp')->latest()->get();
            return view('backend.client.order.first', compact('hosting', 'webdev', 'cat_webdev', 'web_app'));
        }else{
            $request->session()->forget(['produk', 'domain']);
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

            $produk = array(
                'id' => 11 . $data->id,
                'name' => $data->name,
                'price' => $harga,
                'quantity' => 1,
                'attributes' => array(
                    'bill_cycles' => $bill_cycles,
                    'durasi' => $durasi,
                    'tipe' => $tipe,
                    'product_id' => $data->id,
                    'package' => $data->package,
                ),
            );
            Cart::add($produk);
            $request->session()->put('produk', $produk);
            if($data->tipe == 'webapp')
            {
                return redirect(route('order.checkout'));
            }else{
                return redirect(route('order.domain'));
            }
        }
    }

    public function remove_cart($id)
    {
        if(Cart::remove($id))
        {
            $output = '<table class="table table-bordered" id="ringkasan_order"><tbody>';
            foreach(Cart::getContent() as $row)
            {
                $output .= '<tr class="produk">
                <td colspan="2" class="text-left">
                    <div class="h4 mb-0">
                        '. $row->name .'
                        <button type="button" class="btn btn-alt-danger btn-sm float-right" onclick="hapus_cart('. $row->id .')">
                            <i class="si si-trash"></i>
                        </button>
                    </div>
                    '. ($row->attributes->has('bill_cycles') ? ucwords($row->attributes->bill_cycles) : '') .'
                    <div class="h5 text-right mb-0">
                    Rp '.number_format($row->price,0,",",".") .',-
                    </div>
                </td>
            </tr>';
            }
            $output .= '<tr class="subtotal"><td width="30%">Subtotal</td><td class="text-right">Rp '. number_format(Cart::getSubTotal(0),0,",",".") .',-</td></tr>';
            $output .= '<tr class="h4 total"><td width="30%">Total</td><td class="text-right">Rp '. number_format(Cart::getTotal(0),0,",",".") .',-</td></tr>';
            $output .= '</tbody></table>';
            echo $output;
        }else{
            return response()->json([
                'fail' => true,
            ]);
        }
    }

    public function config(Request $request)
    {
        if($request->isMethod('get')){
            // dd(session()->all());
            $produk = $request->session()->get('produk');
            $item = Cart::get($produk['id']);
            $product = Product::find($produk['attributes']['product_id']);

            $domain = $request->session()->get('domain');
            $domain = Cart::get($produk['id']);
            return view('backend.client.order.ketiga', compact('product', 'item'));
        }else{

        }
    }

    public function domain(){
        $hosting = Product::where('tipe', 'hosting')->latest()->get();
        $tld = TLDs::latest()->get();
        return view('backend.client.order.kedua', compact('hosting', 'tld'));
    }

    public function domain_register(Request $request)
    {
        $tld = TLDs::where('name', $request->register_tld)->first();
        $domain = array(
            'id' => 12 . $tld->id,
            'name' => $request->register_name . $request->register_tld,
            'price' => $tld->register,
            'quantity' => 1,
            'attributes' => array(
                'bill_cycles' => 1,
                'durasi' => '1 Tahun',
                'tipe' => 'Domain Register',
                'dnsmanagement' => 0,
                'idprotection' => 0,
                'emailforwarding' => 0,
            ),
        );
        $tambah = Cart::add($domain);
        $request->session()->put('domain', $domain);
        $produk = $request->session()->get('produk');

        // Perbaharui Cart Produk
        $product = array(
            'attributes' => array(
                'bill_cycles' => $produk['attributes']['bill_cycles'],
                'durasi' => $produk['attributes']['durasi'],
                'tipe' => $produk['attributes']['tipe'],
                'product_id' =>$produk['attributes']['product_id'],
                'domain' => $request->register_name . $request->register_tld,
                'package' => $produk['attributes']['package'],
            ),
        );
        Cart::update($produk['id'], $product);
        $request->session()->put('produk.attributes.domain', $request->register_name . $request->register_tld);
        if($tambah)
        {
            return response()->json([
                'fail' => false,
                'url' => route('order.config')
            ]);
        }else{
            return response()->json([
                'fail' => true,
            ]);
        }
    }

    public function domain_transfer(Request $request)
    {
        $tld = TLDs::where('name', $request->register_tld)->first();
        $domain = array(
            'id' => 12 . $tld->id,
            'name' => $request->register_name . $request->register_tld,
            'price' => $tld->register,
            'quantity' => 1,
            'attributes' => array(
                'bill_cycles' => 1,
                'durasi' => '1 Tahun',
                'tipe' => 'Domain Register',
                'dnsmanagement' => 0,
                'idprotection' => 0,
                'emailforwarding' => 0,
            ),
        );
        $tambah = Cart::add($domain);
        $request->session()->put('domain', $domain);
        $produk = $request->session()->get('produk');

        // Perbaharui Cart Produk
        $product = array(
            'attributes' => array(
                'bill_cycles' => $produk['attributes']['bill_cycles'],
                'durasi' => $produk['attributes']['durasi'],
                'tipe' => $produk['attributes']['tipe'],
                'product_id' =>$produk['attributes']['product_id'],
                'domain' => $request->register_name . $request->register_tld,
            ),
        );
        Cart::update($produk['id'], $product);
        $request->session()->put('produk.attributes.domain', $request->register_name . $request->register_tld);
        if($tambah)
        {
            return response()->json([
                'fail' => false,
                'url' => route('order.config')
            ]);
        }else{
            return response()->json([
                'fail' => true,
            ]);
        }
    }

    public function domain_addon(Request $request)
    {
        $value = $request->get('value');
        // dd($request->all());
        $domain = $request->session()->get('domain');
        $domain_cart = Cart::get($domain['id']);
        if($request->get('tipe') == 'dnsmanagement')
        {
            if($value == 1)
            {
                $domain_cart->attributes['dnsmanagement'] = 1 ;
                $request->session()->put('domain.attributes.dnsmanagement', 1);
            }else{
                $domain_cart->attributes['dnsmanagement'] = 0 ;
                $request->session()->put('domain.attributes.dnsmanagement', 0);
            }
        }else if($request->get('tipe') == 'idprotection')
        {
            if($value == 1)
            {
                $domain_cart->attributes['idprotection'] = 1 ;
                $request->session()->put('domain.attributes.idprotection', 1);
            }else{
                $domain_cart->attributes['idprotection'] = 0 ;
                $request->session()->put('domain.attributes.idprotection', 0);
            }
        }else if($request->get('tipe') == 'emailforwarding')
        {
            if($value == 1)
            {
                $domain_cart->attributes['emailforwarding'] = 1 ;
                $request->session()->put('domain.attributes.emailforwarding', 1);
            }else{
                $domain_cart->attributes['emailforwarding'] = 0 ;
                $request->session()->put('domain.attributes.emailforwarding', 0);
            }
        }
        // dd(Cart::get($domain['id']));
        // $product = array(
        //     'attributes' => array(
        //         'bill_cycles' => 1,
        //         'durasi' => '1 Tahun',
        //         'tipe' => 'Register Domain',
        //     ),
        // );
        // Cart::update($domain['id'], $product);
        echo $this->get_chart();
    }

    public function checkout(Request $request)
    {
        if($request->isMethod('get')){
            $provinsi = Provinsi::OrderBy('name', 'ASC')->get();
            return view('backend.client.order.keempat', compact('provinsi'));
        }else{
            if($request->domain_kontak == '1')
            {
                $rules = [
                    'nama' => 'required',
                    'email' => 'required',
                    'provinsi' => 'required',
                    'kota' => 'required',
                    'kecamatan' => 'required',
                    'kelurahan' => 'required',
                    'alamat' => 'required',
                ];

                $pesan = [
                    'nama.required' => 'Nama Lengkap Wajib Diisi!',
                    'email.required' => 'Alamat Email Wajib Diisi!',
                    'provinsi.required' => 'Provinsi Wajib Diisi!',
                    'kota.required' => 'Kota Wajib Diisi!',
                    'kecamatan.required' => 'Kecamatan Wajib Diisi!',
                    'kelurahan.required' => 'Kelurahan Wajib Diisi!',
                    'alamat.required' => 'Alamat Lengkap Wajib Diisi!',
                ];

                $validator = Validator::make($request->all(), $rules, $pesan);
                if ($validator->fails()){
                    return response()->json([
                        'fail' => true,
                        'errors' => $validator->errors()
                    ]);
                }
            }

            // Dapatkan Data Product Dari Session Product
            $ses_product = $request->session()->get('produk');
            $ses_domain = $request->session()->get('domain');

            // dd(Cart::getContent());
            // Mulai Tambah Data Ke Tabel Invoice
            $invoice = new Invoice();
            $invoice->user_id = Auth::guard('web')->user()->id;
            $invoice->kode = InvoiceHelp::get_invoice_code();
            $invoice->subtotal = Cart::getSubTotal(0);
            $invoice->total = Cart::getTotal(0);
            $invoice->status = 0;
            $invoice->tgl_tempo = \Carbon\Carbon::now()->addDays(10)->format('Y-m-d');
            $invoice->metode_pembayaran = 'Bank Transfer';
            if($invoice->save())
            {
                // Mulai Tambah Data Ke Tabel Order
                $order = new Order();
                $order->user_id = Auth::guard('web')->user()->id;
                $order->invoice_id = $invoice->id;
                $order->total = $invoice->total;
                $order->status = $request->get('status_order');
                $order->ipaddress = $request->getClientIp();
                if($order->save())
                {
                    // Mendapatkan Data Di Keranjang
                    foreach(Cart::getContent() as $row)
                    {
                        // Menyimpan Data Cart Di Array
                        $item = array(
                            'invoice_id' => $invoice->id,
                            'user_id' => Auth::guard('web')->user()->id,
                            'tipe' => $row->attributes->tipe,
                            'deskripsi' =>$row->name,
                            'jumlah' => $row->price,
                            'durasi' => $row->attributes->bill_cycles,
                        );
                        // Menambahkan Masal Di Tabel InvoiceItem
                        InvoiceItem::insert($item);

                        // Menambahkan Cart Ke Setiap Layanan
                        if($row->attributes->tipe == 'Domain Register' || $row->attributes->tipe == 'Domain Transfer')
                        {
                            if($row->attributes->tipe == 'Domain Register')
                            {
                                $tipe_domain = 'register';
                            }else{
                                $tipe_domain = 'transfer';
                            }

                            $domain_name = $row->name;

                            //Menambahkan Data Ke Tabel Domain
                            $domain = new Domain();
                            $domain->user_id = auth()->guard('web')->user()->id;
                            $domain->order_id = $order->id;
                            $domain->tipe = $tipe_domain;
                            $domain->tgl_registrasi = \Carbon\Carbon::now()->format('Y-m-d');
                            $domain->domain = $domain_name;
                            $domain->pay_first = $row->price;
                            $domain->pay_berulang = $row->price;
                            $domain->durasi = $row->attributes->bill_cycles;
                            $domain->tgl_expire = \Carbon\Carbon::now()->addYear($row->attributes->bill_cycles)->format('Y-m-d');
                            $domain->tgl_tempo = \Carbon\Carbon::now()->addYear($row->attributes->bill_cycles)->format('Y-m-d');
                            $domain->tgl_tempo_inv = $invoice->tgl_tempo;
                            $domain->dnsmanagement = $ses_domain['attributes']['dnsmanagement'];
                            $domain->emailforwarding = $ses_domain['attributes']['emailforwarding'];
                            $domain->idprotection = $ses_domain['attributes']['idprotection'];
                            $domain->status = 'Pending';
                            $domain->save();
                        }

                        if($row->attributes->tipe == 'Hosting' || $row->attributes->tipe == 'Web Development')
                        {
                            // Menentukan Tanggal Pembayaran Selanjutnya Pada Layanan Hosting
                            if($row->attributes->bill_cycles == 'bulanan')
                            {
                                $next_pembayaran = \Carbon\Carbon::now()->addMonth(1)->format('Y-m-d');
                            }else if($row->attributes->bill_cycles == 'triwulan')
                            {
                                $next_pembayaran = \Carbon\Carbon::now()->addMonth(3)->format('Y-m-d');
                            }else if($row->attributes->bill_cycles == 'caturwulan')
                            {
                                $next_pembayaran = \Carbon\Carbon::now()->addMonth(4)->format('Y-m-d');
                            }else if($row->attributes->bill_cycles == 'semester')
                            {
                                $next_pembayaran = \Carbon\Carbon::now()->addMonth(6)->format('Y-m-d');
                            }else{
                                $next_pembayaran = \Carbon\Carbon::now()->addYear()->format('Y-m-d');
                            }

                            // Mulai Tambah Data Ke Tabel Hosting Untuk Layanan Web Development, Web Hosting
                            $hosting = new Hosting();
                            $hosting->user_id = auth()->guard('web')->user()->id;
                            $hosting->order_id = $order->id;
                            $hosting->product_id = $ses_product['attributes']['product_id'];
                            $hosting->package = $ses_product['attributes']['package'];
                            $hosting->tgl_reg = \Carbon\Carbon::now()->format('Y-m-d');
                            $hosting->domain = $ses_product['attributes']['domain'];
                            $hosting->metode_pembayaran = 'Bank Transfer';
                            $hosting->first_payment = $row->price;
                            $hosting->jml_payment = $row->price;
                            $hosting->durasi = $row->attributes->bill_cycles;
                            $hosting->next_pembayaran = $next_pembayaran;
                            $hosting->next_invoice = $invoice->tgl_tempo;
                            $hosting->sts_domain = 'Pending';
                            $hosting->username = 'asd';
                            $hosting->password = 'asd';
                            $hosting->notes = '';
                            $hosting->save();
                        }

                    // End Looping Cart
                    }

                    // Apabila Semua Proses Penyimpanan Berhasil Maka Session Cart Di Hapus
                    $request->session()->forget(['produk', 'domain']);
                    Cart::clear();
                    return response()->json([
                        'fail' => false,
                        'url' => route('invoice.detail', $order->id),
                    ]);
                }
            }
            // End Insert
        }
    }

    public function change_cycles(Request $request)
    {
        $ses_product = $request->session()->get('produk');
        $data = Product::find($ses_product['attributes']['product_id']);
        if($request->get('bill_cycles') == 'bulanan')
        {
            $harga  = $data->harga->bulanan;
            $durasi = '1 Bulan';
        }else if($request->get('bill_cycles') == 'triwulan')
        {
            $harga  = $data->harga->triwulan;
            $durasi = '3 Bulan';
        }else if($request->get('bill_cycles') == 'caturwulan')
        {
            $harga  = $data->harga->caturwulan;
            $durasi = '4 Bulan';
        }else if($request->get('bill_cycles') == 'semester')
        {
            $harga  = $data->harga->semester;
            $durasi = '6 Bulan';
        }else if($request->get('bill_cycles') == 'tahunan')
        {
            $harga  = $data->harga->tahunan;
            $durasi = '1 Tahun';
        }

        if($data->tipe == 'hosting')
        {
            $tipe = 'Hosting';
        }elseif($data->tipe == 'webdev')
        {
            $tipe = 'Web Development';
        }elseif('appdev')
        {
            $tipe = 'Mobile Development';
        }
        Cart::update($ses_product['id'], array(
            'price' => $harga,
            'attributes' => array(
                'bill_cycles' => $request->get('bill_cycles'),
                'durasi' => $durasi,
                'tipe' => $tipe,
                'domain' => $ses_product['attributes']['domain'],
                'product_id' => $ses_product['attributes']['product_id'],
            ),
        ));

        echo $this->get_chart();
    }

    public function get_chart()
    {
        $output = '<table class="table table-bordered" id="ringkasan_order"><tbody>';
            foreach(Cart::getContent() as $row)
            {
                if(substr($row->attributes->tipe, 0, 6) == 'Domain')
                {
                    $addon = '<ul class="fa-ul">';
                    if($row->attributes->dnsmanagement == 1)
                    {
                        $addon .= '<li><i class="fa fa-check fa-li"></i>DNS Management</li>';
                    }else{
                        $addon .= '';
                    }
                    if($row->attributes->idprotection == 1)
                    {
                        $addon .= '<li><i class="fa fa-check fa-li"></i>ID Protection</li>';
                    }else{
                        $addon .= '';
                    }
                    if($row->attributes->emailforwarding == 1)
                    {
                        $addon .= '<li><i class="fa fa-check fa-li"></i>Email Forwarding</li>';
                    }else{
                        $addon .= '';
                    }
                    $addon .= '</ul>';
                }else{
                    $addon = '';
                }

                $output .= '<tr class="produk">
                <td colspan="2" class="text-left">
                    <div class="h4 mb-0">
                        '. ($row->attributes->has('tipe') ? ucwords($row->attributes->tipe) : '') .'
                        <button type="button" class="btn btn-alt-danger btn-sm float-right" onclick="hapus_cart('. $row->id .')">
                            <i class="si si-trash"></i>
                        </button>
                    </div>
                    '. $row->name .'<br>
                    '. $addon .'
                    <div class="h5 mb-0">
                        <span class="text-left">
                            '. ($row->attributes->has('durasi') ? ucwords($row->attributes->durasi) : '') .'
                        </span>
                        <span class="float-right text-right">

                            Rp '.number_format($row->price,0,",",".") .',-
                        </span>
                    </div>
                </td></tr>';
            }
        $output .= '<tr class="subtotal"><td width="30%">Subtotal</td><td class="text-right">Rp '. number_format(Cart::getSubTotal(0),0,",",".") .',-</td></tr>';
        $output .= '<tr class="h4 total"><td width="30%">Total</td><td class="text-right">Rp '. number_format(Cart::getTotal(0),0,",",".") .',-</td></tr>';
        $output .= '</tbody></table>';
        return $output;
    }

}
