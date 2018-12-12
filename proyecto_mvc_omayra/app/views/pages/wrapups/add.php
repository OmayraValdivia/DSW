<?php require RUTA_APP . '/views/inc/header.php';?>
<br>
<a href="<?php echo RUTA_URL; ?>/books/listOfUser/<?php echo $datos['user_id'];?>" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Volver</a>
<div class="card card-body bg-light mt-3">
    <h2>Agregar un Nuevo Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/wrapups/add/<?php echo $datos['user_id'];?>"" method="POST">
    	<div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Libros</label>
          </div>
          <select class="custom-select" name="book_id" id="inputGroupSelect01">
              <?php foreach ($datos['datos_books'] as $book) :?>
            	<option value="<?php echo $book->book_id; ?>"><?php echo $book->title; ?></option>
              <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
    		<label for="mark">Puntuación:<sup>*</sup></label>
    		<input type="number" required name="mark" class="form-control form-control-lg" value="<?php echo $datos['mark'];?>">
    	</div>
        <input type="hidden" name="user_id" value="<?php echo $datos['user_id'];?>">
    	<input type="submit" class="btn btn-success" value="Añadir Libro al usuario">
    </form>
</div>

<?php require RUTA_APP . '/views/inc/footer.php';?>