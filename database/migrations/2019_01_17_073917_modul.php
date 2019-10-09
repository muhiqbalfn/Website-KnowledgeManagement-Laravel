<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_modul', function (Blueprint $table) {
            $table->increments('id_modul');
            $table->string('nama_modul');
            $table->string('ket_modul');
            $table->string('file_modul');
            $table->string('type');
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
        Schema::drop('tb_modul');
    }
}
