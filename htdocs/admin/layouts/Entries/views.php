<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
{modals}
<div class="container">
	<div class="row">
		<h3>REGISTRO DE ENTRADAS</h3>
	</div>
	<div class="row">
		<p><a href="/admin/Entries/create" class="btn btn-success">Agregar Entrada</a></p>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Fecha</th>
					<th>Producto</th>
					<th>Proveedor</th>
					<th>Aciones</th>
				</tr>
			</thead>
			<tbody>
				{listEntries}
			</tbody>
		</table>
	</div>
</div>