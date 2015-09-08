<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'types';
    protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('created_at','updated_at');
    public function news()
    {
        return $this->hasMany('App\News');//数据连接
    }
}
