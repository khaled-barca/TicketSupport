<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

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
        return view("users.show", compact('user', 'tickets'));
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
