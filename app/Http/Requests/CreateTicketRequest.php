<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTicketRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'body' => ['required','min:10','max:255'],
            'status' => 'required',
            'end_date' => 'date',
            'progress_date' => 'date'
        ];
    }
}
