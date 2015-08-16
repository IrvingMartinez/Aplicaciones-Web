<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Agregar nuevo empleado</h3>
		</div>
		<form id="employeeCreate" class="form-horizontal" action="/admin/Employees/registerEmployee" method="POST">
			<div class="control-group">
				<label class="control-label">Nombre:</label>
				<div class="controls">
					<input name="name" type="text"  placeholder="Nombre">
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Apellido:</label>
				<div class="controls">
					<input name="lastname" type="text"  placeholder="Apellido" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Direcci&oacute;n:</label>
				<div class="controls">
					<input name="address" type="text"  placeholder="Direcci&oacute;n" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tel&eacute;fono:</label>
				<div class="controls">
					<input name="phone" type="number"  placeholder="Tel&eacute;fono" >
					<span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tipo Empleado:</label>
				<div class="controls">
					<select name="type" type="text"  placeholder="Tipo Empleado">
						<option value="0">Seleccione Tipo</option>
						<option value="Cocinero">Cocinero</option>
						<option value="Cajero">Cajero</option>
						<option value="Mesero">Mesero</option>
						<option value="Limpieza">Limpieza</option>
					</select>
                    <span class="help-inline" style="display: none"></span>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Agregar</button>
				<a class="btn" href="/admin/Employees">Atras</a>
			</div>
		</form>
	</div>
</div>