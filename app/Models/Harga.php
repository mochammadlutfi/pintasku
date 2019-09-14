<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe', 'product_id', 'bulanan', 'triwulan', 'caturwulan', 'semester', 'tahunan', 'sekali'
    ];
}
