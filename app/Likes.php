<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    public function comment(){
    	return $this->belongsTo('App\Comments');
    	
	}
	public function user(){
    	return $this->belongsTo('App\User');
    	
	}

}
