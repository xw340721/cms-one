<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function seo(){
	    return $this->belongsTo('App\Seo');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function findUser(){
		return $this->belongsTo('App\admin');
	}
}
