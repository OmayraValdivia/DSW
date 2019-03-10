<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Idioma</title>
</head>
<body>
	<form action="/idioma" method="post">
    {{ csrf_field() }}
		<select name="idioma">
			<option value="español">Español</option>
			<option value="english">English</option>
			<option value="deutsch">Deutsch</option>
		</select>
		<br />
		<input type="submit" value="Enviar">
	</form>
	@if ($idioma == 'español')
		<p>Esta página esta en español</p>
		<p>Idioma selecionado: {{$idioma}}</p>
	@endif
	@if ($idioma == 'english')
		<p>This pages is in english</p>
		<p>Select languaje: {{$idioma}}</p>
	@endif
	@if ($idioma == 'deutsch')
		<p>Diese Seite ist in deutsch</p>
		<p>Ausgewählte Sprache: {{$idioma}}</p>
	@endif
</body>
</html>
