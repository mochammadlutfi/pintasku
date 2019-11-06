<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_id', 'id');
    }

    public function kota()
    {
        return $this->belongsTo('App\Models\Kota','kota_id', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'kecamatan_id', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan', 'kelurahan_id', 'id');
    }
}
