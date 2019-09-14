<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Kelurahan;
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->setRowAttr([
                    'onClick' => function($row) {
                        return "detail(".$row->id.")";
                    },
                    'style' => 'cursor:pointer',
                ])
                ->addIndexColumn()
                ->addColumn('layanan', function($row){
                    return 'BElom DIkerjain';
                })
                ->addColumn('tgl', function($row){
                    return date('d-m-Y', strtotime($row->created_at));
                })
                ->addColumn('status', function($row){
                    return '1';
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelola</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="javascript:void(0)" onClick="edit('.$row->id.')">
                                    <i class="si si-note mr-5"></i>Edit Client
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                    <i class="si si-trash mr-5"></i>Hapus Client
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'tgl', 'layanan'])
                ->make(true);
        }
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

	public function detail($id)
    {

        $user = User::find($id);
        $provinsi = Provinsi::orderBy('name', 'ASC')->latest()->get();
        $kota = Kota::where('provinsi_id', $user->provinsi_id)->orderBy('name', 'ASC')->latest()->get();
        $kecamatan = Kecamatan::where('regency_id', $user->kota_id)->orderBy('name', 'ASC')->latest()->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $user->kecamatan_id)->orderBy('name', 'ASC')->latest()->get();

        return view('backend.admin.client.detail', compact('user', 'provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }
}
