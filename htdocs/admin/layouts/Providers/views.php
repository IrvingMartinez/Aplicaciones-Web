<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
{modals}
<div class="container">
	<div class="row">
		<h3>REGISTRO DE PROVEEDORES</h3>
	</div>
	<div class="row">
		<p><a href="/admin/Providers/create" class="btn btn-success">Agregar Proveedor</a></p>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				{listProviders}
			</tbody>
		</table>
	</div>
</div>