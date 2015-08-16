<?php
defined('_EXEC') or die;

class Category extends Controller
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
		header('Location: /admin/Category/views');
	}
	public function views()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			// Abrimos un buffer
			ob_start();
			
			$this->view->render($this,'views');
			
			$data = ob_get_contents();
			
			$query = $this->model->select('categories','*',[
				'ORDER' => 'name ASC'
			]);
			
			$table = '';
			$modals = '';
			foreach($query as $list)
			{
				$modals .= 
					'<!-- Modal -->
					<div class="modal fade" id="' . $list['id'] . $list['name'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Eliminar Categoria</h4>
								</div>
								<div class="modal-body">
									¿Esta seguro de borrar al proveedor ' . $list['name'] . '?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<a href="/admin/Category/delete/' . $list['id'] . '" class="btn btn-danger">Eliminar</a>
								</div>
							</div>
						</div>
					</div>';
				$table .=
					'<tr>
						<td>'.$list['name'].'</td>
						<td width=250>
							<a class="btn btn-success" href="/admin/Category/edit/'.$list['id'].'">Actualizar</a>
							<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#' . $list['id'] . $list['name'] .																'">Eliminar</button>
						</td>
					</tr>';	
			
			}
		$replace = [
				'{modals}' => $modals,
				'{listCategory}' => $table
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location /User/login');
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
			header('Location /User/login');
		}	
	}
	
	public function registerCategory()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->model->insert('categories',[
				"name" => $_POST['name']
			]);
			header('Location: /admin/Category');
		}
		else
		{
			header('Location: /admin/Category/create');
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
			
			$query = $this->model->select('categories','*',[
				'id' => $id
			]);
			
			$replace = [
				'{id}' => $query[0]['id'],
				'{name}' => $query[0]['name']
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location: /admin/Category');
		}
	}
	
	public function update($id)
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->model->update('categories',[
				"name" => $_POST['name']

			],[
				'id' => $id
			]);
		}
		header('Location: /admin/Category');
	}
	
	public function delete($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			$this->model->delete('categories',[
				'id' => $id
			]);
		}
		header('Location: /admin/Category');
	}
		

}