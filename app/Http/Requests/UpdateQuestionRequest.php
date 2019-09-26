<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'question' => ['required','max:150'],
            
        ];
    }

    public function messages(){

        return [
            'question.required'=> 'Este campo no puede estar vacio',
            'question.max'=> 'La pregunta no puede ser mayor a 150 caracteres',
        ];

    }
}