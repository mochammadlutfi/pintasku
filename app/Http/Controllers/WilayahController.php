<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class WilayahController extends Controller
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

    function get_kota(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = Kota::where('provinsi_id', $value)->get();
     $output = '<option value="">Pilih Kota</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.ucwords(strtolower($row->name)).'</option>';
     }
     echo $output;
    }

    function get_kecamatan(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = Kecamatan::where('regency_id', $value)->get();
     $output = '<option value="">Pilih Kecamatan</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.ucwords(strtolower($row->name)).'</option>';
     }
     echo $output;
    }

    function get_kelurahan(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = Kelurahan::where('kecamatan_id', $value)->get();
     $output = '<option value="">Pilih Kelurahan</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.ucwords(strtolower($row->name)).'</option>';
     }
     echo $output;
    }

}
