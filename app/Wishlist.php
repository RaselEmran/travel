<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $with=['packege'];
    public function packege()
    {
    	return $this->belongsTo('App\Packege');
    }
}
