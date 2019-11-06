<?php

namespace App\Http\Controllers\Client;

use App\Models\Domain;
use App\Models\TLDs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Egulias\EmailValidator\Warning\TLD;
use Illuminate\Support\Facades\Validator;
use Iodev\Whois\Whois;
use App\Helpers\GeneralHelp;
use Yajra\DataTables\DataTables;
class DomainController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Domain::where('user_id', auth()->guard('web')->user()->id)->latest()->get();
            return Datatables::of($data)
                ->setRowAttr([
                    'onClick' => function($row) {
                        return "detail(".$row->id.")";
                    },
                    'style' => 'cursor:pointer',
                ])
                ->addColumn('domain', function($row){
                    return $row->domain;
                })
                ->addColumn('tgl', function($row){
                    return  GeneralHelp::tgl_indo($row->created_at);
                })
                ->addColumn('tempo', function($row){
                    return  GeneralHelp::tgl_indo($row->tgl_tempo);
                })
                ->addColumn('perbaharui', function($row){
                    return 'Ya';
                })
                ->addColumn('status', function($row){
                    if($row->status == 0)
                    {
                        $pembayaran = '<span class="badge badge-warning">Pending</span>';
                    }else if($row->invoice->status == 1){
                        $pembayaran = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $pembayaran = '<span class="badge badge-danger">Dihentikan</span>';
                    }
                    return $pembayaran;
                })

                ->rawColumns(['no_invoice', 'tgl'. 'tempo', 'perbaharui', 'total', 'status'])
                ->make(true);
        }
        return view('backend.client.domain.index', compact('domain'));
    }


    public function detail($id){
        return view('backend.client.domain.detail');
    }

    public function cari(){

        $tld = TLDs::latest()->get();

        return view('backend.client.domain.cari', compact('tld'));
    }

    public function cek_register(Request $request)
    {
        // dd($request->all());
        $rules = [
            'register_name' => 'required|regex:/^(?:[A-Za-z]+)(?:[A-Za-z0-9-]*)$/u',
        ];

        $pesan = [
            'register_name.required' => 'Nama Domain Wajib Diisi!',
            'register_name.regex' => 'Format Nama Domain Tidak Valid!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $tld = TLDs::where('name', $request->register_tld)->first();
            $domain = $request->register_name. $request->register_tld;
            $whois = Whois::create();
            if ($whois->isDomainAvailable($domain))
            {
                $status = TRUE;
                $info = '<div class="alert alert-info alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">Selamat! <b>'. $domain .'</b> tersedia!<br>
                Klik lanjutkan untuk mendaftarkan domain ini dengan harga Rp '. number_format($tld->register,0,",",".") .',-</p>
            </div>';
            }else{
                $status = FALSE;
                $info = '<div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">'. $domain .' sudah digunakan. Silahkan Cari Domain lain!</p>
            </div>';
            }
            return response()->json([
                'fail' => false,
                'info' => $info,
            ]);
        }
    }
}
