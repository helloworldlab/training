<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CiptaTablePengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_kp', 12)->unique();
            $table->foreignId('id_jantina')->constrained('jantina');
            $table->foreignId('id_agensi')->constrained('agensi');
            $table->string('emel');
            $table->string('kata_laluan');
            $table->string('no_telefon', 20)->nullable();
            $table->timestamp('tarikh_cipta');
            $table->timestamp('tarikh_kemaskini');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
