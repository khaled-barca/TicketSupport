<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSettingsRequest extends Request
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
            'consumer_key' => ['required','min:2','max:35'],
            'consumer_secret' => ['required','min:2','max:35'],
            'access_token' => ['required','min:2','max:35'],
            'access_token_secret' => ['required','min:2','max:35']
        ];
    }
}
