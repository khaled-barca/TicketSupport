<?php

namespace App;

use Illuminate\Support\Facades\Mail;

class MailSender
{

    public static function sendMail($data, $receiver)
    {
        Mail::send('emails.invitation', $data, function ($message) use ($receiver) {
            $message->from(env('MAIL_USERNAME'), "");
            $message->to($receiver)->subject('Invitation to join Ticket Support');
        });
    }
}
