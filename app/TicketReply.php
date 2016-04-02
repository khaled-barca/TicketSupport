<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    //
    protected $table = 'ticket_replies';

    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }

    public function support(){
        return $this->belongsTo('App\User');
    }
}
