<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    //
    public function idioma(){
      $idioma = \Request::cookie('idioma', 'español');

      return view('idioma.formulario', [
        'idioma' => $idioma
      ]);
    }

    public function guardaridioma(Request $request){
      $this->validate($request, [
        'idioma' => 'required'
      ]);
      return redirect('/idioma')
        ->withCookie(cookie('idioma', $request->input('idioma'), 60 * 24 * 365));
    }
}
