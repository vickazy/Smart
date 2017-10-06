<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RiwayatPSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('riwayat_p_siswa', function(Blueprint $table) {
        //     $table->char('id', 36);
        //     $table->char('siswa_id', 36);
        //     $table->string('asal_sekolah', 100);
        //     $table->string('alamat_sekolah');
        //     $table->bigInteger('nisn', 12);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('riwayat_p_siswa');
    }
}
