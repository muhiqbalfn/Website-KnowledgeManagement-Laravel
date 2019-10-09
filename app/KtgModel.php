<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KtgModel extends Model
{
    protected $table = 'tb_ktg';
    protected $primaryKey = 'id_ktg';
    protected $fillable = ['id_ktg','nama_ktg'];
}