<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LisensiTipe extends Model
{
    protected $table = 'lisensitipe';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'max_uses'
    ];
}
