<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TLDs extends Model
{
    protected $table = 'tlds';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'register'
    ];
}
