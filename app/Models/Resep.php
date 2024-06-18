<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_makanan',
        'nama_masakan',
        'penjelasan_singkat',
        'berapa_sajian',
        'waktu_memasak',
        'kategori',
        'rincian_bahan',
        'cara_memasak',
    ];

    public function favoritedBy()
    {
        return $this->belongsToMany(Pengguna::class, 'favorits', 'reseps_id', 'pengguna_id')->withTimestamps();
    }
}

