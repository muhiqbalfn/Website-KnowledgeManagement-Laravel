<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sertifikat', function (Blueprint $table) {
            $table->increments('id_sertifikat');
            $table->string('nama_sertifikat');
            $table->string('ket_sertifikat');
            $table->string('file_sertifikat');
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
        Schema::drop('tb_sertifikat');
    }
}
