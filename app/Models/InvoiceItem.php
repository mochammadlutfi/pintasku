<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id', 'user_id', 'tipe', 'deskripsi', 'durasi', 'jumlah',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
