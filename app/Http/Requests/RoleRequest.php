<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required'=>'El campo Nombre es obligatorio',
        ];
    }

    public function rules()
    {
        $rules=[
            'name'=>'required',
        ];

        return $rules;
    }
}
