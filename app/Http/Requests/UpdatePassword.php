<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
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
            'password' => [
                'required',
            ],
            'repeatpassword' => [
                'same:password'
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'password' => 'Hasło',
            'repeatpassword' => 'Powtórz hasło',
        ];
    }
}
