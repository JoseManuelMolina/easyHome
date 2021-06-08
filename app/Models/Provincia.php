<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    
    const TABLA = 'provincia';
    
    protected $table = self::TABLA;
    
    protected $fillable = [
            'provincia',
        ];
        
    public function inmueble(){
        return $this->hasMany('App\Models\Inmueble', 'idprovincia');
    }
}
