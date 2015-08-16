<?php
if(isset($_POST['txtEmail'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "irvingmar93@gmail.com";
$email_subject = "Contacto Restaurante";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['txtName']) ||
!isset($_POST['txtlastName']) ||
!isset($_POST['txtEmail']) ||
!isset($_POST['txtComments']))
{
	echo $_POST['txtName']."<br>";
    echo $_POST['txtlastName']."<br>";  	
	echo $_POST['txtEmail']."<br>";
	echo $_POST['txtComments']."<br>";

	echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
	echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
	die();
}

$email_message = "Detalles del formulario :\n\n";
$email_message .= "Nombre: " . $_POST['txtName'] . "\n";
$email_message .= "Apellido: " . $_POST['txtlastName'] . "\n";
$email_message .= "Email: " . $_POST['txtEmail'] . "\n";
$email_message .= "Comentarios: " . $_POST['txtComments'] . "\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'To: '.$email_to."\r\n".
'Reply-To: '.$email_to."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

$aviso = "Su mensaje fue enviado correctamente";
			echo "<script type=''text/javascript'>
	alert('Mensaje enviado, nos pondremos en contacto con usted');
	window.location='contacto.php?active=contacto';
</script>";
}

?>
