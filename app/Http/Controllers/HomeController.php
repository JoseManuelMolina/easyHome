<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserEditRequest;
use App\Models\Inmueble;
use App\Models\User;
use App\Models\Provincia;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Pagination\CursorPaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
        $this->middleware('verified')->except(['index']);
    }
    
    /*public function adminEdit(){
        return view('admin.edit');
    }*/
    
    /*public function adminUsuarioEdit(User $user){
        
        //dd($user);
        $roles = ['admin' => 'Admin', 'advanced' => 'Advanced', 'user' => 'User'];
        return view('admin.usuarioedit')->with(['usuario' => $user, 'roles' => $roles]);
    }*/




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $verified = Auth::user()->hasVerifiedEmail();
        $view = 'user.show';
        
        return view($view);
    }
    
    
    public function show(){
        return view('user.show')->with(['user' => auth()->user()]);
    }
    
    
    
    
    public function edit(){
        return view('user.edit')->with(['user' => auth()->user()]);
    }
    
    
    public function update(UserEditRequest $request)
    {
        //$input = $request->validated();
        
        
        
        $user = auth()->user();
        if($request->password != null || $request->newpassword != null) {
            //Hash::check($request->password, $user->password)
            //password_verify($request->password, $user->password)
            if($request->password == null || $request->newpassword == null || !password_verify($request->password, $user->password)) {
                
                return back()->withInput()->withErrors(['password' => 'La clave de acceso anterior no es correcta.']);
            }
            $user->password = Hash::make($request->newpassword);
            
        }
        
        
        $emailChanged = false;
        $user->name = $request->name;
        
        if($user->email != $request->email) {
            $emailChanged = true;
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        try {
            $user->save(); //
            if($emailChanged) {
                $user->sendEmailVerificationNotification();
                Auth::logout();
            }
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['update' => 'Se ha producido un error al guardar los datos.']);
        }
        return redirect('home')->with(['update' => true]);  //el ->with(['update' => true]); es un feedback para que el usuario vea que se han ejecutado los cambios
    }
    
    
    /*public function destroyUser(User $user){
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
    }*/
}
