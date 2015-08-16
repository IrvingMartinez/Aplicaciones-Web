<?php
defined('_EXEC') or die;

class Image extends Controller
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
			header('Location: /admin/Image/view');
		}
		else
		{
			header('Location: /admin/User/login');
		}
	}
	public function view()
	{
	if(isset($_SESSION) && !empty($_SESSION))
		{
		ob_start();
			
			$this->view->render($this,'Image');
			
			$data = ob_get_contents();
			
			$query = $this->model->select('images','*',[
				'ORDER' => 'type ASC'
			]);
			
			$table = '';
			foreach($query as $list)
			{
				$table .=
					'<tr>
					<td><img src="/images/'.$list['name'].'" width="300"/></td>
					<td>'.$list['type'].'</td>
					<td><a class="btn btn-success" href="/admin/Image/edit/'.$list['id'].'">Actualizar</a>
					<td><a href="/admin/Image/delete/' . $list['id'] . '" class="btn btn-danger">Eliminar</a></td>
					</<tr>';
			}
			
			$replace = [
				'{tableImages}' => $table
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
	public function upload()
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			if(isset($_POST) && isset($_FILES) && !empty($_POST) && !empty($_FILES))
			{
				$inputName = 'imagen';
				$path = '../images';
				$ext = ['jpg','jpeg','png'];
				$size = 9999999999999;

				$upload = new Upload;
				$upload->SetFileName($_FILES[$inputName]['name']);
				$upload->SetTempName($_FILES[$inputName]['tmp_name']);
				$upload->SetFileType($_FILES[$inputName]['type']);
				$upload->SetFileSize($_FILES[$inputName]['size']);
				$upload->SetUploadDirectory($path);
				$upload->SetValidExtensions($ext);
				$upload->SetMaximumFileSize($size);
				
				$result = $upload->UploadFile();
				
				if($result['type'] == 'error')
				{
				echo '<script type="text/javascript">alert("'. $result['message'] .'")</script>';
				}
				else 
				{
				$this->model->insert('images', [
					'type' => $_POST['type'],
					'name' => $result['message']
					
				]);
				
				echo '<script type="text/javascript">alert("Imagen: '. $result['message'] .' subida.");window.location="/admin/Image";</script>';
				}
			}
			
			
			$this->view->render($this,'upload');
		}
		else
		{
			header('Location: /admin/User/login');
		}	
	}
	public function edit($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
		if(isset($_POST) && isset($_FILES) && !empty($_POST) && !empty($_FILES))
			{
				$inputName = 'imagen';
				$path = '../images';
				$ext = ['jpg','jpeg','png'];
				$size = 9999999999999;

				$upload = new Upload;
				$upload->SetFileName($_FILES[$inputName]['name']);
				$upload->SetTempName($_FILES[$inputName]['tmp_name']);
				$upload->SetFileType($_FILES[$inputName]['type']);
				$upload->SetFileSize($_FILES[$inputName]['size']);
				$upload->SetUploadDirectory($path);
				$upload->SetValidExtensions($ext);
				$upload->SetMaximumFileSize($size);
				
				$result = $upload->UploadFile();
				
				if($result['type'] == 'error')
				{
				echo '<script type="text/javascript">alert("'. $result['message'] .'")</script>';
				}
				else 
				{
				$this->model->update('images', [
					'name' => $result['message']
				],[
				'id' => $_POST['id']
				]);
				
				echo '<script type="text/javascript">alert("Imagen: '. $result['message'] .' actualizada.");window.location="/admin/Image";</script>';
				}
			}
			// Abrimos un buffer
			ob_start();
			
			$this->view->render($this,'edit');
			
			$data = ob_get_contents();
			
			$query = $this->model->select('images','*',[
				'id' => $id
			]);
		
			
			$replace = [
				'{image}' => $query [0]['name'],
				'{id}' => $query [0]['id']
			];
			
			$data = str_replace(array_keys($replace), array_values($replace), $data);
			
			ob_end_clean();
			echo $data;
		}
		else
		{
			header('Location: /admin/Image');
		}
	}
		public function delete($id)
	{
		if(isset($_SESSION) && !empty($_SESSION))
		{
			$this->model->delete('images',[
				'id' => $id
			]);
		}
		header('Location: /admin/Image');
	}
	
	
}