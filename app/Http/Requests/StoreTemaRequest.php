<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemaRequest extends FormRequest
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
            'proposito.required'=>'El campo Proposito es obligatorio',
            'contenido.required'=>'El campo Contenido es obligatorio',
        ];
    }

    public function rules()
    {
        $rules=[
            'titulo'=>'required',
            'slug'=>'required|unique:comunicados',
            'proposito'=>'required',
            'contenido'=>'required'
        ];
        return $rules;
    }
}
