<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiklatModel extends Model
{
    protected $table = 'tb_diklat';
    protected $primaryKey = 'id_diklat';
    protected $fillable = ['id_diklat','nama_diklat','tempat_diklat','id_sub_ktg'];
}