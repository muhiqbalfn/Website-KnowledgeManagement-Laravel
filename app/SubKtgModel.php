<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKtgModel extends Model
{
    protected $table = 'tb_sub_ktg';
    protected $primaryKey = 'id_sub_ktg';
    protected $fillable = ['id_sub_ktg','nama_sub_ktg','id_ktg'];
}
