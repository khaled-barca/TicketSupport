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

    public function show(User $user)
    {
        $tickets = $user->tickets()->get();
        return view("users.show", compact('user','tickets'));
    }

    public function edit(User $user){
        if(Auth::user()->id == $user->id){
            return view("users.edit",compact('user'));
        }
        else{
            return view("errors.401");
        }
    }

    public function update(Request $request, User $user){
        $validations = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required|date'
        ];
        $this->validate($request,$validations);
        $user->update($request->all());
        if($request['gender'] == "Male"){
            $user->gender = Genders::Male;
        }
        else{
            $user->gender = Genders::Female;
        }
        $user->save();
        return redirect(route('users.show',$user));
    }

}
