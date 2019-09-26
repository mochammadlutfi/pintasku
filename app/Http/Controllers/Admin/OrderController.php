<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Harga;
use App\Models\Product;
use App\Models\TLDs;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
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
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="'. route('admin.product.edit', $row->id) .'">
                                    <i class="si si-note mr-5"></i>Edit Data Barang
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                    <i class="si si-trash mr-5"></i>Hapus Data Barang
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'tipe', 'kategori'])
                ->make(true);
        }
        return view('backend.admin.product.index', compact(''));

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




}
