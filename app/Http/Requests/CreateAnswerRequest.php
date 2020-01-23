<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'answer' => ['required','max:150'],
        ];
    }

    public function messages(){

        return [
            'answer.required'=> 'Este campo no puede estar vacio',
            'answer.max'=> 'La respuesta no puede ser mayor a 150 caracteres',
        ];
;
    }
}
