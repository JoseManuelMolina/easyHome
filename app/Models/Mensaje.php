<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    
    const TABLA= 'mensaje';
    
    protected $table = self::TABLA;
    
    protected $fillable = [
            'iduser',
            'idinmueble',
            'nombre',
            'email',
            'telefono',
            'mensaje',
        ];
        
    public function inmueble(){
        return $this->belongsTo('App\Models\Inmueble','idinmueble');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User','iduser');
    }
}
