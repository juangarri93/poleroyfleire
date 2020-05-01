<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Please enter your name';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address';
	}

	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Please enter your message';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = 'contacto@poleroyfleire.com.ar';
	$to = 'apolero@poleroyfleire.com.ar';  // please change this email id
	$subject = 'Nueva Informacion de Contacto Recibida!';

	$body = "Se ha recibido la siguiente informacion de contacto a traves de la pagina web:\n - Nombre: $name\n - E-Mail: $email\n - Mensaje: $message";

	$headers = "From: Pagina Polero y Fleire - Nuevo Contacto <contacto@poleroyfleire.com.ar>";



	$name2 = $_POST['name'];
	$message2 = $_POST['message'];
	$from2 = 'apolero@poleroyfleire.com.ar';
	$to2 = $_POST['email'];
	$subject2 = 'Informacion de Contacto Recibida!';

	$body2 = "$name, hemos recibido su correo! En breve nos pondremos en contacto con usted.\n \n \nInformacion Recibida:\n - Nombre: $name\n - E-Mail: $email\n - Mensaje: $message";

	$headers2 = "From: Polero y Fleire - Consultas <apolero@poleroyfleire.com.ar>";


	//send the email
	$result = '';
	//mail ($to3, $subject, $body, $headers) &&
	if ( mail ($to, $subject, $body, $headers) && mail ($to2, $subject2, $body2, $headers2)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Su correo se ha enviado con éxito! En breve nos pondremos en contacto con usted.';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Se ha producido un error al enviar el mensaje, por favor vuelva a intentar mas tarde o pongase en contacto con nosotros por telefono o Facebook';
	$result .= '</div>';

	echo $result;
