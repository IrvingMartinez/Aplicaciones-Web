<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
{modals}
<div class="container">
	<div class="row">
		<h3>REGISTRO DE CATEGORIA</h3>
	</div>
	<div class="row">
		<p><a href="/admin/Category/create" class="btn btn-success">Agregar Categoria</a></p>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				{listCategory}
			</tbody>
		</table>
	</div>
</div>