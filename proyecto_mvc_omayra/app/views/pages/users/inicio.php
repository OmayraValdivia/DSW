<?php 
require RUTA_APP . '/views/inc/header.php';
//Mensaje de aviso de insercción, edición y eliminación correcto.
session_start();
if ( isset($_SESSION['success']) ) {
    echo('<div id="success-alert" class="alert alert-success">'.htmlentities($_SESSION['success']). "</div>\n");
    unset($_SESSION['success']);
}
?><br>
<a href="<?php echo RUTA_URL; ?>/users/add" class="btn btn-primary"><i class="fas fa-plus-square"></i> Añadir un nuevo Usuario</a>
<br></br>
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Email</th>
      <th scope="col" style="text-align:center;">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($datos['users'] as $user) :?>
      <tr>
        <th scope="row"><?php echo $user->user_id; ?></th>
        <td><?php echo $user->name; ?></td>
        <td><?php echo $user->email; ?></td>
        <td style="text-align:center;">
            <a class="btn btn-info btn-md" href="<?php echo RUTA_URL; ?>/books/listOfUser/<?php echo $user->user_id;?>"><i class="fas fa-book-open"></i> Libros</a>
            <a class="btn btn-primary btn-md" href="<?php echo RUTA_URL; ?>/users/edit/<?php echo $user->user_id;?>"><i class="fas fa-pencil-alt"></i> Editar</a>
            <a class="btn btn-danger btn-md" role="button" href="<?php echo RUTA_URL; ?>/users/del/<?php echo $user->user_id;?>"><i class="fas fa-trash-alt"></i> Eliminar</a>
        </td>
      </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php echo "<p style='text-align:right'>Número de usuarios: ".$datos['filas']."</p>";?>

<?php require RUTA_APP . '/views/inc/footer.php';?>