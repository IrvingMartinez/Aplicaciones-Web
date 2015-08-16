<?php
defined('_EXEC') or die;

class Entries extends Controller
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
		header('Location: /admin/Entries/views');
	}
	public function views()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			ob_start();
			
			$this->view->render($this,'views');
			
			$data=ob_get_contents();
			
			// -----
			$query = $this->model->select('entries','*',[
				'ORDER' => 'id DESC'
			]);
			
			$table = '';
			$modals = '';
			foreach($query as $list)
			{
				$idRandom = rand(1,30).$list['id'];
				$modals .= 
					'<!-- Modal -->
					<div class="modal fade" id="' . $idRandom . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Eliminar Entrada</h4>
								</div>
								<div class="modal-body">
									¿Esta seguro de borrar la entrada?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<a href="/admin/Entries/delete/' . $list['id'] . '" class="btn btn-danger">Eliminar</a>
								</div>
							</div>
						</div>
					</div>';
                
                $query1 = $this->model->select('products','name',["id" => $list['id_product']]);
                $query2 = $this->model->select('providers','name',["id" => $list['id_provider']]);
                
				$table.=
					'<tr>
					<td>'.$list['quantity'].'</td>
					<td>'.$list['idate'].'</td>
					<td>'.$query1[0].'</td>
					<td>'.$query2[0].'</td>
					<td width=250>
						<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#'.$idRandom.'">Eliminar</button>
					</td>
					</tr>';
			}
			
			$replace = [
				'{listEntries}' => $table,
				'{modals}' => $modals
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
            
			ob_end_clean();
			echo $data;
		}
		else
		{
			header ('Location: /User/login');
		}
	}
	
	public function create()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			ob_start();
			
			$this->view->render($this, 'create');
	
			$data = ob_get_contents();
			
			//-----------------
			
			$queryProducts= $this->model->select('products', ["id","name"], ['ORDER' => 'name ASC']);
			$queryProvider= $this->model->select('providers', ["id","name"], ['ORDER' => 'name ASC']);
			
			$optionProduct='';
			$optionProvider='';
			
			foreach($queryProducts as $listProduct)
			{
				$optionProduct.= '<option value="'.$listProduct['id'].'">'.$listProduct['name'].'</option>';
			}
			foreach($queryProvider as $listProvider)
			{
				$optionProvider.= '<option value="'.$listProvider['id'].'">'.$listProvider['name'].'</option>';
			}
			
			$replace =[
				'{hour}' => date('Y-m-d'),
				'{products}'=> $optionProduct,
				'{providers}'=> $optionProvider
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			
			//-----------------
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location: /User/login');
		}
	}
	public function registerEntries()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->model->insert('entries',[
				"quantity" => $_POST['quantity'], 
				"idate" => $_POST['idate'], 
				"id_product" => $_POST['id_product'], 
				"id_provider" => $_POST['id_provider']
			]);
			header('Location: /admin/Entries');
		}
		else
		{
			header('Location: /admin/Entries/create');
		}
	}
	
	public function delete($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			$this->model->delete('entries',[
				'id' => $id
			]);
		}
		header('Location: /admin/Entries');
	}
	
}