<?php
	defined('_EXEC') or die;
	require_once PATH_LAYOUTS . 'header.php';
?>
	<div class="container">
		<div class="row">
			<h3>CAMBIAR IMAGEN</h3>
			<p><a href="/admin/Image/upload" class="btn btn-success">Agregar Imagen</a></p>
		</div>
		<table border="1" style="width:50%">
		  <tr>
			<td>Imagen</td>
			<td>Tipo</td>
			<td>Opcion</td> 
			<td>Opcion</td> 
		  </tr>
		{tableImages}
		</table>
	</div>