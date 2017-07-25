<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sss_contribs extends Model
{
	protected $table = 'sss_contribs';

	//defines the employee's sss contrib
    function sss($value){
    	return $this->where('min_limit', '<=', $value)->where('max_limit', '>=', $value)->first();
    }
}
