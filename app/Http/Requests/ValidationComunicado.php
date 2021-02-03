<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationComunicado extends FormRequest
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
            'titulo'=> 'required',
            'extracto'=>'required',
            'cuerpo'=>'required',
            'slug'=>'required',
            'file'=>'Image|max:2048'
        ];
    }

    public function attributes()
    {
        return [
            
        ];
    }

    public function messages()
    {
        return [
            'cuerpo.required'=>'El campo Cuerpo es obligatorio',
            'titulo.required'=>'El campo Titulo es obligatorio',
            'extracto.required'=>'El campo Extracto es obligatorio',
            'slug.required'=>'El campo Slug es obligatorio'
        ];
    }
}
