<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
