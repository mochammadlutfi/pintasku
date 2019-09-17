<?php

namespace App\Http\Controllers\Admin;
use App\Models\Harga;
use App\Models\Product;
use App\Models\TLDs;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Gufy\CpanelWhm\Facades\CpanelWhm;
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
            $data = Product::where('tipe', 'hosting')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function($row){
                    return $row->category->name;
                })
                ->addColumn('pembayaran', function($row){
                    return ucwords($row->harga->tipe);
                    // return 'gagal';
                })
                ->addColumn('status', function($row){

                    if($row->status == 1)
                    {
                        return '<span class="badge badge-success">Publikasi</span>';
                    }else{
                        return '<span class="badge badge-danger">Draft</span>';
                    }
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="'. route('admin.product.edit', $row->id) .'">
                                    <i class="si si-note mr-5"></i>Edit Produk
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                    <i class="si si-trash mr-5"></i>Hapus Produk
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'tipe', 'kategori', 'status'])
                ->make(true);
        }
        return view('backend.admin.product.index', compact(''));

    }

    public function web_app(Request $request)
    {
        $data = Product::where('tipe', 'webapp')->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('kategori', function($row){
                return $row->category->name;
            })
            ->addColumn('pembayaran', function($row){
                return ucwords($row->harga->tipe);
            })
            ->addColumn('status', function($row){

                if($row->status == 1)
                {
                    return '<span class="badge badge-success">Publikasi</span>';
                }else{
                    return '<span class="badge badge-danger">Draft</span>';
                }
            })
            ->addColumn('action', function($row){

                $btn = '<center><div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                            <a class="dropdown-item" href="'. route('admin.product.edit', $row->id) .'">
                                <i class="si si-note mr-5"></i>Edit Produk
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                <i class="si si-trash mr-5"></i>Hapus Produk
                            </a>
                        </div>
                    </div></center>';

                return $btn;
            })
            ->rawColumns(['action', 'tipe', 'kategori', 'status'])
            ->make(true);
    }

    public function web_dev(Request $request)
    {
        $data = Product::where('tipe', 'webdev')->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('kategori', function($row){
                return $row->category->name;
            })
            ->addColumn('pembayaran', function($row){
                return ucwords($row->harga->tipe);
            })
            ->addColumn('status', function($row){

                if($row->status == 1)
                {
                    return '<span class="badge badge-success">Publikasi</span>';
                }else{
                    return '<span class="badge badge-danger">Draft</span>';
                }
            })
            ->addColumn('action', function($row){

                $btn = '<center><div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                            <a class="dropdown-item" href="'. route('admin.product.edit', $row->id) .'">
                                <i class="si si-note mr-5"></i>Edit Produk
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                <i class="si si-trash mr-5"></i>Hapus Produk
                            </a>
                        </div>
                    </div></center>';

                return $btn;
            })
            ->rawColumns(['action', 'tipe', 'kategori', 'status'])
            ->make(true);
    }

    public function tambah(Request $request)
    {
        if($request->isMethod('get')){
            $domain = TLDs::latest()->get();
            $kategori = Category::where('status', 1)->latest()->get();
            return view('backend.admin.product.tambah', compact('kategori', 'domain'));
        }else{
            // dd($request->all());
            $rules = [
                'nama' => 'required',
                'slug' => 'required',
                'kategori' => 'required',
                'tipe' => 'required',
                'free_domain' => 'required',
                'hrg' => 'required',
            ];

            $pesan = [
                'nama.required' => 'Nama Produk/Layanan Wajib Diisi!',
                'slug.required' => 'Slug Produk/Layanan Wajib Diisi!',
                'kategori.required' => 'Kategori Produk/Layanan Wajib Diisi!',
                'tipe.required' => 'Tipe Produk/Layanan Wajib Diisi!',
                'hrg.required' => 'Tipe Pembayaran Wajib Diisi!',
                'free_domain.required' => 'Domain Gratis Wajib Diisi!',
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()){
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            }else{

                $data = new Product();
                $data->name = $request->nama;
                $data->slug = $request->slug;
                $data->tipe = $request->tipe;
                $data->category_id = $request->kategori;
                $data->description = $request->deskripsi;
                $data->package = $request->package;
                $data->status = $request->status;
                if($data->save())
                {
                    if($request->hrg == 'sekali')
                    {
                        $harga = new Harga();
                        $harga->product_id = $data->id;
                        $harga->tipe = $request->hrg;
                        $harga->sekali = $request->hrg_sekali;
                        if($harga->save())
                        {
                            return response()->json([
                                'fail' => false,
                                'url' => route('admin.product')
                            ]);
                        }
                    }else if($request->hrg == 'berulang')
                    {
                        $harga = new Harga();
                        $harga->product_id = $data->id;
                        $harga->tipe = $request->hrg;
                        $harga->bulanan = $request->perbulan;
                        $harga->triwulan = $request->triwulan;
                        $harga->caturwulan = $request->caturwulan;
                        $harga->semester = $request->semester;
                        $harga->tahunan = $request->tahunan;
                        if($harga->save())
                        {
                            return response()->json([
                                'fail' => false,
                                'url' => route('admin.product')
                            ]);
                        }
                    }else{
                        $harga = new Harga();
                        $harga->product_id = $data->id;
                        $harga->tipe = $request->hrg;
                        if($harga->save())
                        {
                            return response()->json([
                                'fail' => false,
                                'url' => route('admin.product')
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'nama' => 'required',
            'slug' => 'required',
            'kategori' => 'required',
            'tipe' => 'required',
            'free_domain' => 'required',
            'hrg' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Produk/Layanan Wajib Diisi!',
            'slug.required' => 'Slug Produk/Layanan Wajib Diisi!',
            'kategori.required' => 'Kategori Produk/Layanan Wajib Diisi!',
            'tipe.required' => 'Tipe Produk/Layanan Wajib Diisi!',
            'hrg.required' => 'Tipe Pembayaran Wajib Diisi!',
            'free_domain.required' => 'Domain Gratis Wajib Diisi!',
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

            $data = Product::find($request->product_id);
            $data->name = $request->nama;
            $data->slug = $request->slug;
            $data->tipe = $request->tipe;
            $data->category_id = $request->kategori;
            $data->description = $request->deskripsi;
            $data->package = $request->package;
            $data->status = $request->status;
            if($data->save())
            {
                if($request->hrg == 'sekali')
                {
                    $harga = new Harga();
                    $harga->product_id = $data->id;
                    $harga->tipe = $request->hrg;
                    $harga->sekali = $request->hrg_sekali;
                    if($harga->save())
                    {
                        return response()->json([
                            'fail' => false,
                            'url' => route('admin.product')
                        ]);
                    }
                }else if($request->hrg == 'berulang')
                {
                    $harga = new Harga();
                    $harga->product_id = $data->id;
                    $harga->tipe = $request->hrg;
                    $harga->bulanan = $request->perbulan;
                    $harga->triwulan = $request->triwulan;
                    $harga->caturwulan = $request->caturwulan;
                    $harga->semester = $request->semester;
                    $harga->tahunan = $request->tahunan;
                    if($harga->save())
                    {
                        return response()->json([
                            'fail' => false,
                            'url' => route('admin.product')
                        ]);
                    }
                }else{
                    $harga = new Harga();
                    $harga->product_id = $data->id;
                    $harga->tipe = $request->hrg;
                    if($harga->save())
                    {
                        return response()->json([
                            'fail' => false,
                            'url' => route('admin.product')
                        ]);
                    }
                }
            }
        }
    }

    public function edit($id){
        $data = Product::find($id);
        $domain = TLDs::latest()->get();
        $kategori = Category::where('status', 1)->latest()->get();
        $cpanel = json_decode(CpanelWhm::listpkgs());
        // dd($cpanel);
        return view('backend.admin.product.edit', compact('data', 'kategori', 'domain', 'cpanel'));
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

    function get_kota(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Product::where('category_id', $value)->get();
        $output = '<option value="">Pilih Produk</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.ucwords(strtolower($row->name)).'</option>';
        }
        echo $output;
    }

}
