<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramacionRequest extends FormRequest
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

    public function messages()
    {
        return [
            'curso_id.required'=>'El campo Curso es obligatorio',
            'docente_id.required'=>'El campo Docente es obligatorio',
            'periodo_id.required'=>'El campo Periodo es obligatorio'
        ];
    }

    public function rules()
    {
        $rules=[
            'curso_id'=>'required',
            'docente_id'=>'required',
            'periodo_id'=>'required'
        ];
        return $rules;
    }
}
