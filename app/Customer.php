<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'screen_name', 'phone'
    ];

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function fullName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }
}
