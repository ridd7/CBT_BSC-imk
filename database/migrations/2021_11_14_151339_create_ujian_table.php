<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id('id_ujian');
            $table->unsignedBigInteger('id_tentor');
            $table->foreign('id_tentor')->references('id_tentor')->on('tentor');
            $table->string('nama_ujian');
            $table->string('slug');
            $table->string('token');
            $table->integer('jumlah_soal')->default(0);
            $table->integer('waktu');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujian');
    }
}
