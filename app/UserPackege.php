<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackege extends Model
{
	protected $with=['packege','user','useritinary'];
    public function packege()
    {
    	return $this->belongsTo('App\Packege');
    }

     public function useritinary()
    {
    	return $this->hasMany('App\UserItinary');
    }

     public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
