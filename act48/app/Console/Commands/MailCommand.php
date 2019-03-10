<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Cliente;
use App\Mail\BasicMail;

class MailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'El dia de su cumpleaño, manda correo a los clientes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $clientes = Cliente::all();
      foreach ($clientes as $cliente) {
        $fecha = date("m-d", strtotime($cliente->fecha_nacimiento));
        $hoy = date("m-d");
        if($fecha === $hoy){
          Mail::to($cliente->correo)
            ->send(new BasicMail($cliente));
            echo "Mail enviado a ".$cliente->nombre."\n";
            Log::info("Mail enviado a ".$cliente->nombre."\n");
        }
      }
    }
}
