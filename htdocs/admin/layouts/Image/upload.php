<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
<div class="container">
	<div class="row">
		<h3>Subir nueva foto</h3>
	</div>
	<div class="row">
	<form method="POST" enctype="multipart/form-data">
		<select name="type" type="text" >
			<option value="Slider">Slider</option>
			<option value="Logo">Logo</option>
			<option value="Extra">Extra</option>
			<option value="imageDay">Imagen del dia</option>
			<option value="quality">Imagen Calidad</option>
		</select>
	<input type="file" name="imagen"/>
	<button type="submit">Subir</button>
	<a class="btn" href="/admin/Image">Atras</a>
	</form>
	</div>
</div>