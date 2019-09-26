<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
<<<<<<< Updated upstream
    //
=======
    protected $table = 'harga';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe', 'product_id', 'bulanan', 'triwulan', 'caturwulan', 'semester', 'tahunan', 'sekali'
    ];
>>>>>>> Stashed changes
}
