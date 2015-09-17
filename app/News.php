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
    public function tradesRecord(){
        return $this->hasMany('App\TradesRecord');
    }
	//返回最新信息数据,10条数据
	static function lastNews(){
		$news = new News;
		return $news->orderBy('created_at','desc')->take(10)->get();
	}
	//返回最新所有信息数据
	static function lastAllNews(){
		$news = new News;
		$news = $news->orderBy('created_at','desc')->paginate(8);
        foreach($news as &$new){
            $new->user_id = User::where('id',$new->user_id)->first()->name;
            $new->addresscode = Excity::where('id',$new->addresscode)->first()->city;
            $new->msg_count = Message::where('new_id',$new->id)->count();
        }
        return $news; 
	}	
	//获取指定type的信息数据
    static function desnew($type){
        $news = News::where('type_id',$type)->paginate(8);
        foreach($news as &$new){
            $new->user_id = User::where('id',$new->user_id)->first()->name;
            $new->addresscode = Excity::where('id',$new->addresscode)->first()->city;
            $new->msg_count = Message::where('new_id',$new->id)->count();
        }
        return $news;  
    }
    //获取指定用户的所有报酬
    static function getReward($user_id){
    	return $news = News::where('user_id',$user_id)->sum('reward');
    }
}
