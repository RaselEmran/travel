<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackegeOption extends Model
{
	protected $with=['packegeitinary'];
    public function packegeitinary()
    {
    	return $this->hasMany('App\PackegeItinary');
    }
}
