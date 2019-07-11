<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $with=['packege','user'];
    public function packege()
    {
    	return $this->belongsTo('App\Packege');
    }

     public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
