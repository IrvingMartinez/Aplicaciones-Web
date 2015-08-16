<?php
defined('_EXEC') or die;

class View
{
	function __construct()
	{
		// Inicializo la base de datos
		$this->database = new DataBase;
	}
	
	// Este metodo renderizara toda la vista
	function render($controller,$view)
	{
		// Cargas el head global
		require_once PATH_LAYOUTS . 'head.php';
		
		// Cargas la vista del metodo controlador
		$controller = get_class($controller);
		// '/layouts/{carpeta_del_controlador}/{vista}.php'
		require PATH_LAYOUTS . $controller . '/' . $view . '.php';
		
		// Cargas el footer global
		require_once PATH_LAYOUTS . 'footer.php';
	}
	
}