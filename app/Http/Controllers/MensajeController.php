<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mensaje;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use App\Http\Requests\MensajeCreateRequest;
use Illuminate\Mail\Mailable;
//use Mail;
use Illuminate\Support\Facades\Mail;
use Auth;

class MensajeController extends Controller
{
    
    public function showForm(Request $request){
        return view('mensaje.contactform');
    }
    
    public function storeForm(Request $request, Inmueble $inmueble){
        $hola = 'hjola';
        
        dd($hola);
        
        $mensaje = new Mensaje();
        $mensaje->iduser = $inmueble->iduser;
        $mensaje->idinmueble = $inmueble->id;
        $mensaje->nombre = $request->nombre;
        $mensaje->email = $request->email;
        $mensaje->telefono = $request->telefono;
        $mensaje->mensaje = $request->mensaje;
        
        
        //dd([$mensaje, $request, $inmueble]);
        
        
        $user = User::find($inmueble->iduser);
        
        //dd($user, $inmueble);
        
        try{
            dd($mensaje);
            $result = $mensaje->save();
        }catch(\Exception $e){
            dd($e);
            return back()->withInput()->withErrors(['store' => 'Se ha producido un error al guardar los datos del mensaje']);
        }
        return back()->with('Completado', 'Gracias for contactar con el vendedor');
        
    }
    
    
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
