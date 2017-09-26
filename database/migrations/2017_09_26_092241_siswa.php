<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Siswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function(Blueprint $table){
            $table->char('id', 36);
            $table->string('nama', 100);
            $table->string('nama_panggilan', 20);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('tempat_lahir', 40);
            $table->date('tgl_lahir');
            $table->string('agama', 30);
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->string('tinggal_bersama', 15);
            $table->string('alamat', 150);
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kelurahan',100);
            $table->string('kecamatan',100);
            $table->string('kota',100);
            $table->integer('kode_pos');
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
        Schema::dropIfExists('siswa');
    }
}
