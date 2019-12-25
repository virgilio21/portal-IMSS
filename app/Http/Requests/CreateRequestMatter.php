<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestMatter extends FormRequest
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
            'description' => ['required','max:100'],
            'semester' => ['required','max:1']
        ];
    }


    public function messages(){
        return [
            'description.required' => 'este campo no puede estar vacio',
            'description.max' => 'tiene que ser menor a 100 caracteres',
            'semester.required' => 'este campo no puede estar vacio',
            'semester.max' => 'solo puede ser entre 1 y 9'
        ];
    }

}
