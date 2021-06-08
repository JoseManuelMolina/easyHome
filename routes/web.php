<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [InmuebleController::class,'all'])->name('main');
Route::get('show/{inmueble}',[InmuebleController::class, 'show'])->name('show');
Route::post('/contact/{inmueble}', [MensajeController::class, 'storeForm'])->name('contact');

/*Rutas que se generan por usar el sistema de gestión de usuarios*/
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/show',[App\Http\Controllers\HomeController::class, 'show'])->name('user.show');
Route::get('user/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('user.edit');
Route::put('user/update', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update');
//Route::delete('user/destroy', [App\Http\Controllers\HomeController::class, 'destroy'])->name('user.destroy');

Route::delete('user/destroy/{user}', [AdminController::class, 'destroyUser'])->name('user.destroy');
Route::delete('inmueble/destroy/{inmueble}', [AdminController::class, 'destroyInmueble'])->name('inmueble.destroy');

/*Rutas de los recursos*/
Route::resource('inmueble', InmuebleController::class, ['names' => 'inmueble'])->middleware('verified');
Route::resource('mensaje', MensajeController::class, ['names' => 'mensaje']);


/*Rutas del Admin Area*/
/*Route::get('/admin/index',[App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.index');*/
/*Route::get('/admin/usuarios',[App\Http\Controllers\HomeController::class, 'adminUsuarios'])->name('admin.usuarios');
Route::get('/admin/inmuebles',[App\Http\Controllers\HomeController::class, 'adminInmuebles'])->name('admin.inmuebles');*/
/*
Route::get('/admin/edit',[App\Http\Controllers\HomeController::class, 'adminEdit'])->name('admin.edit');
Route::get('/admin/useredit/{user}', [App\Http\Controllers\HomeController::class, 'adminUsuarioEdit'])->name('admin.useredit');*/


Route::delete('user/destroy/{user}', [AdminController::class, 'destroyUser'])->name('user.destroy');
Route::delete('inmueble/destroy/{inmueble}', [AdminController::class, 'destroyInmueble'])->name('inmueble.destroy');
Route::get('/admin/usuarios', [AdminController::class, 'adminUsuarios'])->name('admin.usuarios');
Route::get('/admin/inmuebles', [AdminController::class, 'adminInmuebles'])->name('admin.inmuebles');
Route::get('/admin/useredit/{user}', [AdminController::class, 'adminUsuarioEdit'])->name('admin.useredit');
Route::put('admin/userupdate/{user}', [AdminController::class, 'adminUsuarioUpdate'])->name('admin.userupdate');
Route::get('/admin/inmuebleedit/{inmueble}', [AdminController::class, 'adminInmuebleEdit'])->name('admin.inmuebleedit');
Route::put('admin/inmuebleupdate/{inmueble}', [AdminController::class, 'adminInmuebleUpdate'])->name('admin.inmuebleupdate');

Route::resource('admin', AdminController::class, ['names' => 'admin']);

/*Route::get('/admin/usuarios', [AdminController::class, 'adminUsuarios'])->name('admin.usuarios');
Route::get('/admin/inmuebles', [AdminController::class, 'adminInmuebles'])->name('admin.inmuebles');*/

/*Filtros*/

Route::get('filter', [InmuebleController::class, 'filter'])->name('filter');


/*Create Mensaje*/
Route::get('store/mensaje/{inmueble}',[MensajeController::class, 'storeForm'])->name('store.mensaje');