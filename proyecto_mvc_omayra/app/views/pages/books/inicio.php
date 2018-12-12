<?php 
require RUTA_APP . '/views/inc/header.php';
//Mensaje de aviso de insercción, edición y eliminación correcto.
session_start();
if ( isset($_SESSION['success']) ) {
    echo('<div id="success-alert" class="alert alert-success">'.htmlentities($_SESSION['success'])."</div>\n");
    unset($_SESSION['success']);
}
?>
<br>
<a href="<?php echo RUTA_URL; ?>/books/add" class="btn btn-primary"><i class="fas fa-plus-square"></i> Añadir un nuevo libro</a>
<br></br>
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Título</th>
      <th scope="col">Autor</th>
      <th scope="col">Editorial</th>
      <th scope="col" style="text-align:center;">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($datos['books'] as $book) :?>
     <tr>
        <th scope="row"><?php echo $book->book_id; ?></th>
        <td><?php echo $book->title; ?></td>
        <td><?php echo $book->autor; ?></td>
        <td><?php echo $book->editorial; ?></td>
        <td style="text-align:center;">
        	<a class="btn btn-primary btn-md" href="<?php echo RUTA_URL; ?>/books/edit/<?php echo $book->book_id;?>"><i class="fas fa-pencil-alt"></i> Editar</a>
        	<a class="btn btn-danger btn-md" role="button" href="<?php echo RUTA_URL; ?>/books/del/<?php echo $book->book_id;?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
       	</td>
     </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php echo "<p style='text-align:right'>Número de libros: ".$datos['filas']."</p>";?>

<?php require RUTA_APP . '/views/inc/footer.php';?>