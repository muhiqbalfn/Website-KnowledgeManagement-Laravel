<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evaluasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_evaluasi', function (Blueprint $table) {
            $table->increments('id_evaluasi');
            $table->string('nama_evaluasi');
            $table->string('ss');
            $table->string('s');
            $table->string('ts');
            $table->string('sts');
            $table->integer('id_diklat');
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
        Schema::drop('tb_evaluasi');
    }
}
