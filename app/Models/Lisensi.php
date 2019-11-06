<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lisensi extends Model
{
    protected $table = 'lisensi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id', 'user_id', 'product_id', 'code', 'tipelisensi_id', 'ips', 'domain', 'tgl_tempo', 'uses_left', 'status',
    ];



}
