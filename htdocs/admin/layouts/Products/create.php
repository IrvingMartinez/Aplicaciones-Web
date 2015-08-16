<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Agregar nuevo producto</h3>
		</div>
		<form class="form-horizontal" action="/admin/Products/registerProducts" method="POST">
			<div class="control-group">
				<label class="control-label">Nombre:</label>
				<div class="controls">
					<input name="name" type="text"  placeholder="Nombre" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Stock:</label>
				<div class="controls">
					<input name="stock" type="text"  placeholder="Stock" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Stock_min</label>
				<div class="controls">
					<input name="stock_min" type="text"  placeholder="Stock_min" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Seleccione Categoria:</label>
				<div class="controls">
					<select name="category" type="text">
						{categories}
					</select>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Agregar</button>
				<a class="btn" href="/admin/Products">Atras</a>
			</div>
		</form>
	</div>
</div>