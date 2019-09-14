<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'slug', 'tipe', 'category_id', 'description', 'package'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function harga()
    {
        return $this->hasOne('App\Models\Harga');
    }
}
