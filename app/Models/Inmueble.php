<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;
    
    const TABLA = 'inmueble';
    
    protected $table = self::TABLA;
    
    protected $fillable = [
            'iduser',
            'tipo',
            'idprovincia',
            'direccion',
            'nhabitaciones',
            'tamano',
            'extras',
            'precio',
            'foto',
            'comentario',
        ];
        
    public function provincia(){
        return $this->belongsTo('App\Models\Provincia','idprovincia');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User','iduser');
    }
    
    public function mensaje(){
        return $this->hasMany('App\Models\Mensaje', 'idinmueble');
    }
}
