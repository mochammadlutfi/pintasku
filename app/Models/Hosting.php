<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    protected $table = 'hosting';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id', 'tipe', 'product_id', 'bulanan', 'triwulan', 'caturwulan', 'semester', 'tahunan', 'sekali'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
}
