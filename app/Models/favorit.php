<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $fillable = ['pengguna_id', 'resep_id'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function reseps()
    {
        return $this->belongsTo(Resep::class);
    }
}
