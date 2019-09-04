<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSurveyRequest extends FormRequest
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
            'nameSurvey' => ['required','max:100'],
        ];
    }

    public function messages(){

        return [
            'nameSurvey.required'=> 'Este campo no puede estar vacio',
            'nameSurvey.max'=> 'El nombre no puede ser mayor a 100 caracteres',
        ];

    }
}
