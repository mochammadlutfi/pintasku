<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TLDs;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TLDsController extends Controller
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
            $data = TLDs::latest()->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->addColumn('register', function($row){
                    return 'Rp.'. number_format($row->register,0,",",".");
                })
                ->addColumn('transfer', function($row){
                    return 'Rp.'. number_format($row->transfer,0,",",".");
                })
                ->addColumn('renewal', function($row){
                    return 'Rp.'. number_format($row->renewal,0,",",".");
                })
                ->addColumn('dns', function($row){

                        if($row->dnsmanagement == 1)
                        {
                            $status = '<span class="badge badge-success">Ya</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Tidak</span>';
                        }

                        return $status;
                })
                ->addColumn('email', function($row){

                        if($row->emailforwarding == 1)
                        {
                            $status = '<span class="badge badge-success">Ya</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Tidak</span>';
                        }

                        return $status;
                })
                ->addColumn('id_protection', function($row){

                        if($row->idprotection == 1)
                        {
                            $status = '<span class="badge badge-success">Ya</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Tidak</span>';
                        }

                        return $status;
                })
                ->addColumn('epp_code', function($row){

                        if($row->eppcode == 1)
                        {
                            $status = '<span class="badge badge-success">Ya</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Tidak</span>';
                        }

                        return $status;
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kelola</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="javascript:void(0)" onClick="edit('.$row->id.')">
                                    <i class="si si-note mr-5"></i>Edit TLD
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                    <i class="si si-trash mr-5"></i>Hapus TLD
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'epp_code', 'id_protection', 'email', 'dns', 'renewal', 'transfer', 'register'])
                ->make(true);
        }
        return view('backend.admin.domain.tld', compact(''));

    }

    public function simpan(Request $request)
    {

        $rules = [
            'tld' => 'required',
            'register' => 'required',
            'transfer' => 'required',
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
