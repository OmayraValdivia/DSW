<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  private function getIdioma(){
    $idioma = \Request::cookie('idioma','es');
    //Cambiamos el locale segun el idioma seleccionado
    \App::setLocale($idioma);
    return $idioma;
  }
  public function getIndex(){
    //Obtener todos los clientes
    $clientes = Cliente::all();
    //Cookie
    $this->getIdioma();
    return view('catalog.index', compact('clientes'));
  }
  public function getShow($id){
    //Buscar el cliente con id $id
    $cliente = Cliente::findOrFail($id);
    //Cookie
    $this->getIdioma();
    return view('catalog.show', compact('cliente'));
  }
  public function getCreate(){
    //Cookie
    $this->getIdioma();
    return view('catalog.create');
  }
  public function getEdit($id){
    //Buscar el cliente con id $id
    $cliente = Cliente::findOrFail($id);
    //Cookie
    $this->getIdioma();
    return view('catalog.edit', compact('cliente'));
  }

  public function postCreate(Request $request){
    //Cookie
    $this->getIdioma();
    request()->validate([
      'name' => 'required',
      'imagen'=> 'required|image',
      'date' => 'required|date',
      'email' => 'required|email'
    ], [
      'name.required' => __('I need your name'),
      'imagen.required' => __('I need an image'),
      'imagen.image' => __('I need you to upload an image'),
      'date.required' => __('I need your date of birth'),
      'date.date' => __('This is not a date'),
      'email.required' => __('I need your email'),
      'email.email' => __('This is not an email')
    ]);
    $cliente = new Cliente;
    $cliente->nombre = $request->name;
    if ($request->hasFile('imagen')) {
      //Obtenemos nombre orginal
      $nameImg = $request->file('imagen')->getClientOriginalName();
      //Almacenamos la imagen en la carpeta public/images con el nombre original
      $path = $request->imagen->storeAs('images', $nameImg, 'public');
      //Almacenamos en la BBDD la ruta /storage/+$path
      $cliente->imagen = "/storage/".$path;
    }else{
      //Imagen comodin
      $cliente->imagen = '/storage/images/sinImg.png';
    }
    $date = date("Y-m-d", strtotime($request->date));
    $cliente->fecha_nacimiento = $date;
    $cliente->correo = $request->email;
    $cliente->save();
    //Redirigimos a catalog
    return redirect()->route('catalog');
  }
  public function putEdit(Request $request, $id){
    //Buscar el cliente con id $id
    $cliente = Cliente::findOrFail($id);
    $cliente->nombre = $request->name;
    if ($request->hasFile('imagen')) {
      //Obtenemos nombre orginal
      $nameImg = $request->file('imagen')->getClientOriginalName();
      //Almacenamos la imagen en la carpeta public/images con el nombre original
      $path = $request->imagen->storeAs('images', $nameImg, 'public');
      if ($cliente->imagen!=='/storage/images/sinImg.png'){
        //Quitamos el texto /storage/ (9 caracteres):
        $ruta = substr($cliente->imagen, 9);
        Storage::disk('public')->delete($ruta);
      }
      //Almacenamos en la BBDD la ruta /storage/+$path
      $cliente->imagen = "/storage/".$path;
    }else{
      //Si no se sube imagen, se mantiene la imagen que tiene.
      $cliente->imagen = $cliente->imagen;
    }
    $date = date("Y-m-d", strtotime($request->date));
    $cliente->fecha_nacimiento = $date;
    $cliente->correo = $request->email;
    $cliente->save();
    //Redirigimos a catalogShow/$id
    return redirect()->route('catalogShow', $id);
  }

  public function putDelete($id){
    $cliente = Cliente::findOrFail($id);
    //Borrar img si no es el comodin
    if ($cliente->imagen!=='/storage/images/sinImg.png'){
      //Quitamos el texto /storage/ (9 caracteres):
      $ruta = substr($cliente->imagen, 9);
      Storage::disk('public')->delete($ruta);
    }
    $cliente->delete();
    return redirect()->route('catalog');
  }
}
