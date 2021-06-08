<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\User;
use App\Models\Provincia;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Http\Requests\InmuebleCreateRequest;
use Intervention\Image\Facades\Image;
use Storage;
use DB;

class InmuebleController extends Controller
{
    
    public function filter(Request $request){
        
        
        //dd($request);
        $nrp = 5;
        $orderby = 'id';
        $asc_desc = 'desc';
        $order = "null";
        
        
        /**
         * Método de ordenación (por defecto del mas nuevo al mas antiguo)
         */
        
        if($request->orderBy != "null"){
            if($request->orderBy == 'id_asc'){
                $orderby = 'id';
                $asc_desc = 'asc';
            }else if($request->orderBy == 'id_desc'){
                $orderby = 'id';
                $asc_desc = 'desc';
            }else if($request->orderBy == 'precio_asc'){
                $orderby = 'precio';
                $asc_desc = 'asc';
                $nrp = 50; //Si pagina con precio da fallo, por eso pongo el maximo de nrp
            }else if($request->orderBy == 'precio_desc'){
                $orderby = 'precio';
                $asc_desc = 'desc';
                $nrp = 50; //Si pagina con precio da fallo, por eso pongo el maximo de nrp
            }
            $order = $request->orderBy;
        }
        
        
        /**
         * Número de registros por página (por defecto 5)
         */
        
        if($request->nrp != "null"){
            if($request->nrp == '5'){
                $nrp = 5;
            }else if($request->nrp == '10'){
                $nrp = 10;
            }else if($request->nrp == '20'){
                $nrp = 20;
            }else if($request->nrp == '25'){
                $nrp = 25;
            }else if($request->nrp == '50'){
                $nrp = 50;
            }
        }
        
        /**
         * Filtramos por precio
         */
        if($request->minprecio == null){
            $minprecio = 0;
        }else{ $minprecio = $request->minprecio; }
        if($request->maxprecio == null){
            $maxprecio = 999999999;
        }else{ $maxprecio = $request->maxprecio; }
        
        /**
         * Filtramos por número de habitaciones
         */
        if($request->minnhabitaciones == null){
            $minnhabitaciones = 1;
        }else{ $minnhabitaciones = $request->minnhabitaciones; }
        if($request->maxnhabitaciones == null){
            $maxnhabitaciones = 30;
        }else{ $maxnhabitaciones = $request->maxnhabitaciones; }
        
        /**
         * Filtramos por tamaño
         */
        if($request->mintamano == null){
            $mintamano = 20;
        }else{ $mintamano = $request->mintamano; }
        if($request->maxtamano == null){
            $maxtamano = 1500;
        }else{ $maxtamano = $request->maxtamano; }
        
        /**
         * Filtramos por provincia
         */
        if($request->idprovincia == null){
            $idprovincia = '%';
        }else{ $idprovincia = $request->idprovincia; }
        
        /**
         * Filtramos por tipo
         */
        if($request->tipo == null){
            $tipo = '%';
        }else{ $tipo = $request->tipo; }
        
        //dd($idprovincia, $request);
        $precio = 'precio';
        
        /*$inmuebles = DB::table('inmueble')
                            ->where($precio, '>=', $minprecio)
                            ->where('precio', '<=', $maxprecio)
                            ->where('nhabitaciones', '>=', $minnhabitaciones)
                            ->where('nhabitaciones', '<=', $maxnhabitaciones)
                            ->where('tamano', '>=', $mintamano)
                            ->where('tamano', '<=', $maxtamano)
                            ->where('idprovincia', 'like', $idprovincia)
                            ->where('tipo', 'like', $tipo)
                            ->orderBy($orderby, $asc_desc)
                            ->cursorPaginate($nrp);*/
        
        $inmuebles = DB::table('inmueble')                    
                            ->where([
                                    ['precio', '>=', $minprecio],
                                    ['precio', '<=', $maxprecio],
                                    ['nhabitaciones', '>=', $minnhabitaciones],
                                    ['nhabitaciones', '<=', $maxnhabitaciones],
                                    ['tamano', '>=', $mintamano],
                                    ['tamano', '<=', $maxtamano],
                                    ['idprovincia', 'like', $idprovincia],
                                    ['tipo', 'like', $tipo],
                                ])
                            ->orderBy($orderby, $asc_desc)
                            ->cursorPaginate($nrp);
                            
        
        //dd($inmuebles);
        /*if($orderby == null){
            $inmuebles = $inmuebles -> paginate( $nrp );
        }else{
            $inmuebles = $inmuebles -> orderBy( $orderby, $asc_desc ) -> paginate( $nrp ) ->get();//->appends(['orderby' => $orderby]);
        }*/
        
        //dd($inmuebles);
        
        
        $provincias['provincias'] = Provincia::get(["id", "provincia"]);
        $tipos = ['vivienda' =>'Vivienda', 'habitacion' => 'Habitacion', 'local' => 'Local', 'oficina' => 'Oficina'];
        
        return view('inmueble.all', $provincias)->with(['inmuebles' => $inmuebles, 'request' => $request,'parametros' => ['orderby' => $orderby], 'tipos' => $tipos,
                        'criterios' =>['minprecio' => $minprecio, 'maxprecio' => $maxprecio, 'minnhabitaciones' => $minnhabitaciones, 'maxnhabitaciones' => $maxnhabitaciones,
                        'mintamano' => $mintamano, 'maxtamano' => $maxtamano, 'idprovincia' => $idprovincia, 'tipo' => $tipo, 'order' =>$order, 'nrp' => $nrp]]);
    }
    
    
    public function all(Request $request){
        //dd($request);
        //$inmuebles->Inmueble::all();
        
        $nrp = 5;
        $inmuebles = new Inmueble;
        $orderby = $request->orderby;
        $asc_desc = 'desc';
        
        if($request->asc_desc != null){
            $asc_desc = $request->asc_desc;
        }
        if($request->nrp !=null){
            $nrp = $request->nrp;
        }
        
        if($orderby == null){
            $inmuebles = $inmuebles -> paginate( $nrp );
        }else{
            $inmuebles = $inmuebles -> orderBy( $orderby, $asc_desc ) -> paginate( $nrp );//->appends(['orderby' => $orderby]);
        }
        
        
        
        $provincias['provincias'] = Provincia::get(["id", "provincia"]);
        $tipos = ['vivienda' =>'Vivienda', 'habitacion' => 'Habitacion', 'local' => 'Local', 'oficina' => 'Oficina'];
        
        return view('inmueble.all', $provincias)->with(['inmuebles' => $inmuebles, 'parametros' => ['orderby' => $orderby], 'tipos' => $tipos]);
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $inmuebles = Inmueble::where('iduser', $id)->get();
        return view('inmueble.index')->with(['inmuebles' => $inmuebles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias['provincias'] = Provincia::get(["id", "provincia"]);
        
        $tipos = ['vivienda' =>'Vivienda', 'habitacion' => 'Habitacion', 'local' => 'Local', 'oficina' => 'Oficina'];
        return view('inmueble.create', $provincias) -> with(['tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InmuebleCreateRequest $request)
    {
        //
        $inmueble = new Inmueble($request->all());
        $inmueble->iduser = auth()->user()->id;
        $archivo = null;
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $archivo = $request->file('foto');
            $path = $archivo->getRealPath();
            $imagen = $this->reduceImage($path);
            $inmueble->foto = base64_encode($imagen);
        }
        
        try{
            $result = $inmueble->save();
            if($archivo != null){
                $fecha = new \DateTime();
                $nombre = $fecha->getTimeStamp() . '.' . $archivo -> extension();
                $path = $archivo->storeAs('public/images/' . $inmueble->iduser . '/' . $inmueble->id, $nombre);
            }
        }catch(\Exception $e){
            return back()->withInput()->withErrors(['store' => 'Se ha producido un error al guardar los datos del inmueble']);
        }
        //return back();
        return redirect()->route('inmueble.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        
        //dd($this->getFiles($inmueble));
        return view('inmueble.show')->with([ 'inmueble' => $inmueble, 'fotos' => $this->getFiles($inmueble)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmueble $inmueble)
    {
        $provincias['provincias'] = Provincia::get(["id", "provincia"]);
        $tipos = ['vivienda' =>'Vivienda', 'habitacion' => 'Habitacion', 'local' => 'Local', 'oficina' => 'Oficina'];
        
        if( $inmueble->iduser == auth()->user()->id){
            return view('inmueble.edit', $provincias)->with(['inmueble' => $inmueble, 'tipos' => $tipos, 'fotos' => $this->getFiles($inmueble)]);
        }else{
           echo 'no';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inmueble $inmueble)
    {
        //dd($request);
        //$data = array('request' => $request, 'inmueble' => $inmueble);
        //dd($data);
        if($inmueble->iduser == auth()->user()->id || auth()->user()->rol =!'user'){
            if($request->set){
                
                $foto = $this->reduceImage(asset(Storage::url($request->set)));
                $inmueble->foto = base64_encode($foto);
            }
            if( $request->unset ){
                Storage::delete($request->unset);
            }
            if( $request->has( 'unsetcover' ) ){
                $inmueble -> foto = null;
            }
            
            if($inmueble->tipo != $request->tipo){
                $inmueble->tipo = $request->tipo;
            }
            if($inmueble->idprovincia != $request->idprovincia){
                $inmueble->idprovincia = $request->idprovincia;
            }
            if($inmueble->direccion != $request->direccion){
                $inmueble->direccion = $request->direccion;
            }
            if($inmueble->nhabitantes != $request->nhabitantes){
                $inmueble->nhabitantes = $request->nhabitantes;
            }
            if($inmueble->tamano != $request->tamano){
                $inmueble->tamano = $request->tamano;
            }
            if($inmueble->extras != $request->extras){
                $inmueble->extras = $request->extras;
            }
            if($inmueble->precio != $request->precio){
                $inmueble->precio = $request->precio;
            }
            
            try{
                //dd($request);
                //dd($inmueble);
                $inmueble->save();
            }catch(\Exception $e){
                return back()->withInput()->withErrors(['store' => 'Se ha producido un error al guardar los datos del inmueble']);
            }
            
            $this->uploadFiles( $request, 'foto', $inmueble );
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        $directorio = 'public/images/' . $inmueble->iduser . '/' . $inmueble->id;
        Storage::deleteDirectory($directorio);
        $inmueble->delete();
        
        //return back();
        return redirect()->route('inmueble.index');
    }
    
    private function reduceImage($path){
        $img = Image::make($path);
        $img -> resize(300,300,function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $jpg = (string) $img->encode('jpg',75);
        return $jpg;
    }
    
    private function getFirstFile( Inmueble $inmueble ){
        $file = null;
        $files = $this->getFiles( $inmueble );
        
        if( isset( $files[0] ) ){
            $file = $files[0];
        }
        
        return $file;
    }
    
    private function getFotos($inmuebles){
        $fotos = [];
        
        foreach( $inmuebles as $inmueble ){
             if( $inmueble->foto == null ){
                 $fotos[ $inmueble->id ] = $this->getFirstFile( $inmueble );
             }else{
                 $fotos[ $inmueble->id ] = null;
             }
         }
         
         return $fotos;
    }
    
    private function getFiles(Inmueble $inmueble){
    //Storage::allfiles('public/images/' . $inmueble->iduser . '/' . $inmueble->id);        

    return $files = Storage::files('public/images/' . $inmueble->iduser . '/' . $inmueble->id);


    }
    
    private function uploadFiles(Request $request, string $name, Inmueble $inmueble){
        
        if( $request->hasFile( $name ) ){
            $contador = 0;
            foreach( $request->file( $name ) as $file ){
                $fecha = new \DateTime();
                $nombre = $fecha->getTimeStamp() . $contador .'.' . $file -> extension();       //nombre con el que se guarda el archivo en el storage
                $contador++;
                $file->storeAs('public/images/' . $inmueble->iduser . '/' . $inmueble->id, $nombre);    
                
            }
        }
        
    }
}
