<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';

    protected $fillable = [
        'nama' , 'id_kecamatan'
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'id_kecamatan', 'id_kecamatan');
    }
}
