<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComunicadoRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required'=>'El campo Titulo es obligatorio',
            'slug.required'=>'El campo Slug es obligatorio',
            'cuerpo.required'=>'El campo Cuerpo es obligatorio',
            'extracto.required'=>'El campo Extracto es obligatorio',
        ];
    }

    public function rules()
    {
        $rules=[
            'titulo'=>'required',
            'slug'=>'required|unique:comunicados'
        ];

        if($this->status==2){
            $rules= array_merge($rules,[
                'categoria_id'=>'required',
                'estado_id'=>'required',
                'extracto'=>'required',
                'cuerpo'=>'required'
            ]);
        }
        return $rules;
    }


}
