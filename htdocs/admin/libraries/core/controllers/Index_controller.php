<?php
defined('_EXEC') or die;

class Index extends Controller
{
	function __construct()
	{
		// Heredas el constructor del padre
		parent::__construct();
	}

	// Aqui iran todos los metodos
	
	// Index es metodo por default
	public function index()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			header('Location: /admin/Employees/views');
		}
		else
		{
			header('Location: /admin/User/login');
		}
	}

}