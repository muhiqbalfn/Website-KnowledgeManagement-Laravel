<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $table = 'tb_evaluasi';
    protected $primaryKey = 'id_evaluasi';
    protected $fillable = ['id_evaluasi','nama_evaluasi','ss','s','ts','sts','saran_evaluasi','id_diklat'];
}