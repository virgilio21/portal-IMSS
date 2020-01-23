<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequest
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
            'nameSection' => ['required','max:60'],
        ];
    }

    public function messages(){

        return [
            'nameSection.required'=> 'Este campo no puede estar vacio',
            'nameSection.max'=> 'El nombre no puede ser mayor a 100 caracteres',
        ];

    }
}
