<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'email' => [
                'required',
                'e-mail',
            ],
            'password' => [
                'required',
            ],
            'name' => [
                'required',
            ],
            'surname' => [
                'required',
            ],
            'street' => [
                'required',
            ],
            'number' => [
                'required',
            ],
            'postcode' => [
                'required',
            ],
            'city' => [
                'required',
            ],
            'phone' => [
                'required',
            ]
            
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Hasło',
            'name' => 'Imię',
            'surname' => 'Nazwisko',
            'street' => 'Ulica',
            'number' => 'Numer domu',
            'postcode' => 'Kod pocztowy',
            'city' => 'Miasto',
            'phone' => 'Telefon',
        ];
    }
}
