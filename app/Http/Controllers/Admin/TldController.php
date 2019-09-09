<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tld;
use Datatables;
use DB;
use App\Quotation;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
class TldController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.tld');
    }

    public function json(){
        $tlds = Tld::all();

        // $row = [];
        $no = 1;
        foreach($tlds as $data){
            // $row =  new Collection([
            //     [
            //         'no' => $no++,
            //         'tld' => $domain,
            //         'price_reg' => $data->price_reg,
            //         'price_up' => $data->price_up,
            //         'price_tf' => $data->price_tf,
            //         'tld' => $data->description,
            //     ],
            // ]);
            // $items = [
            //     'first'  => 'I am first',
            //     'second' => 'I am second',
            //     'third'  => new Collection([
            //             'first' => 'I am nested'
            //     ])
            // ];
            // $row = array(
            //     'id' => $no++,
            //     'tld' => $data->tld
            // );
            // $domain = $data->tld;
            // $row[] = [
            //     [
            //         'no' => $no++,
            //         'tld' => $domain,
            //         'price_reg' => $data->price_reg,
            //         'price_up' => $data->price_up,
            //         'price_tf' => $data->price_tf,
            //         'tld' => $data->description,
            //     ],
            // ];
            // echo $no++;
            // $row[] = $no++;
            // $row[] = $data->tld;
            // $row[] = $data->price_reg;
            // $row[] = $data->price_up;
            // $row[] = $data->price_tf;
            // $row[] = $data->description;
        }
            // dd($row);
        
        // $hasil = collect($tlds)->recursive();
        $hasil = Collection::make($row);
        return Datatables::of($hasil)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
