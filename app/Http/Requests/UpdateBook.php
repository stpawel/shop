<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBook extends FormRequest
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
            'title' => [
                'required',
                'max:64',
            ],
            'description' => [
                'required',
            ],
            'price' => [
                'required',
                'min:0',
                'numeric',
            ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tytuł',
            'description' => 'Opis',
            'price' => 'Cena',
        ];
    }
}
