<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InvoiceHelp;
use Cart;
use App\User;
use App\Models\Harga;
use App\Models\Product;
use App\Models\TLDs;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use LayerShifter\TLDExtract\Extract;
use Iodev\Whois\Whois;
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
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::latest()->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->setRowAttr([
                    'onClick' => function($row) {
                        return "detail(".$row->id.")";
                    },
                    'style' => 'cursor:pointer',
                ])
                ->addColumn('no_invoice', function($row){
                    return $row->invoice->kode;
                })
                ->addColumn('tgl', function($row){
                    return date('d-m-Y', strtotime($row->created_at));
                })
                ->addColumn('client', function($row){
                    return $row->client->name;
                })
                ->addColumn('metode_pembayaran', function($row){
                    return $row->invoice->metode_pembayaran;
                })
                ->addColumn('total', function($row){
                    return 'Rp '. number_format($row->total,0,",",".") .',-';
                })
                ->addColumn('status_pembayaran', function($row){
                    if($row->invoice->status == 0)
                    {
                        $pembayaran = '<span class="badge badge-warning">Belum Bayar</span>';
                    }else if($row->invoice->status == 1){
                        $pembayaran = '<span class="badge badge-success">Sudah Bayar</span>';
                    }else{
                        $pembayaran = '<span class="badge badge-danger">Dibatalkan</span>';
                    }
                    return $pembayaran;
                })
                ->addColumn('status_order', function($row){
                    if($row->status == 0)
                    {
                        $status = '<span class="badge badge-warning">Pending</span>';
                    }else if($row->status == 1){
                        $status = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $status = '<span class="badge badge-danger">Berakhir</span>';
                    }
                    return $status;
                })

                ->rawColumns(['no_invoice', 'tgl'. 'client', 'metode_pembayaran', 'total', 'status_pembayaran', 'status_order'])
                ->make(true);
        }
        return view('backend.admin.order.index', compact(''));

    }

    public function tambah(Request $request)
    {
        if($request->isMethod('get')){
            $domain = TLDs::latest()->get();
            $kategori = Category::where('status', 1)->latest()->get();
            $client = User::latest()->get();
            return view('backend.admin.order.tambah', compact('kategori', 'domain', 'client'));
        }else{
            // dd($request->all());
            $rules = [
                'client' => 'required',
                'metode_pembayaran' => 'required',
                'status_order' => 'required',
                'kategori' => 'required',
                'product' => 'required',
                'domain_produk' => 'required',
                'bill_cycles' => 'required',
            ];

            $pesan = [
                'client.required' => 'Client Wajib Diisi!',
                'metode_pembayaran.required' => 'Metode Pembayaran Wajib Diisi!',
                'status_order.required' => 'Status Order Wajib Diisi!',
                'kategori.required' => 'Kategori Produk/Layanan Wajib Diisi!',
                'product.required' => 'Produk/Layanan Wajib Diisi!',
                'domain_produk.required' => 'Domain Produk Wajib Diisi!',
                'bill_cycles' => 'Durasi Produk Wajib Diisi!',
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()){
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            }else{
                // dd($request->all());
                $invoice = new Invoice();
                $invoice->user_id = $request->get('client');
                $invoice->kode = InvoiceHelp::get_invoice_code();
                $invoice->subtotal = Cart::getSubTotal(0);
                $invoice->total = Cart::getTotal(0);
                $invoice->status = 0;
                $invoice->metode_pembayaran = $request->get('metode_pembayaran');
                if($invoice->save())
                {
                    $order = new Order();
                    $order->user_id = $request->get('client');
                    $order->invoice_id = $invoice->id;
                    $order->total = $invoice->total;
                    $order->status = $request->get('status_order');
                    $order->ipaddress = $request->getClientIp();
                    if($order->save())
                    {
                        foreach(Cart::getContent() as $row)
                        {
                            $item = array(
                                'invoice_id' => $invoice->id,
                                'user_id' => $request->get('client'),
                                'tipe' => $row->attributes->tipe,
                                'deskripsi' => $row->attributes->tipe. ' - ' .$row->name,
                                'jumlah' => $row->price,
                                'durasi' => $row->attributes->bill_cycles,
                            );
                            InvoiceItem::insert($item);
                        }
                        return response()->json([
                            'fail' => false,
                        ]);
                    }
                }
            }
        }
    }

