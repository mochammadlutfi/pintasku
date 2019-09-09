<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'province_id'
    ];

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi', 'province_id', 'id');
    }
}
