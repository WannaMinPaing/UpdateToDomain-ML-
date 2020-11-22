<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
   protected $fillable = ['name', 'photo', 'gender', 'type'];


   public function songs()
  {
      return $this->hasMany('App\Song');
  }
}
