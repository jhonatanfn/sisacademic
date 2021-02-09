<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReunionRequest extends FormRequest
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
            'objetivo.required'=>'El campo Objetivo es obligatorio',
            'fecha.required'=>'El campo Fecha es obligatorio',
            'hora.required'=>'El campo Hora es obligatorio',
            'contenido.required'=>'El campo Contenido es obligatorio',
            'file.image'=>'Archivo no es una imagen'
        ];
    }

    public function rules()
    {
        $rules=[
            'titulo'=>'required',
            'slug'=>'required|unique:comunicados',
            'fecha'=>'required',
            'hora'=>'required',
            'objetivo'=>'required',
            'contenido'=>'required',
            'file'=>'image'
        ];
        return $rules;
    }
}
