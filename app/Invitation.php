<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    //

    protected $fillable = ['email', 'token', 'role'];

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
