<?php
	///////////////////////////////////////
	// Soy usado en register_confirm.php //
    ///////////////////////////////////////
	//                                   //
	// Sirvo para registrar al usuario   //
	// parcialmente en la base de datos  //
	// y envio mensaje de confirmacion   //
	// a correo electronico              //
	//                                   //
	///////////////////////////////////////
	include("med/datos_serv.php");

	//aleator generator
	$alpha = "jklm45AghiBCabDEFcdef123GHInopJKLMqrXYstPQRST678UVWuNOvwZ90xyz";
	$code = "";
	for($i=0; $i < 10; $i++){
	    $code .= $alpha[rand(0, strlen($alpha)-1)];
	}
	list($firts_name) = explode(" ", $username);

	//insertar datos
$conexion = mysqli_connect($host, $user, $pass, $db);
if ($conexion) {
	//se verifica si el usuario exciste
	$verify = mysqli_query($conexion, "select email from users WHERE email = '".$email."';");
	$se_repite = mysqli_num_rows($verify);
//condicional
if ($se_repite > 0) {
	$key = "close";
}else{
	$key = "open";
		//insertar los datos del usuario en *no verificado*
		$password_cifrado = password_hash($pass_1, PASSWORD_DEFAULT);
		$query = mysqli_query($conexion, "INSERT INTO no_verify(id_alfanum, username, email, password) VALUES('".$code."','".$username."','".$email."','".$password_cifrado."');");

		////////////////////////////////////////////
		//                                        //
		// Enviar mensaje a su correo electronico //
		//                                        //
		////////////////////////////////////////////
		if ($query) {
			//pagina a la cual se dirigira
			$pagina = "http://coldffee.000webhostapp.com/verify.php?id_alfa=".$code;

			//Remitente
			$from = "manuelguapote515@gmail.com";

			//Destinatario
		    $to = $email;

		    //Asunto del mensaje
		    $subject = "Confirmar cuenta en Coldffee Drive ya!!!";

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
		                    background: rgba(0,0,0,0.8);
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
		                        <b>Hola '.$firts_name.' !!!</b>. Te damos la bienvenida a <b>Coldffee</b><br>
		                        somos una empresa dedica al almacenamiento y proteccion<br>
		                        de tus archivos. Ya pudimos registrar tus datos. solo<br>
		                        quedaria confirmar. Tenemos una nube personalizada justo para ti.<br>
		                    </p>
		                    <p>
		                        Ahora solo queda confirmar tu cuenta...<br>
		                        <b>Oprime el siguiente boton para confirmar:</b>
		                    </p>
		                    <a href="'.$pagina.'">
		                    <button>
		                        Confirmar
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
		}else{
			echo "No se pudo realizar peticion"; //No realiza Query
		}
}//cierro condicional "si se repite correo electronico"
	}else{
		echo "problema al conectar base"; //No se puede conectar
	}
?>