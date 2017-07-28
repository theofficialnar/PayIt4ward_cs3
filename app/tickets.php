<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    protected $table = 'tickets';

    function messages(){
        return $this->hasMany('App\tickets_messages');
    }
}
