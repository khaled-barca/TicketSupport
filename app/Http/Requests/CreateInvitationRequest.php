<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateInvitationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'first_name' => ['required','min:2','max:15'],
            'last_name' => ['required','min:2','max:15'],
            'email' => 'required|email|max:255|unique:invitations',
            'role' => 'required'
        ];
    }
}
