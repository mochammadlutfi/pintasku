<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode', 'user_id', 'tgl_bayar', 'subtotal', 'total', 'status', 'metode_pembayaran'
    ];

    public function client()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function itemnya()
    {
        // return $this->hasMany('App\Models\InvoiceItem', 'invoice_id', 'id');
    }
}
