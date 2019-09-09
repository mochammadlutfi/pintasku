<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
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
            $data = Barang::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('satuan', function($row){
                    return $row->satuan->nama;
                })
                ->addColumn('hrg_beli', function($row){
                    return 'Rp.'. number_format($row->hrg_pokok,0,",",".");
                })
                ->addColumn('hrg_1', function($row){
                    return 'Rp.'. number_format($row->hrg_1,0,",",".");
                })
                ->addColumn('hrg_2', function($row){
                    return 'Rp.'. number_format($row->hrg_2,0,",",".");
                })
                ->addColumn('hrg_3', function($row){
                    return 'Rp.'. number_format($row->hrg_3,0,",",".");
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="'. route('barang.edit', $row->id) .'">
                                    <i class="si si-note mr-5"></i>Edit Data Barang
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                    <i class="si si-trash mr-5"></i>Hapus Data Barang
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'satuan', 'hrg_beli', 'hrg_1', 'hrg_2', 'hrg_3'])
                ->make(true);
        }
        return view('backend.admin.product.index', compact(''));

    }


    public function tambah(Request $request)
    {
        if($request->isMethod('get')){
            $kategori = Category::where('status', 1)->latest()->get();
            return view('backend.admin.product.tambah', compact('kategori'));
        }else{
            // dd($request->all());
            $rules = [
                'supplier' => 'required',
                'nama' => 'required',
                'kategori' => 'required',
                'satuan' => 'required',
                'isi_satuan' => 'required',
                'hrg_pokok' => 'required',
                'hrg_1' => 'required',
                'hrg_2' => 'required',
                'hrg_3' => 'required',
                'jml_stok' => 'required',
                'min_stok' => 'required',
            ];

            $pesan = [
                'supplier.required' => 'Supplier Wajib Diisi!',
                'nama.required' => 'Nama Barang Wajib Diisi!',
                'kategori.required' => 'Kategori Barang Wajib Diisi!',
                'satuan.required' => 'Satuan Barang Wajib Diisi!',
                'isi_satuan.required' => 'Isi Satuan Barang Wajib Diisi!',
                'hrg_pokok.required' => 'Harga Pokok Wajib Diisi!',
                'hrg_1.required' => 'Harga 1 Wajib Diisi!',
                'hrg_2.required' => 'Harga 2 Wajib Diisi!',
                'hrg_3.required' => 'Harga 3 Wajib Diisi!',
                'jml_stok.required' => 'Jumlah Stok Barang Wajib Diisi!',
                'min_stok.required' => 'Minimal Stok Barang Wajib Diisi!',
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

                $data = new Barang();
                $data->kode = $request->kd_barang;
                $data->nama = $request->nama;
                $data->supplier_id = $request->supplier;
                $data->kategori_id = $request->kategori;
                $data->satuan_id = $request->satuan;
                $data->isi = $request->isi_satuan;
                $data->hrg_pokok = $request->hrg_pokok;
                $data->hrg_1 = $request->hrg_1;
                $data->hrg_2 = $request->hrg_2;
                $data->hrg_3 = $request->hrg_3;
                $data->jml_stok = $request->jml_stok;
                $data->min_stok = $request->min_stok;
                $data->merk = $request->merk;
                $data->diskon = $request->diskon;
                $data->foto = $foto;
                if($data->save())
                {
                    return response()->json([
                        'fail' => false,
                        'url' => route('barang.data')
                    ]);
                }
            }
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'pekerjaan' => 'required',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
        ];

        $pesan = [
            'nik.required' => 'NIK Wajib Diisi!',
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'jk.required' => 'Jenis Kelamin Wajib Diisi!',
            'pekerjaan.required' => 'Pekerjaan Wajib Diisi!',
            'tmp_lahir.required' => 'Tempat Lahir Wajib Diisi!',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi!',
            'kecamatan.required' => 'Kecamatan Wajib Diisi!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
            'rt.required' => 'RT/RW Wajib Diisi!',
            'rw.required' => 'RT/RW Wajib Diisi!',
            'alamat.required' => 'Alamat Lengkap Wajib Diisi!',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            if(!empty($request->file('foto')))
            {
                $foto_file = $request->file('foto');
                $foto = Storage::disk('public')->put('foto', $foto_file);
            }

            $data = Penyewa::find($request->penyewa_id);
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
            if(!empty($request->file('foto')))
            {
                $data->foto = $foto;
            }
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                    'url' => route('penyewa')
                ]);
            }
        }
    }

    public function edit($id){

        $data = Penyewa::find($id);
        $kecamatan = Kecamatan::latest()->get();
        $kelurahan = Kelurahan::where('id_kecamatan', $data->id_kecamatan)->get();
        return view('penyewa.edit', compact('data', 'kecamatan', 'kelurahan'));
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

    public function get_json(Request $request){

        $user = Penyewa::find($request->value);

        $data = array(
            'nama' => $user->nama,
            'nik' => $user->nik,
            'tmp_lahir' => $user->tmp_lahir,
            'pekerjaan' => $user->pekerjaan,
            'tgl_lahir' => date('d-m-Y', strtotime($user->tgl_lahir)),
            'alamat' => $user->alamat.' RT.'. $user->rt.' RW.'.$user->rw.' Desa/Kel. '.$user->kelurahan->nama.' Kec. '.$user->kecamatan->nama.'Kabupaten Bandung Barat',
        );

        return response()->json($data);
    }

}
