<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Comments;

 use SoftDeletes;



class Movies extends Model
{
	 protected $dates = ['deleted_at'];

	public function genre(){
    	return $this->belongsTo('App\Genre');
    	
	}
	public function comments(){
    	return $this->hasMany('App\Comments');
    	
    }
}
