<?php

use Illuminate\Database\Seeder;
use App\Cliente;
use App\User;

class DatabaseSeeder extends Seeder
{
    private $arrayClientes = array(
      array(
        'nombre' => 'Neo',
        'imagen' => '/storage/images/neo.jpg',
        'fecha_nacimiento' => '06/01/1972',
        'correo' => 'neo@matrix.org'
      ),
      array(
        'nombre' => 'Morfeo',
        'imagen' => '/storage/images/morfeo.jpg',
        'fecha_nacimiento' => '05/03/1997',
        'correo' => 'morfeo@matrix.org'
      )
    );

    private $arrayUsers = array(
      array(
        'nombre' => 'Omayra',
        'correo' => 'omy@dsw.org',
        'password' => '123123'
      ),
      array(
        'nombre' => 'Sara',
        'correo' => 'sara@dsw.org',
        'password' => '112233'
      )
    );

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      self::seedCatalog();
      $this->command->info('Tabla clientes inicializada con datos!');

      self::seedUsers();
      $this->command->info('Tabla users inicializada con datos!');
    }

    public function seedCatalog(){
      // Borramos los datos de la tabla clientes
      DB::table('clientes')->delete();

      //Recorremos el array e insertamos en la tabla clientes
      foreach( $this->arrayClientes as $cliente ) {
        $c = new Cliente;
        $c->nombre = $cliente['nombre'];
        $c->imagen = $cliente['imagen'];
        $c->fecha_nacimiento = date("Y-m-d", strtotime($cliente['fecha_nacimiento']));
        $c->correo = $cliente['correo'];
        $c->save();
      }
    }

    public function seedUsers(){
      // Borramos los datos de la tabla users
      DB::table('users')->delete();

      //Recorremos el array e insertamos en la tabla users
      foreach( $this->arrayUsers as $user ) {
        $u = new User;
        $u->name = $user['nombre'];
        $u->email = $user['correo'];
        $u->password = bcrypt($user['password']);
        $u->save();
      }
    }
}
