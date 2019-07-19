<?php
if (isset($_GET['code']) && isset($_GET['email'])) {
	$email = $_GET['email'];
	if (isset($_POST['nueva_contra']) && isset($_POST['nueva_contra1'])) {
		$nueva_contra = $_POST['nueva_contra'];
		$nueva_contra1 = $_POST['nueva_contra1'];
		if ($nueva_contra == $nueva_contra1) {
			$nueva_contra = password_hash($nueva_contra1, PASSWORD_DEFAULT);
			include("med/datos_serv.php");
			if ($conexion) {
				$busqueda = mysqli_query($conexion, "DELETE FROM recovery WHERE email = '".$email."';");
				if ($busqueda) {
					$cambio = mysqli_query($conexion, "UPDATE users SET password = '".$nueva_contra."' WHERE email = '".$email."';");
					if ($cambio) {
						echo "Ok";
						echo "<script>setTimeout(function(){window.location = 'index.php'}, 2000);</script>";
					}else{
						echo "No Ok";
					}
				}
			}else{
				echo "Problemas en la conexion";
			}
		}else{
			echo "contraseña incorrecta";
		}
	}else{
	$code = $_GET['code'];
	//verificar email
	include("med/datos_serv.php");
	if ($conexion) {
		$busqueda = mysqli_query($conexion, "SELECT * FROM recovery WHERE code = '".$code."' AND email = '".$email."'");
		if (mysqli_num_rows($busqueda) >= 1) {
			?>
<!DOCTYPE html>
<html>
<head>
	<title>Coldffee Drive - Recover Password</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
	<div id="cont">
	<div id="main" style="display: block; padding: 50px 20px 25px 20px; width: 700px;">
		<form action="#" method="post">
		<h1>Cambia tu contraseña :D</h1>
			<label for="nueva_contra">
				<p id="label_p">Nueva contraseña: </p>
				<p><input type="password" name="nueva_contra" autofocus></p>
			</label>
			<label for="nueva_contra1">
				<p id="label_p">Verifica contraseña: </p>
				<p><input type="password" name="nueva_contra1" autofocus></p>
			</label><br><br>
			<p>
				<input type="submit" value="Recuperar">
			</p><br>
			<center>ir al <a href="index.php"><b>Login</b></a></center>
		</form>
	</div>
	</div>
</body>
</html>
			<?php
		}else{
			echo "<h1>Este link no es valido o ya no se encuentra disponible</h1>";
			echo "<script>setTimeout(function(){window.location = 'index.php'}, 2000);</script>";
		}
	}else{
		echo "Hubo un problema";
	}
}
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Coldffee Drive - Recover Password</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<?php
function query(){
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		include("med/datos_serv.php");
		if ($conexion) {
			$query = "SELECT * FROM users WHERE email = '". $email ."';";
			$peticion = mysqli_query($conexion, $query);
			if (mysqli_num_rows($peticion) == 1) {
				//aleator generator
				$alpha = "jklm45AghiBCabDEFcdef123GHInopJKLMqrXYstPQRST678UVWuNOvwZ90xyz";
				$code = "";
				for($i=0; $i < 25; $i++){
				    $code .= $alpha[rand(0, strlen($alpha)-1)];
				}

				$recover_add = mysqli_query($conexion, "INSERT INTO recovery(code, email) VALUES('".$code."','".$email."');");
			if ($recover_add) {
				//Envia mensaje

				$pagina = "http://coldffee.000webhostapp.com/recover.php?code=".$code."&email=".$email;

				//Remitente
				$from = "manuelguapote515@gmail.com";

				//Destinatario
			    $to = $email;

			    //Asunto del mensaje
			    $subject = "Recovery Password Coldffee";

			    //Contenido del mensaje
			    $message = '
			        <!DOCTYPE html>
			        <html>
			        <head>
			        <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
			            <style type="text/css">
			                body{
			                    font-family: Arial;
			                    width: 100%;
			                    height: 500px;
			                }
			                .cont{
			                    width: 500px;
			                    margin: 0 auto;
			                    box-sizing: border-box;
			                    padding: 20px;
			                    color: #fff;
			                    border-radius: 5px;
			                    background: url("https://media.istockphoto.com/vectors/seamless-lettering-coffee-pattern-with-quotes-hand-drawn-vector-vector-id836477702?k=6&m=836477702&s=612x612&w=0&h=N81ezRXWMuVlCN5KoZbbi0YhA4rqUStb9jKYlgQ7AAM=");
			                }
			                .ever{
			                    padding: 20px 0px;
			                    box-sizing: border-box;
			                    background: rgba(0,0,0,0.5);
			                    width: 100%;
			                    height: 100%;
			                }
			                h1{
			                    text-shadow: 0px 0px 5px rgba(0,0,0,0.5);
			                    font-size: 25px;
			                }
			                button{
			                    transition: 0.5s;
			                    border: none;
			                    outline: none;
			                    padding: 10px 20px;
			                    background: rgb(81, 46, 18);
			                    color: #fcdb92;
			                    border-radius: 5px;
			                }
			                button:hover{
			                    transition: 0.5s;
			                    background: rgb(76, 41, 13);
			                }
			            </style>
			        </head>
			        <body>
			            <div class="cont">
			            <div class="ever">
			                <center>
			                    <h1>
			                    <img width="30px" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/whatsapp/116/party-popper_1f389.png" \>
			                        Gracias por registrarte!!!
			                        <img width="30px" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/whatsapp/116/party-popper_1f389.png" \>
			                    </h1>
			                    <p>
			                        <b>Hola!!!</b>. Se nos ha notificado que extraviaste tu contraseña de <b>Coldffee</b><br>
			                    </p>
			                    <p>
			                        Puedes cambiar tu contraseña si haces lo siguiente...<br>
			                        <b>Oprime el siguiente boton para cambiar tu contraseña:</b>
			                    </p>
			                    <a href="'.$pagina.'">
			                    <button>
			                        Cambiar contraseña
			                    </button>
			                    </a>
			                </center>
			            </div>
			            </div>
			        </body>
			        </html>
			    ';
			    //Complementos de mensaje
			    $headers = "From: Coldffee Drive. <manuelguapote515@gmail.com>";
			    $headers .= "\r\nReply-To: manuelguapote515@gmail.com";
			    $headers .= "\r\nX-Mailer: PHP/".phpversion();
			    $headers .= "MIME-Version: 1.0\r\n";
			    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			    //se manda mensaje
			    $enviar = mail($to,$subject,$message, $headers, "-f manuelguapote515@gmail.com");
			    //Condicional
			    if($enviar){
			    }else{
					echo "No se envio mensaje";
			    } //No se pueda enviar mensaje

		}else{//agregar recover a base de datos
			echo "Algo salio mal :c";
		}

				//End Message
				echo "
					<script type='text/javascript'>
						setTimeout(function(){ window.location = 'index.php'; }, 5000);
					</script>
					<center>
						<div id='recon'>✔</div><br>
						<h1>Se ha enviado la nueva contraseña a tu correo</h1></center>
						<style>form{display: none;}</style>";
			}else{
				echo "<div class='error'>No hay ningun usuario registrado con el correo: ".$email."</div>
				<style>form{display: block;}</style>";
			}
		}else{
			echo "Problemas al conectar con la base de datos";
		}
	}
}
?>
<body>
	<div id="cont">
	<div id="main" style="display: block; padding: 50px 20px 25px 20px; width: 700px;">
		<?php query(); ?>
		<form action="#" method="post">
		<h1>Asi que... ¿Has olvidado tu contraseña verdad?</h1>
			<label for="email">
				<p id="label_p">Email: </p>
				<p><input type="text" name="email"></p>
			</label><br><br>
			<p>
				<input type="submit" value="Recuperar">
			</p><br>
			<center>ir al <a href="index.php"><b>Login</b></a></center>
		</form>
	</div>
	</div>
</body>
</html>
<?php } ?>