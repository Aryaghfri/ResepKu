<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'penggunas'; // Ubah tabel menjadi penggunas

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    use Notifiable;

    public function favorits()
    {
        return $this->belongsToMany(Resep::class, 'favorits', 'pengguna_id', 'reseps_id')->withTimestamps();
    }
}
