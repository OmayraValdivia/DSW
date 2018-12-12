<?php 
class Books extends Controller{
    
    public function __construct() {
        $this->bookModel = $this->model('Book');
    }
    public function index() {
        $books = $this->bookModel->getBooks();
        $filas = $this->bookModel->numFilas();
        $datos = [
            'books'=>$books,
            'filas'=>$filas
        ];
        $this->view('books/inicio',$datos);
    }
    //Listar los libros de un usuario
    public function listOfUser($id) {
        $books = $this->bookModel->getBooksOfUser($id);
        $filas = $this->bookModel->numFilasBooksUser($id);
        $datos = [
            'books'=>$books,
            'user_id'=> $id,
            'filas'=>$filas
        ];
        $this->view('books/ofUser',$datos);
    }
    //Insertar libros
    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'title' => trim($_POST['title']),
                'autor' => trim($_POST['autor']),
                'editorial' => trim($_POST['editorial'])
            ];
            if($this->bookModel->addBook($datos)){
                session_start();
                $_SESSION['success'] = "Registro insertado correctamente.";
                redirigir('/books');
            }else{
                //die("Ups! Algo salió mal.");
                $datos+=['existe'=>'Verifica si ese título ya existe.'];
                $this->view('books/add',$datos);
            }
        }else{
            $datos = [
                'title' => '',
                'autor' => '',
                'editorial' => ''
            ];
            $this->view('books/add',$datos);
        }
    }
    //Modificar libros
    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'book_id' => $id,
                'title' => trim($_POST['title']),
                'autor' => trim($_POST['autor']),
                'editorial' => trim($_POST['editorial'])
            ];
            if($this->bookModel->editBook($datos)){
                session_start();
                $_SESSION['success'] = "Registro editado correctamente.";
                redirigir('/books');
            }else{
                die("Ups! Algo salió mal.");
            }
        }else{
            //Obtener informacion del libro desde el modelo
            $book = $this->bookModel->getBook($id);
            $datos = [
                'book_id' => $book->book_id,
                'title' => $book->title,
                'autor' => $book->autor,
                'editorial' => $book->editorial
            ];
            $this->view('books/edit',$datos);
        }
    }
    //Eliminar libros
    public function del($id) {
        //Obtener informacion del libro desde el modelo
        $book = $this->bookModel->getBook($id);
        $datos = [  
            'book_id' => $book->book_id,
            'title' => $book->title,
            'autor' => $book->autor,
            'editorial' => $book->editorial
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'book_id' => $id
            ];
            if($this->bookModel->delBook($datos)){
                session_start();
                $_SESSION['success'] = "Registro eliminado correctamente.";
                redirigir('/books');
            }else{
                die("Ups! Algo salió mal.");
            }
        }
        $this->view('books/del',$datos);
    }
}
?>