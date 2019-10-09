<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModulModel extends Model
{
    protected $table = 'tb_modul';
    protected $primaryKey = 'id_modul';
    protected $fillable = ['id_modul','nama_modul','ket_modul','file_modul','type','id_diklat'];
}