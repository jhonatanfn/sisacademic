<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'titulo.required'=>'El campo Titulo es obligatorio',
            'slug.required'=>'El campo Slug es obligatorio',
            'proposito.required'=>'El campo Proposito es obligatorio',
            'contenido.required'=>'El campo Contenido es obligatorio',
            'file.image'=>'Archivo no es una imagen'
        ];
    }

    public function rules()
    {
        $rules=[
            'titulo'=>'required',
            'slug'=>'required|unique:comunicados',
            'proposito'=>'required',
            'contenido'=>'required',
            'file'=>'image'
        ];
        return $rules;
    }
}
