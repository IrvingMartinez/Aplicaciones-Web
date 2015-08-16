<?php
defined('_EXEC') or die;

class Products extends Controller
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
		header('Location: /admin/Products/views');
	}
	
	public function views()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			ob_start();
			
			$this->view->render($this,'views');
			
			$data =ob_get_contents();
			
			$query =$this->model->select('products','*',[
				'ORDER' => 'name ASC'
			]);
			
			$table ='';
			$modals ='';
			foreach($query as $list)
			{
				$modals .= 
					'<!-- Modal -->
					<div class="modal fade" id="' . $list['id'] . $list['name'] . $list['stock'] . $list['stck_min'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Eliminar Producto</h4>
								</div>
								<div class="modal-body">
									¿Esta seguro de borrar el producto ' . $list['name'] . '?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<a href="/admin/Products/delete/' . $list['id'] . $list['name'] . $list['stock'] . $list['stock_min'] . '" class="btn btn-danger">Eliminar</a>
								</div>
							</div>
						</div>
					</div>';
				$queryCategory = $this->model->select('categories', 'name', ['id' => $list['id_category']])[0];
				$table .=
					'<tr>
						<td>'.$list['name'].'</td>
						<td>'.$list['stock'].'</td>
						<td>'.$list['stock_min'].'</td>
						<td>'.$queryCategory.'</td>
						<td width=250>
							<a class="btn btn-success" href="/admin/Products/edit/'.$list['id'].'">Actualizar</a>
							<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#' . $list['id'] . $list['name'] . $list['stock'] . $list['stck_min'] .							'">Eliminar</button>
						</td>
					</tr>';	
			}
				
			
			$replace =[
				'{modals}' => $modals,
				'{listProducts}' => $table
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
			
			
		}
		else
		{
			header('Location: /User/login');
		}
		
	}
		public function create()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			// Abrimos un buffer
			ob_start();
			
			$this->view->render($this,'create');
			
			$data = ob_get_contents();
			
			$query = $this->model->select('categories','*');
			$categories='';
			foreach($query as $option)
			{
				$categories.='<option value="'.$option['id'].'">'.$option['name'].'</option>';
			}
			
			$replace = [
				'{categories}' => $categories
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
		public function registerProducts()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$this->model->insert('products',[
				"name" => $_POST['name'],
				"stock" => $_POST['stock'],
				"stock_min" => $_POST['stock_min'],
				"id_category" => $_POST['category']
			]);
			header('Location: /admin/Products');
		}
		else
		{
			header('Location: /admin/Products/create');
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
			
			$query = $this->model->select('products','*',[
				'id' => $id
			]);
			
			$categoryQuery= $this->model->select('categories','*');
			
			$categoryOption= '';
			foreach($categoryQuery as $option){
				
				$categoryOption.='<option value="'.$option['id'].'" '.(($query[0]['id_category']== $option['id'])?'selected':'').'>'.$option['name'].'</option>';
			
			}
			
			
			$replace = [
				'{id}' => $query[0]['id'],
				'{name}' => $query[0]['name'],
				'{stock}' => $query[0]['stock'],
				'{stock_min}' => $query[0]['stock_min'],
				'{categories}' =>$categoryOption
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location: /admin/Products');
		}
	}
	
	public function update($id)
	{
		if(isset($_POST) && !empty($_POST))
		   {
			   $this->model->update('products',[
				"name" => $_POST['name'],
				"stock" => $_POST['stock'],
				"stock_min" => $_POST['stock_min'],
				"id_category" => $_POST['category']

			],[
				'id' => $id
			]);
		   }
		   header('Location: /admin/Products');
	}
	
		public function delete($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			$this->model->delete('products',[
				'id' => $id
			]);
		}
		header('Location: /admin/Products');
	}

}