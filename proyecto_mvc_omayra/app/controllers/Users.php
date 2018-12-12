<?php 
class Users extends Controller{
    
    public function __construct() {
        $this->userModel = $this->model('User');
    }
    public function index() {
        $users = $this->userModel->getUsers();
        $filas = $this->userModel->numFilas();
        $datos = [
            'users'=>$users,
            'filas'=>$filas
        ];
        $this->view('users/inicio',$datos);
    }
    //Insertar usuarios
    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
            ];
            if($this->userModel->addUser($datos)){
                session_start();
                $_SESSION['success'] = "Registro insertado correctamente.";
                redirigir('/users');
            }else{
                die("Ups! Algo salió mal.");
            }
        }else{
            $datos = [
                'name'=> '',
                'email'=> '',
                'password'=> ''
            ];
            $this->view('users/add',$datos);
        }
    }
    //Modificar usuarios
    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'user_id' => $id,
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'oldPassword' => trim($_POST['oldPassword'])
            ];
            if($this->userModel->editUser($datos)){
                session_start();
                $_SESSION['success'] = "Registro editado correctamente.";
                redirigir('/users');
            }else{
                die("Ups! Algo salió mal.");
            }
        }else{
            //Obtener informacion del usuario desde el modelo
            $user = $this->userModel->getUser($id);
            $datos = [
                'user_id' => $user->user_id,
                'name'=> $user->name,
                'email'=> $user->email,
                'password'=> $user->password
            ];
            $this->view('users/edit',$datos);
        }
    }
    //Eliminar usuarios
    public function del($id) {
        //Obtener informacion del usuario desde el modelo
        $user = $this->userModel->getUser($id);
        $datos = [
            'user_id' => $user->user_id,
            'name'=> $user->name,
            'email'=> $user->email,
            'password'=> $user->password
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'user_id' => $id
            ];
            if($this->userModel->delUser($datos)){
                session_start();
                $_SESSION['success'] = "Registro eliminado correctamente.";
                redirigir('/users');
            }else{
                die("Ups! Algo salió mal.");
            }
        }
        $this->view('users/del',$datos);
    }
}
?>