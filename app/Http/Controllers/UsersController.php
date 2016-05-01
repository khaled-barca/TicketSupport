<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Ticket;

use Auth;

use App\Enums\Genders;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => 'destroy']);
    }

    public function show(User $user)
    {
        $tickets = $user->tickets()->get();
        $users = User::all();
        $opened = array();
        $closed = array();
        $inProgress = array();
        $user = Auth::user();
       // $notifications = \DB::select('select * from notifications where user_id = :id', ['id' => $user->id]);
        if($user->isAdministrator() || $user->isSupportSupervisor()) {
            foreach ($users as $u) {
                if ($u->role == 'Support Agent') {
                    $tickets_user = \DB::select('select * from tickets where support_id = :id', ['id' => $u->id]);
                    $userName = $u->first_name . $u->last_name;
                    foreach ($tickets_user as $ticket) {
                        if($ticket->status == 'Opened') {
                            if(array_key_exists($userName, $opened)) {
                                $opened[$userName] = $opened[$userName] + 1;
                            }
                            else {
                               // echo("wesel opened");
                                $opened[$userName] = 1;
                                $closed[$userName] = 0;
                                $inProgress[$userName] = 0;
                            }
                        }
                        if($ticket->status == 'Closed') {
                            if(array_key_exists($userName, $closed)) {
                                $closed[$userName] = $closed[$userName] + 1;
                            }
                            else {
                                //echo("wesel hena kaman");
                                $opened[$userName] = 0;
                                $closed[$userName] = 1;
                                $inProgress[$userName] = 0;
                            }
                        }
                        if($ticket->status == 'In Progress') {
                            if(array_key_exists($userName, $inProgress)) {
                                $inProgress[$userName] = $inProgress[$userName] + 1;
                            }
                            else {
                                //echo("wesell");
                                $opened[$userName] = 0;
                                $closed[$userName] = 0;
                                $inProgress[$userName] = 1;
                            }
                        }
                    }
                }
            }
        }
        return view("users.show", compact('user', 'tickets', 'opened', 'closed', 'inProgress'));
    }

    public function edit(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return view("users.edit", compact('user'));
        } else {
            return view("errors.401");
        }
    }

    public function update(Request $request, User $user)
    {
        $validations = [
            'first_name' => ['required', 'min:2', 'max:15'],
            'last_name' => ['required', 'min:2', 'max:15'],
            'date_of_birth' => 'required|date'
        ];
        $this->validate($request, $validations);
        $user->update($request->all());
        $user->save();
        return redirect(route('users.show', $user));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home')->with("message", "User successfully deleted");
    }

}
