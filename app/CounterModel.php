<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounterModel extends Model
{
    protected $table = 'tb_counter';
    protected $primaryKey = 'id';
    protected $fillable = ['id','ip_addres','visit_date'];
}