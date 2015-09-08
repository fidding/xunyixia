<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'photos';
   	protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('created_at','updated_at');
    public function news()
    {
        return $this->belongsTo('App\News');//数据连接
    }
}
