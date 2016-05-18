<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradesRecord extends Model
{
    //
    protected $table = 'tradesRecord';
   	protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('updated_at');
    public function proposeUser()
    {
        return $this->belongsTo('App\User','propose_id');//数据连接
    }  
    public function receiveUser()
    {
        return $this->belongsTo('App\User','receive_id');//数据连接
    }  
    public function news()
    {
        return $this->belongsTo('App\News');//数据连接
    } 
}
