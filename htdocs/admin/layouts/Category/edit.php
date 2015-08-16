<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Actualización de categoria</h3>
		</div>
		<form class="form-horizontal" action="/admin/Category/update/{id}" method="POST">
			<div class="control-group">
				<label class="control-label">Nombre:</label>
				<div class="controls">
					<input name="name" type="text"  placeholder="Nombre" value="{name}">
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Guardar</button>
				<a class="btn" href="/admin/Category">Atras</a>
			</div>
		</form>
	</div>
</div>