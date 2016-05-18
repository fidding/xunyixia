<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
	protected $table = 'feedbacks';
	protected $fillable = array();
	protected $guarded = array();
	protected $hidden = array('updated_at'); 
}
