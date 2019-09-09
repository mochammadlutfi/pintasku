<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = User::get();

        return view('backend.admin.client.index');
    }

    public function tambah(Request $request)
    {
        if($request->isMethod('get')){
            $provinsi = Provinsi::orderBy('name', 'ASC')->latest()->get();

            return view('backend.admin.client.tambah', compact('provinsi'));
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

                $foto_file = $request->file('foto');
                $foto = Storage::disk('public')->put('foto', $foto_file);

                $data = new Penyewa();
                $data->nik = $request->nik;
                $data->nama = $request->nama;
                $data->pekerjaan = $request->pekerjaan;
                $data->jk = $request->jk;
                $data->tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
                $data->tmp_lahir = $request->tmp_lahir;
                $data->id_kecamatan = $request->kecamatan;
                $data->id_kelurahan = $request->kelurahan;
                $data->rt = $request->rt;
                $data->rw = $request->rw;
                $data->alamat = $request->alamat;
                $data->foto = $foto;
                if($data->save())
                {
                    if(!empty($request->jenis))
                    {
                        Session::flash('pemohon_baru', $data->penyewa_id);
                    }
                    // dd(Session::get('pemohon_baru'));
                    return response()->json([
                        'fail' => false,
                        'url' => route('penyewa')
                    ]);
                }
            }
        }
	}

	public function detail()
    {


        return view('backend.admin.client.tambah');
    }
}
