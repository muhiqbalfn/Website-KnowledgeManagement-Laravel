<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SertifikatModel extends Model
{
    protected $table = 'tb_sertifikat';
    protected $primaryKey = 'id_sertifikat';
    protected $fillable = ['id_sertifikat','nama_sertifikat','ket_sertifikat','file_sertifikat','type','id_diklat'];
}