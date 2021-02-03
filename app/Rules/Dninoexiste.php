<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Persona;
use tidy;

class Dninoexiste implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $dni;
    
    public function __construct($dni)
    {
        $this->dni=$dni;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $persona_padre=Persona::where('dni','LIKE',$this->dni)->first();
        if($persona_padre==null){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The dni de padre no existe.';
    }
}
