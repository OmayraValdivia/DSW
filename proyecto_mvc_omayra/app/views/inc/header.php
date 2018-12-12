<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="id=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/css/all.min.css">
        <title><?php echo NOMBRE_SITIO?></title>
  </head>
  <body>
  	<div class="container">
  		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        	<a class="navbar-brand" href="<?php echo RUTA_URL; ?>">Proyecto CRUD MVC</a>
          	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            	<span class="navbar-toggler-icon"></span>
          	</button>
          	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            	<div class="navbar-nav">
              		<a class="nav-item nav-link" href="<?php echo RUTA_URL; ?>/users">Usuarios <span class="sr-only">(current)</span></a>
              		<a class="nav-item nav-link" href="<?php echo RUTA_URL; ?>/books">Libros</a>
            	</div>
          	</div>
        </nav>