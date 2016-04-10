<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TicketStatus;

class Ticket extends Model
{
    //

    protected $dates = ['progress_date','end_date'];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    
   

    public function support(){
        return $this->belongsTo('App\User','support_id');
    }

    public function scopeOpened($query){
        return $query->where('status',TicketStatus::Opened);
    }

    public function scopeClosed($query){
        return $query->where('status',TicketStatus::Closed);
    }

    public function scopeInProgress($query){
        return $query->where('status',TicketStatus::InProgress);
    }
}
