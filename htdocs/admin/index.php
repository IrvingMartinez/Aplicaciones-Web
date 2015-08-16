<?php

// Permite que leas los archivos php
define('_EXEC', 1);

// Aqui inicializamos las sesiones
session_start();

// Establecemos la hora de cancun
date_default_timezone_set('America/Cancun');

// Define el root del sitio "/"
define('PATH_ROOT', __DIR__);
// Requiere el archivo donde estan definidas las rutas y extensiones
require_once PATH_ROOT . '/includes/defines.php';

// Metodo Magico para cargar automaticamente cualquier clase php que se encuentre en la carpeta libraries
spl_autoload_register(function($class)
{
    if (file_exists(PATH_LIBRARIES . $class . CLASS_PHP))
    {
	    require PATH_LIBRARIES . $class . CLASS_PHP;
    }
});

// Optiene de la url que controlador y metodo se usara por default carga Index/index
$url = explode('/', (isset($_GET['url'])) ? $_GET['url'] : 'Index/index');

// Guarda en las variables las divisiones de la url
if (isset($url[0]))
	$controller = $url[0];

if (isset($url[1]) && $url[1] != '')
	$method = $url[1];

if (isset($url[2]) && $url[2] != '')
	$params = $url[2];

// Defines en un string el controlador a llamar '/libraries/core/controllers/{estocambia}_controller.php'
$path = PATH_CONTROLLERS . $controller . CONTROLLER_PHP . '.php';

// Verificas si existe el controlador en la carpeta /libraries/core/controllers
if(file_exists($path))
{
	// Como lo encontro requiere el archivo
	require_once $path;
	// Inicializa la clase
	$controller = new $controller();

	// Busca el metodo en la clase
	if (isset($method))
	{
		// Si existe la clase la llama
		if (method_exists($controller, $method))
		{
			// Si encuentra envio de parametros los manda al metodo
			if (isset($params))
				$controller->{$method}($params);
			
			// Si no solo require el metodo
			else
				$controller->{$method}();
		}
		// Si no existe dara error
		else
		{
			// Error
			echo 'Method doesn\'t exists';
		}
	}
	// Pone un metodo por default Index/index
	else
	{
		$controller->index();
	}
}
// Si no existe dara error
else
{
	// Error
	echo 'Controller doesn\'t exists';
}