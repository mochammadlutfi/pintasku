<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
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
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){

                        if($row->status == 1)
                        {
                            $status = '<span class="badge badge-success">Aktif</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Tidak Aktif</span>';
                        }

                        return $status;
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="javascript:void(0)" onClick="edit('.$row->kategori_id.')">
                                    <i class="si si-note mr-5"></i>Edit Data Kategori
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->kategori_id.')">
                                    <i class="si si-trash mr-5"></i>Hapus Data Kategori
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'status', 'jumlah'])
                ->make(true);
        }
        return view('backend.admin.product.category', compact(''));

    }

    public function simpan(Request $request)
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
            $data = new Category();
            $data->name = $request->nama;
            $data->slug = str_slug($request->nama, '-');
            $data->description = $request->description;
            $data->status = $request->status;
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
            $data = Kategori::find($request->kategori_id);
            $data->nama = $request->nama;
            $data->status = $request->status;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }

        }
    }

    public function edit($id){
        return response()->json(Kategori::find($id));
    }

    public function hapus($id)
    {
        $data = Kategori::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
