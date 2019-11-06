<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'order_id', 'tipe', 'tgl_registrasi', 'domain', 'pay_first', 'pay_berulang', 'durasi', 'tgl_expire', 'status', 'tgl_tempo', 'tgl_tempo_inv', 'dnsmanagement', 'emailforwarding', 'idprotection'
    ];
}
