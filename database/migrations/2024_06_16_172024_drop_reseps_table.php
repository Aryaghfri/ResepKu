<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropResepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reseps');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->string('foto_makanan')->nullable();
            $table->string('nama_makanan');
            $table->text('penjelasan_singkat');
            $table->string('berapa_sajian');
            $table->string('waktu_memasak');
            $table->string('kategori');
            $table->text('rincian_bahan');
            $table->text('cara_memasak');
            $table->timestamps();
        });
    }
}
