<?php 
class Wrapups extends Controller{
    
    public function __construct() {
        $this->wrapupModel = $this->model('Wrapup');
        $this->bookModel = $this->model('Book');
    }
    //Insertar puntuacion
    public function add($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'user_id' => trim($_POST['user_id']),
                'book_id' => trim($_POST['book_id']),
                'mark' => trim($_POST['mark'])
            ];
            if($this->wrapupModel->addWrapup($datos)){
                session_start();
                $_SESSION['success'] = "Registro insertado correctamente.";
                redirigir('/books/listOfUser/'.$id);
                
            }else{
                die("Ups! Algo salió mal.");
            }
        }else{
            $books = $this->bookModel->getBooks();
            $datosBooks = [
                'books'=>$books
            ];
            $datos = [
                'user_id' => $id,
                'datos_books' => $books,
                'mark' => ''
            ];
            $this->view('wrapups/add',$datos);
        }
    }
    //Modificar puntuacion
    public function edit($data) {
        //Parche momentaneno para obtener el libro y el usuario
        $partes = explode("-", $data);
        $user_id = $partes[1];
        $book_id = $partes[0];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'user_id' => trim($_POST['user_id']),
                'book_id' => trim($_POST['book_id']),
                'mark' => trim($_POST['mark'])
            ];
            if($this->wrapupModel->editWrapup($datos)){
                session_start();
                $_SESSION['success'] = "Registro editado correctamente.";
                redirigir('/books/listOfUser/'.$user_id);
                
            }else{
                die("Ups! Algo salió mal.");
            }
        }else{
            $bookName = $this->bookModel->getBook($book_id);
            $book = $this->wrapupModel->getWrapup($user_id,$book_id);
            $datos = [
                'user_id' => $user_id,
                'book_id' => $book_id,
                'book_title' => $bookName->title,
                'mark' => $book->mark
            ];
            $this->view('wrapups/edit',$datos);
        }
    }
    //Eliminar libros del usuario
    public function del($data) {
        //Parche momentaneno para obtener el libro y el usuario
        $partes = explode("-", $data);
        $user_id = $partes[1];
        $book_id = $partes[0];
        //Obtener informacion del libro desde el modelo
        $bookName = $this->bookModel->getBook($book_id);
        $book = $this->wrapupModel->getWrapup($user_id,$book_id);
        $datos = [
            'user_id' => $user_id,
            'book_id' => $book_id,
            'book_title' => $bookName->title,
            'mark' => $book->mark
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'book_id' => $book_id,
                'user_id' => $user_id
            ];
            if($this->wrapupModel->delWrapup($datos)){
                session_start();
                $_SESSION['success'] = "Registro eliminado correctamente.";
                redirigir('/books/listOfUser/'.$user_id);
            }else{
                die("Ups! Algo salió mal.");
            }
        }
        $this->view('wrapups/del',$datos);
    }
}
?>