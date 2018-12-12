<?php require RUTA_APP . '/views/inc/header.php';?>
<br>
<a href="<?php echo RUTA_URL; ?>/books" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Volver</a>
<div class="card card-body bg-light mt-3">
	<h2>Editar Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/books/edit/<?php echo $datos['book_id']; ?>" method="POST">
    	<div class="form-group">
    		<label for="title">Título:<sup>*</sup></label>
    		<input type="text" required name="title" class="form-control form-control-lg" value="<?php echo $datos['title'];?>">
    	</div>
    	<div class="form-group">
    		<label for="autor">Autor:<sup>*</sup></label>
    		<input type="text" required name="autor" class="form-control form-control-lg" value="<?php echo $datos['autor'];?>">
    	</div>
    	<div class="form-group">
    		<label for="editorial">Editorial:<sup>*</sup></label>
    		<input type="text" required name="editorial" class="form-control form-control-lg" value="<?php echo $datos['editorial'];?>">
    	</div>
    	<input type="submit" class="btn btn-success" value="Editar Libro">
    </form>
</div>

<?php require RUTA_APP . '/views/inc/footer.php';?>