<?php

namespace App\Http\Controllers\Client;

use App\Models\TLDs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function index(){
        return view('backend.client.domain.index');
    }


    public function detail($id){
        return view('backend.client.domain.detail');
    }

    public function cari(){

        $tld = TLDs::latest()->get();

        return view('backend.client.domain.cari', compact('tld'));
    }

    public function cek_register(Request $request){
        $rules = [
            'register_name' => 'required',
        ];

        $pesan = [
            'register_name.required' => 'Nama Domain Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

        }
    }
}
