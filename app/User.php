<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\UserRoles;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected  $dates = ['date_of_birth'];

    public function isAdministrator(){
        return $this->role == UserRoles::Administrator;
    }

    public function isSupportAgent(){
        return $this->role == UserRoles::SupportAgent;
    }

    public function isSupportSupervisor(){
        return $this->role == UserRoles::SupportSupervisor;
    }

    public function tickets(){
        return $this->hasMany('App\Ticket','support_id');
    }

    public function ticketReplies(){
        return $this->hasMany('App\TicketReply');
    }

    public function fullName(){
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }
}
