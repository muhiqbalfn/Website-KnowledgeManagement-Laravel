<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'tb_saran';
    protected $primaryKey = 'id_saran';
    protected $fillable = ['id_saran','saran','id_diklat'];
}