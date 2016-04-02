<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function support(){
        return $this->belongsTo('App\User');
    }

    public function scopeOpened($query){
        return $query->where('status',\TicketStatus::Opened);
    }

    public function scopeClosed($query){
        return $query->where('status',\TicketStatus::Closed);
    }

    public function scopeInProgress($query){
        return $query->where('status',\TicketStatus::InProgress);
    }
}
