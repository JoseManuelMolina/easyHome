<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InmuebleCreateRequest extends FormRequest
{
    
    public function attributes(){
        return[
               'tipo'           => 'tipo',
               'direccion'      => 'direccion',
               'nhabitaciones'  => 'número de habitaciones',
               'tamano'         => 'tamaño',
               'extras'         => 'extras',
               'precio'         => 'precio',
               'foto'           => 'foto',
               'comentario'     => 'comentario',
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
        $required       = 'El campo \':attribute\' es obligatorio';
        return [
            'tipo.in'                       => $in,
            'direccion.required'            => $required,
            'nhabitaciones.required'        => $required,
            'tamano.required'               => $required,
            'precio.required'               => $required,
            'direccion.max'                 => $max,
            'extras.max'                    => $max,
            'foto.max'                      => $maxFoto,
            'tamano.get'                    => $gte,
            'nhabitaciones.get'             => $gte,
            'precio.get'                    => $gte,
            'precio.regex'                  => $regex,
            'nhabitaciones.digits_between'  => $digitsBetween,
            'tamano.digits_between'         => $digitsBetween,
            'foto.mimes'                    => $mimes,
        ];
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo'           => 'required|in:vivienda,habitacion,local,oficina',
            'direccion'      => 'required|max:50',
            'nhabitaciones'  => 'required|digits_between:1,2|gte:1',
            'tamano'         => 'required|digits_between:2,4|gte:0.1',
            'extras'         => 'nullable|max:50',
            'precio'         => 'required|gte:0.01|regex:/^\d{1,8}(\.\d{0,2})?$/',
            'foto'           => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10240',
            'comentario'     => 'nullable',
        ];
    }
}
