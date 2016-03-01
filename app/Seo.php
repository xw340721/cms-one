<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
	public function seo(){
		return $this->hasOne('App\Company');
	}
}
