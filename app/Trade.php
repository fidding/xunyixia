<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    //
    protected $table = 'trades';
    protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('created_at','updated_at');
    public function tradesRecord()
    {
        return $this->hasMany('App\TradesRecord');//数据连接
    }    
}
