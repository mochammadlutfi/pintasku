<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
<<<<<<< Updated upstream
    //
=======
    protected $table = 'invoice_item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id', 'user_id', 'tipe', 'deskripsi', 'durasi', 'jumlah',
    ];
>>>>>>> Stashed changes
}
