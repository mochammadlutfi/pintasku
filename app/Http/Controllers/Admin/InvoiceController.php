<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InvoiceHelp;
use App\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
class InvoiceController extends Controller
{

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
            $data = Invoice::latest()->get();
            return Datatables::of($data)
                ->setRowAttr([
                    'onClick' => function($row) {
                        return "detail(".$row->id.")";
                    },
                    'style' => 'cursor:pointer',
                ])
                ->addColumn('no_invoice', function($row){
                    return $row->kode;
                })
                ->addColumn('client', function($row){
                    return $row->client->name;
                })
                ->addColumn('tgl', function($row){
                    return date('d-m-Y', strtotime($row->created_at));
                })
                ->addColumn('metode_pembayaran', function($row){
                    return $row->metode_pembayaran;
                })
                ->addColumn('total', function($row){
                    return 'Rp '. number_format($row->total,0,",",".") .',-';
                })
                ->addColumn('status', function($row){
                    if($row->status == 0)
                    {
                        $pembayaran = '<span class="badge badge-warning">Belum Bayar</span>';
                    }else if($row->invoice->status == 1){
                        $pembayaran = '<span class="badge badge-success">Sudah Bayar</span>';
                    }else{
                        $pembayaran = '<span class="badge badge-danger">Dibatalkan</span>';
                    }
                    return $pembayaran;
                })

                ->rawColumns(['no_invoice', 'tgl'. 'client', 'metode_pembayaran', 'total', 'status'])
                ->make(true);
        }
        return view('backend.admin.invoice.index', compact(''));

    }

    public function detail($id)
    {
        $invoice = Invoice::find($id);
        $item = InvoiceItem::where('invoice_id', $invoice->id)->latest()->get();

        return view('backend.admin.invoice.detail', compact('invoice', 'item'));
    }
}
