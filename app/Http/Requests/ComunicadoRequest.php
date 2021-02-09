<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunicadoRequest extends FormRequest
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
            'cuerpo.required'=>'El campo Cuerpo es obligatorio',
            'extracto.required'=>'El campo Extracto es obligatorio',
            'file.image'=>'Archivo no es una imagen'
        ];
    }

    public function rules()
    {
        $comunicado= $this->route()->parameter('comunicado');
        $rules=[
            'titulo'=>'required',
            'slug'=>'required|unique:comunicados',
            'status'=>'required|in:1,2',
            'file'=>'image'
        ];

        if($comunicado){
            $rules['slug']='required|unique:comunicados,slug,'.$comunicado->id;
        }
        if($this->status==2){
            $rules= array_merge($rules,[
                'categoria_id'=>'required',
                'extracto'=>'required',
                'cuerpo'=>'required'
            ]);
        }
        return $rules;
    }


}
