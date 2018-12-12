<?php require RUTA_APP . '/views/inc/header.php';?>
<br>
<a href="<?php echo RUTA_URL; ?>/users" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Volver</a>
<div class="card card-body bg-light mt-3">
    <h2>Editar Usuario</h2>
    <form action="<?php echo RUTA_URL; ?>/users/edit/<?php echo $datos['user_id']; ?>" method="POST">
    	<div class="form-group">
    		<label for="name">Nombre:<sup>*</sup></label>
    		<input type="text" required name="name" class="form-control form-control-lg" value="<?php echo $datos['name'];?>">
    	</div>
    	<div class="form-group">
    		<label for="email">Email:<sup>*</sup></label>
    		<input type="email" required name="email" class="form-control form-control-lg" value="<?php echo $datos['email'];?>">
    	</div>
    	<div class="form-group">
    		<label for="password">Contraseña:<sup>*</sup></label>
    		<input type="password" name="password" class="form-control form-control-lg">
    		<input type="hidden" name="oldPassword" value="<?php echo $datos['password'];?>">
    	</div>
    	<input type="submit" class="btn btn-success" value="Editar Usuario">
    </form>
</div>

<?php require RUTA_APP . '/views/inc/footer.php';?>