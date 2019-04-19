<?php
	///////////////////////////////////////
	// Soy usado para confirmar register //
    ///////////////////////////////////////
	//                                   //
	// uso conexion.php para grabar datos//
	// y posteriormente guardarlos y     //
	// enviarlos en un correo electronico//
	// de confirmacion para despues      //
	// validarlos con verify.php         //
	//                                   //
	///////////////////////////////////////
session_start();
	$username = $_POST['username'];
	$var = ""; 

	$email = $_POST['email'];
	$pass_1 = $_POST['pass'];
	$pass_2 = $_POST['pass_1'];

	//condicionales de aceptación

	//validar nombre
	$num_palabras = str_word_count($username, 0);

	if ($num_palabras < 2) {
		$_SESSION["error_name"] = "error";
		$var .= $_SESSION["error_name"];
	}

	//validar email
	if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$_SESSION['error_email'] = "error";
    	$var .= $_SESSION['error_email'];
	}

	//validar ambas passwords
	if ($pass_1 != $pass_2) {
		$_SESSION['error_p'] = "error";
		$var .= $_SESSION['error_p'];
	}else{
		//validar largo de password
		if(strlen($pass_1) < 8){
			$_SESSION['error_plen'] = "error";
			$var .= $_SESSION['error_plen'];
		}
	}

if (strlen($var) > 0) {
	//si hay errores entonces volver a register.php y marcar los errores
	header("location: register.php");
}else{
	//si no hay ningun error
	session_destroy();
	//usar conexion.php para registrar datos correctos en base de datos
	include("med/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Coldffee Drive - Confirm</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
	<div id="cont" style="height: 100%;">
		<section id="main" style="width: 700px; margin-top: 120px;">
			<center><h1>The Data Has Been Correctly Recorded</h1></center>
			<p>Cool!!! <b><?php echo $firts_name;?></b> your data has already been registered.</p><br>
			<p>We sent a confirmation email to <b><?php echo $_POST["email"];?>.</b> check your email to confirm your registration. <br><br> Tank You :)</p><br>
			<p>
				<b>Warning:</b> perhaps due to the messaging system, the confirmation email remains in the <b>*Spam*</b> tray in your Email. <b>remember to review.</b>
			</p><br>
			<a href="index.php"><button>Back to Home</button></a>
		</section>
</body>
</html>
<?php
	}
?>