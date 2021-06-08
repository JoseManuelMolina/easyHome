<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    public function attributes() {
        return [
            'email'         => 'correo electrónico',
            'name'          => 'nombre',
            'newpassword'   => 'clave de acceso'
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

    public function messages() {
        $confirmed  = 'No coinciden las dos claves de acceso.';
        $email      = 'El campo \':attribute\' no tiene el formato de correo requerido.';
        $max        = 'La longitud máxima del campo \':attribute\' es de :max caracteres.';
        $min        = 'La longitud mínima del campo \':attribute\' es de :min caracteres.';
        $required   = 'El campo \':attribute\' es obligatorio.';
        $string     = 'El campo \':attribute\' tiene que ser una cadena de caracteres.';
        $unique     = 'El correo electrónico ya está siendo usado por otro usuario.';
        return [
            'email.required'        => $required,
            'email.string'          => $string,
            'email.max'             => $max,
            'email.email'           => $email,
            'email.unique'          => $unique,
            'name.required'         => $required,
            'name.string'           => $string,
            'name.max'              => $max,
            'newpassword.string'    => $string,
            'newpassword.min'       => $min,
            'newpassword.confirmed' => $confirmed,
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->user);
        $id = $this->user;
        if($this->user == null){
            $id = auth()->user()->id;
        }
        //https://stackoverflow.com/questions/40942367/how-validate-unique-email-out-of-the-user-that-is-updating-it-in-laravel
        return [
            //'email'         => 'required|string|max:255|email|unique:users,email,' . auth()->user()->id . 'id',  -> el ultimo id es el nombre de la columna primary key (en caso de que la pk sea manzana se pone manzana)  
            //unique:tabla, campo, valor_del_campo_id
            //unique:tabla, campo, valor_de_otro_campo, nombre_del_campo
            'email'         => 'required|string|max:255|email|unique:users,email,' . $id,
            'name'          => 'required|string|max:255',
            'newpassword'   => 'nullable|string|min:8|confirmed'
        ];
    }
    
    
}