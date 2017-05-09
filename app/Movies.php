<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Comments;



class Movies extends Model
{

	public function genre(){
    	return $this->belongsTo('App\Genre');
    	
	}
	public function comments(){
    	return $this->hasMany('App\Comments');
    	
    }
}
