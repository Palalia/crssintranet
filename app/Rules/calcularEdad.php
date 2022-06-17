<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class calcularEdad implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $fechaNacimiento;
    private $fechaActual;
    private $edad;
    public function __construct($fechaNacimiento,$edad)
    {
        $fechaNacimiento=trim($fechaNacimiento);
        $this->fechaNacimiento=explode('-',$fechaNacimiento);
        $fechaactual=now()->toDateString();
        $this->fechaActual=explode('-',$fechaactual);
        $this->edad=$edad;
        Log::debug("this->edad". $this->edad);
        Log::debug("edad: ".$edad);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   //yyy-mm-dd
        if($this->calcularEdad()==$this->edad){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function calcularEdad(){
        $edadReal="";
        if($this->fechaNacimiento[1]>$this->fechaActual[1]){
            $edadReal=$this->fechaActual[0]-$this->fechaNacimiento[0]-1;
        }else{
            if($this->fechaNacimiento[1]<$this->fechaActual[1]){
                $edadReal=$this->fechaActual[0]-$this->fechaNacimiento[0];
            }else{
                if($this->fechaNacimiento[2]<$this->fechaActual[2]){
                    $edadReal=$this->fechaActual[0]-$this->fechaNacimiento[0];
                }else{
                    $edadReal=$this->fechaActual[0]-$this->fechaNacimiento[0]-1;
                }   
            }
        }
        Log::debug($edadReal);
        Log::debug("123".$this->edad);
        return $edadReal;
    }
    public function message()
    {
        return 'La edad no coincide con la fecha de nacimiento.';
    }
}
