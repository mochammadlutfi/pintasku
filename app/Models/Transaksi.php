<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id', 'jumlah', 'bukti', 'ipaddress', 'tgl',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id', 'id');
    }
}
