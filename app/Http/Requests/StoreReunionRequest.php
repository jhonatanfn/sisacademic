<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReunionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user_id==auth()->user()->id){
            return true;
        }else{
            return false;
        }
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
            'contenido'=>'required'
        ];
        return $rules;
    }
}
