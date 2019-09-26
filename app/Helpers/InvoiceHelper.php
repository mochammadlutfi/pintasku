<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class InvoiceHelp {
    public static function get_invoice_code() {
        $q = DB::table('invoices')->select(DB::raw('MAX(RIGHT(kode,4)) AS kd_max'));
        $no = 1;
        date_default_timezone_set('Asia/Jakarta');
        if($q->count() > 0){
            foreach($q->get() as $k){
                return date('ymd').sprintf("%04s", abs(((int)$k->kd_max) + 1));
            }
        }else{
            return date('ymd').sprintf("%04s", $no);
        }
    }
}
