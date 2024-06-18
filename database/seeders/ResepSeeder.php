<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reseps')->insert([
            [
                'foto_makanan' => 'example.jpg',
                'nama_masakan' => 'Nasi Goreng',
                'penjelasan_singkat' => 'Nasi goreng dengan bumbu spesial',
                'berapa_sajian' => '2-3 porsi',
                'waktu_memasak' => '15 menit',
                'kategori' => 'Makanan Utama',
                'rincian_bahan' => 'Nasi, Kecap, Bawang',
                'cara_memasak' => 'Tumis bawang, masukkan nasi, aduk rata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya jika perlu
        ]);
    }
}
