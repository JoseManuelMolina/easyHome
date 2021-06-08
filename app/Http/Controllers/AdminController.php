<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\User;
use App\Models\Provincia;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Http\Requests\UserEditRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariosTotales = User::all()->count();
        $inmublesTotales = Inmueble::all()->count();
        $mensajesTotales = Mensaje::all()->count();
        return view('admin.index')->with(['usuariosTotales' => $usuariosTotales, 'inmueblesTotales' => $inmublesTotales, 'mensajesTotales' => $mensajesTotales]);
    }

    public function adminUsuarios(){
        $usuariosTotales = User::all()->count();
        $inmublesTotales = Inmueble::all()->count();
        $mensajesTotales = Mensaje::all()->count();
        $usuarios = User::all();
        return view('admin.usuarios')->with(['usuarios' => $usuarios, 'usuariosTotales' => $usuariosTotales, 'inmueblesTotales' => $inmublesTotales, 'mensajesTotales' => $mensajesTotales]);
    }
    
    public function adminInmuebles(){
        $usuariosTotales = User::all()->count();
        $inmublesTotales = Inmueble::all()->count();
        $mensajesTotales = Mensaje::all()->count();
        $inmuebles = Inmueble::all();
        return view('admin.inmuebles')->with(['inmuebles' => $inmuebles, 'usuariosTotales' => $usuariosTotales, 'inmueblesTotales' => $inmublesTotales, 'mensajesTotales' => $mensajesTotales]);
    }

    public function adminUsuarioEdit(User $user){
            
            //dd($user);
            $roles = ['admin' => 'Admin', 'advanced' => 'Advanced', 'user' => 'User'];
            return view('admin.usuarioedit')->with(['usuario' => $user, 'roles' => $roles]);
    }
    
    public function adminUsuarioUpdate($user, UserEditRequest $request){
        $usuario = User::findOrFail($user);
        //dd($usuario, $request);
        if($usuario->name != $request->name){
            $usuario->name = $request->name;
        }
        if($usuario->email != $request->name){
            $usuario->email = $request->email;
        }
        if($usuario->rol != $request->rol){
            $usuario->rol = $request->rol;
        }
        try{
            $usuario->save();
        }catch(\Exception $e){
            return back()->withInput()->withErrors(['store' => 'Se ha producido un error al guardar los datos del usuario']);
        }
        return redirect('/admin/usuarios');
    }
    
    public function adminInmuebleEdit(Inmueble $inmueble){
            
            $provincias['provincias'] = Provincia::get(["id", "provincia"]);
            $tipos = ['vivienda' =>'Vivienda', 'habitacion' => 'Habitacion', 'local' => 'Local', 'oficina' => 'Oficina'];
            
            return view('admin.inmuebleedit', $provincias)->with(['inmueble' => $inmueble, 'tipos' => $tipos, 'fotos' => $this->getFiles($inmueble)]);
    }
    
    public function adminInmuebleUpdate(Inmueble $inmueble, Request $request){
        
        if($inmueble->iduser == auth()->user()->id || auth()->user()->rol =='admin'){
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
                $inmueble->save();
            }catch(\Exception $e){
                return back()->withInput()->withErrors(['store' => 'Se ha producido un error al guardar los datos del inmueble']);
            }
            
            $this->uploadFiles( $request, 'foto', $inmueble );
        }
         return redirect('/admin/inmuebles');
    }

    public function destroyUser(User $user){
        $inmuebles = DB::table('inmueble')
                ->where('iduser', '=', $user->id)
                ->delete();
        
        $user->delete();
        
        
        return back();
    }
    
    public function destroyInmueble(Inmueble $inmueble){
        $directorio = 'public/images/' . $inmueble->iduser . '/' . $inmueble->id;
        Storage::deleteDirectory($directorio);
        
        $inmueble->delete();
        
        return back();
    }
    
    
    
    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
