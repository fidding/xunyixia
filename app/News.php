<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
   	protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('updated_at');
    public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function type(){
		return $this->belongsTo('App\Type');
	}
	//返回最新信息数据
	static function lastNews(){
		$news = new News;
		return $news->orderBy('created_at','desc')->get();
	}
}
