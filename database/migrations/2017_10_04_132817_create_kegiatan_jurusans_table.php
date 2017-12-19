<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_jurusans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->date('tgl_kegiatan');
            $table->text('isi');
            $table->string('photo')->nullable();
            $table->string('tempat');
            $table->integer('jurusan_id')->unsigned();
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
        Schema::dropIfExists('kegiatan_jurusans');
    }
}
