<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id('id_soal');
            $table->unsignedBigInteger('id_ujian');
            $table->foreign('id_ujian')->references('id_ujian')->on('ujian');
            $table->string('gambar_soal')->nullable();
            $table->text('isi_soal')->nullable();
            $table->string('gambar_pil_a')->nullable();
            $table->text('pil_a')->nullable();
            $table->string('gambar_pil_b')->nullable();
            $table->text('pil_b')->nullable();
            $table->string('gambar_pil_c')->nullable();
            $table->text('pil_c')->nullable();
            $table->string('gambar_pil_d')->nullable();
            $table->text('pil_d')->nullable();
            $table->string('gambar_pil_e')->nullable();
            $table->text('pil_e')->nullable();
            $table->char('kunci_jawaban');
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
        Schema::dropIfExists('soal');
    }
}
