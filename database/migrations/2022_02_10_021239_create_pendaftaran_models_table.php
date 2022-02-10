<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('nomor');
            $table->text('nama');
            $table->text('alamat');
            $table->integer('usia');
            $table->text('jeniskelamin');
            $table->text('keluhan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_models');
    }
}
