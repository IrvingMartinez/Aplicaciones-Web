<?php
defined('_EXEC') or die;
// Define rutas
define('PATH_INCLUDES',		PATH_ROOT . '/includes/');
define('PATH_LIBRARIES',		PATH_ROOT . '/libraries/');
define('PATH_LAYOUTS',		PATH_ROOT . '/layouts/');

define('PATH_CORE',			PATH_LIBRARIES . 'core/');

define('PATH_CONTROLLERS',	PATH_CORE . 'controllers/');
define('PATH_MODELS',		PATH_CORE . 'models/');

// Define extensiones de archivos
define('CLASS_PHP', '.class.php');
define('CONTROLLER_PHP', '_controller');
define('MODEL_PHP', '_model');