<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
	protected $table = 'messages';
	protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('updated_at');
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
