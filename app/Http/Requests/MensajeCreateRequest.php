<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensajeCreateRequest extends FormRequest
{
    
    public function attributes(){
        return[
               'nombre'         => 'nombre',
               'email'          => 'direccion',
               'telefono'       => 'telefono',
               'mensaje'        => 'mensaje',
        ];
    }
    
    
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(){
        
        $digits         = 'El campo \':attribute\' no debe tener mas de :digits dígitos.';
        $digitsBetween  = 'El valor del campo \':attribute\' es :input y debe tener entre :min y :max dígitos.';
        $gte            = 'El valor del campo \':attribute\' es :input y debe ser mayor o igual que :value.';
        $in             = 'El campo \':attribute\' no tiene el valor correcto, los valores permitidos son: :values.';
        $max            = 'La longitud máxima del campo \':attribute\' es de :max caracteres.';
        $maxFoto        = 'La longitud máxima del campo \':attribute\' es de :max KB.';
        $mimes          = 'Sólo se pueden subir imágenes.';
        $min            = 'La longitud mínima del campo \':attribute\' es de :min caracteres.';
        $regex          = 'El campo \':attribute\' debe tener el formato de moneda.';
        $email          = 'El campo \'attribute\' debe tener el formato de email';
        $required       = 'El campo \':attribute\' es obligatorio';
        return [
            'nombre.max'                    => $max,
            'nombre.required'               => $required,
            'email.email'                   => $email,
            'email.max'                     => $max,
            'email.required'                => $required,
            'telefono.required'             => $required,
            'telefono.min'                  => $min,
            'telefono.max'                  => $max,
            'telefono.regex'                => $regex,
            'comentario.required'           => $required,
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
               'nombre'         => 'required||max:100',
               'email'          => 'required|max:150|email',
               'telefono'       => 'required|max:20|regex:/^([0-9\s\-\+\(\)]*)$/|min:90',
               'mensaje'        => 'required',
        ];
    }
}
