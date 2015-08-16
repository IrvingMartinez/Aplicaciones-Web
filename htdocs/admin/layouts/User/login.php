<?php
defined('_EXEC') or die;
?>
<link rel="stylesheet" href="/admin/css/login.css" type="text/css" media="all" />
<div id="login">
	<h1>Acceso Administrador</h1>
	<form method="POST" action="/admin/User/loginAction">
		<input name="usuario" type="text" placeholder="Usuario" required />
		<input name="contraseña" type="password" placeholder="Contraseña" required />
		<!--<input  type="submit"  value="Log in" />-->
		<button type="submit" class="sendLogin">Iniciar sesion</button>
	</form>
</div>
