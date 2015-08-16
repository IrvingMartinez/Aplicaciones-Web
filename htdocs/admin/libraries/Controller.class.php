<?php
defined('_EXEC') or die;

class Controller
{
	function __construct()
	{
		$this->view = new View;
		$this->loadModel();
	}
	
	function loadModel()
	{
		// Guardara en variable modelo Index_model
		$model = get_class($this) . MODEL_PHP;
		// Crea un string de la locacion del model '/libraries/core/models/{carga_modelo}.php'
		$path = PATH_MODELS . $model . '.php';
		
		// Checa si existe el archivo en la carpeta del modelo
		if (file_exists($path))
		{
			// Si existe lo va a requerir
			require $path;
			// Inicializa el modelo
			$this->model = new $model();
		}
	}
	
}