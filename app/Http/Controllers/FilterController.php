<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Provincia;
use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use DB;

class FilterController extends Controller
{
    function index(Request $request){
        
        
        
        $nrp = 5;
        $orderBy = 'id';
        $asc_desc = 'asc';
        
        if($request->nrp != null){
            $nrp = $request->nrp;
        }
        if($request->orderBy != null){
            if($request->orderBy == 'id_asc'){
                $orderBy = 'id';
                $asc_desc = 'asc';
            }else if($request->orderBy == 'id_desc'){
                $orderBy = 'id';
                $asc_desc = 'desc';
            }else if($request->orderBy == 'precio_asc'){
                $orderBy = 'precio';
                $asc_desc = 'asc';
            }else if($request->orderBy == 'precio_desc'){
                $orderBy = 'precio';
                $asc_desc = 'desc';
            }
        }
        
        $inmuebles = DB::table('inmueble')
                            ->where('precio', '>', '400')
                            //->orderBy('Controller', 'ASC')
                            ->get();
                    
        //dd($inmuebles);
                            
        /*if($request->orderBy == null){
            $inmuebles = $inmuebles -> paginate( $nrp );
        }else{
            $inmuebles = $inmuebles -> orderBy( $orderby, $asc_desc ) -> paginate( $nrp );//->appends(['orderby' => $orderby]);
        }*/
                            
        //dd($inmuebles);
        
        $provincias['provincias'] = Provincia::get(["id", "provincia"]);
        $tipos = ['vivienda' =>'Vivienda', 'habitacion' => 'Habitacion', 'local' => 'Local', 'oficina' => 'Oficina'];
        
        //return view('inmueble.all', $provincias)->with(['inmuebles' => $inmuebles, 'parametros' => ['orderby' => $orderby], 'tipos' => $tipos]);
        return view('inmueble.all', $provincias)->with(['inmuebles' => $inmuebles, 'tipos' => $tipos, 'parametros' => ['orderby' => $request->orderBy]]);
    }
}
