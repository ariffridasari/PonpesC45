<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jawaban', function (Blueprint $table) {
            $table->id('id_jwb');
            $table->unsignedInteger('id_soal');
            $table->string('jawaban',200);
            $table->integer('kode');
            $table->integer('kunci');
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
        Schema::dropIfExists('data_jawaban');
    }
}
