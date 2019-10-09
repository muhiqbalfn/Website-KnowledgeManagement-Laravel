<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    protected $table = 'tb_laporan';
    protected $primaryKey = 'id_laporan';
    protected $fillable = ['id_laporan','nama_laporan','ket_laporan','file_laporan','type','id_diklat'];
}