<?php
defined('_EXEC') or die;
if(!isset($_GET['active']))
{
    header('Location: /index.php?active=inicio');
}
require_once 'admin/libraries/DataBase.class.php';
$database = new DataBase;
?>
<!DOCTYPE HTML>
<html>
	<head>
		 <title>Restaurante ¿No que No?</title>
		 <link rel="stylesheet"  type="text/css" href="css/stylesite.css"/>
		 <link rel="stylesheet" href="icons/ionicons-2.0.1/css/ionicons.min.css">
		 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,700,600' rel='stylesheet' type='text/css'>
		 <script type="text/javascript"  src="js/jquery-1.11.3.min.js"></script>
		 <script src="js/JavaScript.js"></script>
	</head>
    <body>
        <div class="header">
		<?php
		$logo = $database->select('images','*',[
					'type' => 'logo',
					'ORDER' => 'id DESC',
				]);
		?>
            <div class="container">
                <figure id="logo">
                    <a href="#top" class="smooth"><img src="/admin/images/<?php echo $logo[0]['name']; ?>"" alt="¿No que No?"></a>
                </figure>
                <nav>
                    <ul>
                        <li <?= (isset($_GET['active']) && $_GET['active'] == 'inicio')? 'class="active"' : ''; ?>>
                            <a href="index.php?active=inicio"><b>INICIO</b></a>
                        </li>
                        <li <?= (isset($_GET['active']) && $_GET['active'] == 'menu')? 'class="active"' : ''; ?>>
                            <a href="menu.php?active=menu"><b>MENÚ</b></a>
                        </li>
                        <li <?= (isset($_GET['active']) && $_GET['active'] == 'contacto')? 'class="active"' : ''; ?>>
                            <a href="contacto.php?active=contacto"><b>CONTACTO</b></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
