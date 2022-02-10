<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('nomor_pasien');
            $table->text('nama_pasien');
            $table->text('alamat');
            $table->text('diagnosa');
            $table->text('tindakan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien_models');
    }
}
