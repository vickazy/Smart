<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrangTua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua', function(Blueprint $table) {
            $table->char('id', 36);
            $table->char('siswa_id', 36);
            $table->string('nama', 40);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('alamat', 100);
            $table->string('pekerjaan', 50);
            $table->string('instansi', 50);
            $table->float('penghasilan');
            $table->string('pendidikan_terakhir', 30);
            $table->string('no_hp');
            $table->string('email', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orang_tua');
    }
}
