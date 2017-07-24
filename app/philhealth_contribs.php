<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class philhealth_contribs extends Model
{
    protected $table = 'philhealth_contribs';

    function philHealth($value){
    	return $this->where('min_limit', '<=', $value)->where('max_limit', '>=', $value)->first();
    }
}
