<?php
defined('_EXEC') or die;

class User extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		header('Location: /admin/User/login');
	}

	public function login()
	{
		if(isset($_SESSION) && empty($_SESSION))
		{
			$this->view->render($this,'login');
		}
		else
		{
			header('Location: /admin/Employees/views');
		}
	}
	
	public function loginAction()
	{
		if(isset($_SESSION) && empty($_SESSION))
		{
			if(isset($_POST) && !empty($_POST))
			{
				$username = $_POST['usuario'];
				$password = $_POST['contraseña'];

				if($username == 'admin')
				{
					// Usuario valido
					if($password == '123456')
					{
						// Password Valida
						// Crea la sesion para tener acceso
						$_SESSION['username'] = $username;
						header('Location: /admin/Employees/views');
					}
					else
					{
						// Password Invalida
						echo 'Password Invalida';
					}
				}
				else
				{
					// Usuario invalido
					echo 'Usuario invalido';
				}
			}
			else
			{
				header('Location: /admin/User/login');
			}
		}
		else
		{
			header('Location: /admin/Employees/views');
		}
	}
	
	public function logout()
	{
		@session_destroy();
		header('Location: /admin/User/login');
	}

}