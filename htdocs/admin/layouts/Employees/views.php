<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
{modals}
<div class="container">
	<div class="row">
		<h3>REGISTRO DE EMPLEADOS</h3>
	</div>
	<div class="row">
		<p><a href="/admin/Employees/create" class="btn btn-success">Agregar Nuevo</a></p>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direcci&oacute;n</th>
					<th>Tel&eacute;fono</th>
					<th>Tipo</th>
					<th>Aciones</th>
				</tr>
			</thead>
			<tbody>
				{listEmployees}
			</tbody>
		</table>
	</div>
</div>