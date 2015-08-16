<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
{modals}
<div class="container">
	<div class="row">
		<h3>REGISTRO DE PRODUCTOS</h3>
	</div>
	<div class="row">
		<p><a href="/admin/Products/create" class="btn btn-success">Agregar Producto</a></p>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Stock</th>
					<th>Stock min</th>
					<th>Categoria</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				{listProducts}
			</tbody>
		</table>
	</div>
</div>