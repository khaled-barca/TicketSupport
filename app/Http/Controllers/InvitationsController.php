<?php

namespace App\Http\Controllers;

use App\Invitation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateInvitationRequest;
use Auth;
use App\MailSender;


class InvitationsController extends Controller
{
    //

    public function create()
    {
        return view("invitations.create");
    }

    public function store(CreateInvitationRequest $request)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $request['token'] = $token;
        $data = array(
            'sender' => Auth::user()->fullName(),
            'receiver' => $request['first_name'],
            'role' => $request['role'],
            'link' => redirect(action('InvitationsController@accept', [$token]))->getTargetUrl()
        );
        Invitation::create($request->all());
        MailSender::sendMail($data, $request['email']);

        return redirect()->route('home')->with("message", "Invitation mail successfully sent");
    }

    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->get()->first();
        if ($invitation) {
            return view("users.create", compact('invitation'));
        } else {
            return view("errors.404");
        }

    }


}
