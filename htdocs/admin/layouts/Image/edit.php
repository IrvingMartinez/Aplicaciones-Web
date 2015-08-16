<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
<div class="container">
	<div class="row">
		<h3>Actualizar Imagen</h3>
	</div>
	<div class="row">
	<img src="/images/{image}" width="300"/>
	<form method="POST" enctype="multipart/form-data">
	<br />
	<input type="file" name="imagen"/>
	<input type="hidden" name="id" value="{id}">
	<button type="submit">Actualizar</button>
	<a class="btn" href="/admin/Image">Atras</a>
	</form>
	</div>
</div>