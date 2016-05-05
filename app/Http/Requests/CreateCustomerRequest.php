<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCustomerRequest extends Request
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
            'screen_name' => ['required','min:2','max:255'],
            #'first_name' => ['required','min:2','max:255'],
            #'last_name' => ['required','min:2','max:255'],
            #'phone' => ['required','max:255','min:5','unique']
        ];
    }
}
