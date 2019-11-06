<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TLDs;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TransaksiController extends Controller
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
            $data = Transaksi::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('no_invoice', function($row){
                    return $row->invoice->kode;
                })
                ->addColumn('client', function($row){
                    return $row->invoice->client->name;
                })
                ->addColumn('total', function($row){
                    return 'Rp '. number_format($row->jumlah,0,",",".") .',-';
                })
                ->addColumn('metode_pembayaran', function($row){
                    return $row->metode;
                })
                ->addColumn('tgl', function($row){
                    return date('d-m-Y', strtotime($row->tgl_bayar));
                })
                ->rawColumns(['no_invoice', 'cient', 'total', 'metode_pembayaran', 'tgl'])
                ->make(true);
        }
        return view('backend.admin.transaksi.index', compact(''));

    }

    public function simpan(Request $request)
    {

        $rules = [
            'pay_tgl' => 'required',
            'pay_jumlah' => 'required',
            'pay_metode' => 'required',
            'renewal' => 'required',
            'dns_management' => 'required',
            'id_protection' => 'required',
            'email_forwading' => 'required',
            'epp_code' => 'required',
        ];

        $pesan = [
            'tld.required' => 'TLD Wajib Diisi!',
            'register.required' => 'Harga Register Wajib Diisi!',
            'transfer.required' => 'Harga Transfer Wajib Diisi!',
            'renewal.required' => 'Harga Renewal Wajib Diisi!',
            'dns_management.required' => 'DNS Management Wajib Diisi!',
            'id_protection.required' => 'ID Protection Wajib Diisi!',
            'email_forwading.required' => 'Email Forwading Wajib Diisi!',
            'epp_code.required' => 'EPP Code Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $data = new TLDs();
            $data->name = $request->tld;
            $data->register = $request->register;
            $data->transfer = $request->transfer;
            $data->renewal = $request->renewal;
            $data->dnsmanagement = $request->dns_management;
            $data->idprotection = $request->id_protection;
            $data->emailforwarding = $request->email_forwading;
            $data->eppcode = $request->epp_code;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'nama' => 'required',
            'status' => 'required'
        ];

        $pesan = [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
            'status.required' => 'Status Kategori Wajib Diisi!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $data = TLDs::find($request->tld_id);
            $data->name = $request->tld;
            $data->register = $request->register;
            $data->transfer = $request->transfer;
            $data->renewal = $request->renewal;
            $data->dnsmanagement = $request->dns_management;
            $data->idprotection = $request->id_protection;
            $data->emailforwarding = $request->email_forwading;
            $data->eppcode = $request->epp_code;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function edit($id){
        return response()->json(TLDs::find($id));
    }

    public function hapus($id)
    {
        $data = TLDs::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
