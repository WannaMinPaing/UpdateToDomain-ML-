<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
     protected $fillable = ['name', 'song_url', 'singer_id', 'count','writer_name'];

      public function singer()
	  {
	      return $this->belongsTo('App\Singer');
	  }

///for bookmark
	  public function users()
  	 {
      	return $this->belongsToMany('App\User');
  	 }
 ////
}

