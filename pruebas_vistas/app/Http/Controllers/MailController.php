<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Cliente;
use App\Mail\BasicMail;

class MailController extends Controller
{
    //
    public function html_email() {
      $clientes = Cliente::all();
      foreach ($clientes as $cliente) {
        $fecha = date("m-d", strtotime($cliente->fecha_nacimiento));
        $hoy = date("m-d");
        if($fecha === $hoy){
          Mail::to($cliente->correo)
            ->send(new BasicMail($cliente));
            echo "Mail enviado a ".$cliente->nombre;
        }
      }
    }
}
