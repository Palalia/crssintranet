<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class prueba implements Rule
{

    private $fechaNacimiento; 
    private $edad;
    private $fechaActual;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct( $fechaNacimiento, $edad, $fechaActual) // 
    {
      $this->fechaNacimiento=$fechaNacimiento;
      $this->edad=$edad;
      $this->fechaActual=$fechaActual;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) // se hacen todos los calculos // 
    {

        //calculos
        //logica de tu regla 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
