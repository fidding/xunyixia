<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excity extends Model
{
	protected $table = 'ex_cities';
	protected $fillable = array('id','city');//可填充
}
