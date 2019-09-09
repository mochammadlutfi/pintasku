<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'regency_id'
    ];

    public function kelurahan()
    {
        return $this->hasMany('App\Kelurahan');
    }

    public function kota()
    {
        return $this->belongsTo('App\Kota');
    }
}
