<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'ivnoice_id', 'total', 'status', 'ipaddress', 'note',
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
