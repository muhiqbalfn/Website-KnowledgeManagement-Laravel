<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Diklat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_diklat', function (Blueprint $table) {
            $table->increments('id_diklat');
            $table->string('nama_diklat');
            $table->string('nama_provider');
            $table->string('templat_diklat');
            $table->integer('id_sub_ktg');
            $table->string('waktu');
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
        Schema::drop('tb_diklat');
    }
}