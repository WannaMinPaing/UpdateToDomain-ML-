<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Request_song extends Model
{
    protected $fillable = ["request_date", "request_msg", "user_id"];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
