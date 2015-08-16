<?php
defined('_EXEC') or die;

class Employees extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		header('Location: /admin/Employees/views');
	}

	public function views()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			// Abrimos un buffer
			ob_start();
			
			$this->view->render($this,'views');
			
			$data = ob_get_contents();
			
			$query = $this->model->select('employees','*',[
				'ORDER' => 'name ASC'
			]);
			
			$table = '';
			$modals = '';
			foreach($query as $list)
			{
				$modals .= 
					'<!-- Modal -->
					<div class="modal fade" id="' . $list['id'] . $list['name'] . $list['lastname'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Eliminar Empleado</h4>
								</div>
								<div class="modal-body">
									¿Esta seguro de borrar el usuario ' . $list['name'] . ' ' . $list['lastname'] . '?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<a href="/admin/Employees/delete/' . $list['id'] . '" class="btn btn-danger">Eliminar</a>
								</div>
							</div>
						</div>
					</div>';
				$table .=
					'<tr>
						<td>'.$list['name'].'</td>
						<td>'.$list['lastname'].'</td>
						<td>'.$list['address'].'</td>
						<td>'.$list['phone'].'</td>
						<td>'.$list['type'].'</td>
						<td width=250>
							<a class="btn btn-success" href="/admin/Employees/edit/'.$list['id'].'">Actualizar</a>
							<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#' . $list['id'] . $list['name'] . $list['lastname'] .'">Eliminar</button>
						</td>
					</tr>';
			}
			
			$replace = [
				'{modals}' => $modals,
				'{listEmployees}' => $table
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location: /admin/User/login');
		}
	}
	
	public function create()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			$this->view->render($this,'create');
		}
		else
		{
			header('Location: /admin/User/login');
		}	
	}
	
	public function registerEmployee()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->model->insert('employees',[
				"name" => $_POST['name'],
				"lastname" => $_POST['lastname'],
				"address" => $_POST['address'],
				"phone" => $_POST['phone'],
				"type" => $_POST['type']
			]);
			header('Location: /admin/Employees');
		}
		else
		{
			header('Location: /admin/Employees/create');
		}
	}
	
	public function edit($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			// Abrimos un buffer
			ob_start();
			
			$this->view->render($this,'edit');
			
			$data = ob_get_contents();
			
			$query = $this->model->select('employees','*',[
				'id' => $id
			]);
			
			$listType = '<option value="Cocinero" '. (($query[0]['type'] == 'Cocinero')? 'selected':'') .'>Cocinero</option>
						<option value="Cajero" '. (($query[0]['type'] == 'Cajero')? 'selected':'') .'>Cajero</option>
						<option value="Mesero" '. (($query[0]['type'] == 'Mesero')? 'selected':'') .'>Mesero</option>
						<option value="Limpieza" '. (($query[0]['type'] == 'Limpieza')? 'selected':'') .'>Limpieza</option>';
			
			$replace = [
				'{id}' => $query[0]['id'],
				'{name}' => $query[0]['name'],
				'{lastname}' => $query[0]['lastname'],
				'{address}' => $query[0]['address'],
				'{phone}' => $query[0]['phone'],
				'{listType}' => $listType
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location: /admin/Employees');
		}
	}
	
	public function update($id)
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->model->update('employees',[
				"name" => $_POST['name'],
				"lastname" => $_POST['lastname'],
				"address" => $_POST['address'],
				"phone" => $_POST['phone'],
				"type" => $_POST['type']
			],[
				'id' => $id
			]);
		}
		header('Location: /admin/Employees');
	}
	
	public function delete($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			$this->model->delete('employees',[
				'id' => $id
			]);
		}
		header('Location: /admin/Employees');
	}

}