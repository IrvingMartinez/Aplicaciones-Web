<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Agregar nueva entrada</h3>
		</div>
		<form class="form-horizontal" action="/admin/Entries/registerEntries" method="POST">
			<div class="control-group">
				<label class="control-label">Cantidad:</label>
				<div class="controls">
					<input name="quantity" type="text"  placeholder="Cantidad" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Fecha:</label>
				<div class="controls">
					<input name="idate" type="text"  placeholder="Fecha" value="{hour}">
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Seleccione Producto:</label>
				<div class="controls">
					<select name="id_product" type="text">
						{products}
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Seleccione Proveedor:</label>
				<div class="controls">
					<select name="id_provider" type="text">
						{providers}
					</select>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Agregar</button>
				<a class="btn" href="/admin/Entries">Atras</a>
			</div>
		</form>
	</div>
</div>