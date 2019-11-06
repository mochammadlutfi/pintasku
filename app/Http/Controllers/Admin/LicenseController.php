<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TLDs;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class LicenseController extends Controller
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
        return view('backend.admin.lisensi.index', compact(''));

    }

    public function tambah(Request $request)
    {
        if($request->isMethod('get')){
            // $provinsi = Provinsi::orderBy('name', 'ASC')->latest()->get();
            return view('backend.admin.lisensi.tambah', compact(''));
        }else{
            $rules = [
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'knf_password' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'alamat' => 'required',
            ];

            $pesan = [
                'nama.required' => 'Nama Lengkap Wajib Diisi!',
                'username.required' => 'Username Wajib Diisi!',
                'email.required' => 'Alamat Email Wajib Diisi!',
                'password.required' => 'Password Wajib Diisi!',
                'knf_password.required' => 'Konfirmasi Password Wajib Diisi!',
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
            }else{

                $data = new User();
                $data->name = $request->nama;
                $data->username = $request->username;
                $data->email = $request->email;
                $data->no_hp = $request->no_hp;
                $data->password = bcrypt($request->password);
                $data->provinsi_id = $request->provinsi;
                $data->kota_id = $request->kota;
                $data->kecamatan_id = $request->kecamatan;
                $data->kelurahan_id = $request->kelurahan;
                $data->alamat = $request->alamat;
                if($data->save())
                {
                    return response()->json([
                        'fail' => false,
                        'url' => route('admin.client.list')
                    ]);
                }
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