<<<<<<< Updated upstream


=======
    public function detail($id){

        $order = Order::find($id);
        $invoice = Invoice::find($order->invoice_id);
        $item = InvoiceItem::where('invoice_id', $invoice->id)->latest()->get();
        return view('backend.admin.order.detail', compact('order', 'invoice', 'item'));
    }

    public function hapus($id)
    {
        $pasar = Pasar::destroy($id);
        if($pasar){
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function add_cart(Request $request){
        // dd($request->all());
        Cart::clear();
        $value = $request->get('value');
        $data = Product::where('id', $value)->first();
        if($data->tipe == 'webapp')
        {
            $tipe = 'Web Application';
            $harga  = $data->harga->sekali;
            $bill_cycles = $request->get('bill_cycles');
        }else{
            if($data->tipe == 'hosting')
            {
                $tipe = 'Hosting';
            }elseif($data->tipe == 'webdev')
            {
                $tipe = 'Web Development';
            }

            if($request->get('bill_cycles') == 'bulanan')
            {
                $harga  = $data->harga->bulanan;
            }else if($request->get('bill_cycles') == 'triwulan')
            {
                $harga  = $data->harga->triwulan;
            }else if($request->get('bill_cycles') == 'caturwulan')
            {
                $harga  = $data->harga->caturwulan;
            }else if($request->get('bill_cycles') == 'semester')
            {
                $harga  = $data->harga->semester;
            }else if($request->get('bill_cycles') == 'tahunan')
            {
                $harga  = $data->harga->tahunan;
            }
            $bill_cycles = $request->get('bill_cycles');
        }
        Cart::add(array(
            'id' => 11 . $data->id,
            'name' => $data->name,
            'price' => $harga,
            'quantity' => 1,
            'attributes' => array(
                'bill_cycles' => $bill_cycles,
                'tipe' => $tipe,
            ),
        ));
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

    public function change_cycles(Request $request)
    {
        $value = $request->get('value');
        // dd($value);
        $data = Product::where('id', $value)->first();
        if($request->get('bill_cycles') == 'bulanan')
        {
            $harga  = $data->harga->bulanan;
        }else if($request->get('bill_cycles') == 'triwulan')
        {
            $harga  = $data->harga->triwulan;
        }else if($request->get('bill_cycles') == 'caturwulan')
        {
            $harga  = $data->harga->caturwulan;
        }else if($request->get('bill_cycles') == 'semester')
        {
            $harga  = $data->harga->semester;
        }else if($request->get('bill_cycles') == 'tahunan')
        {
            $harga  = $data->harga->tahunan;
        }
        Cart::update(11 . $value, array(
            'price' => $harga,
            'attributes' => array(
                'bill_cycles' => $request->get('bill_cycles'),
            ),
          ));
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
    }

    public function add_domain(Request $request)
    {
        $domain = tld_extract($request->get('value'));
        $whois = Whois::create();
        if ($whois->isDomainAvailable($request->get('value')))
        {
            $tld = TLDs::where('name', '.'.$domain->suffix)->first();
            if($request->get('tipe') == 1)
            {
                $tipe = 'Register Domain';
                $harga = $tld->register;
            }elseif($request->get('tipe') == 2)
            {
                $tipe = 'Transfer Domain';
                $harga = $tld->transfer;
            }

            Cart::add(array(
                'id' => 12 . $tld->id,
                'name' => $request->get('value').' (1 Tahun)',
                'price' => $harga,
                'quantity' => 1,
                'attributes' => array(
                    'bill_cycles' => 1,
                    'tipe' => $tipe,
                ),
            ));

            $output = '<table class="table table-bordered" id="ringkasan_order"><tbody>';
            // dd(Cart::getContent());
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
        }
    }
>>>>>>> Stashed changes

}
