<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
