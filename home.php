<?php
session_start();
//ver si las variables de sesion estan vacias
if ($_SESSION['id_user'] != "" && $_SESSION['username'] != "" && $_SESSION['email'] != ""){
	$id_user = $_SESSION['id_user'];
	include("med/datos_serv.php");
	include("med/include_home.php");
	if ($conexion) {
		$peticion = mysqli_query($conexion, "SELECT * FROM users WHERE id = '".$id_user."'");
		if ($peticion) {
			while ($arr = mysqli_fetch_array($peticion)) {
				$foto_perfil = $arr['foto_perfil'];
			}
		}else{
			$foto_perfil = "med/icon_user";
		}
	}else{
		echo "Problemas al conectar";
	}
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$date_user = $_SESSION['date_user'];
	$date_user = substr($date_user, 0, 10);
	$date_new = substr($date_user, 0, 10);
	list($anio, $mes, $dia) = explode("-", $date_new);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Drive of <?php echo $username; ?> </title>
	<link rel="stylesheet" type="text/css" href="med/style_home.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
	<script src="med/home_script.js"></script>
</head>
<body>
	<!-- Aqui esta el lightbox de change_foto -->

	<div id="lightbox_change_fperfil" onClick="close_change_foto();">
		<div id="main_change">
			<div onClick="close_change_foto();" id="btn_changue_foto">✖</div>
			<center>
				<h1>Selecciona la imagen que usaras de perfil</h1><br><br>
			<form id="foto_perfil" action="med/change_foto.php?usr=<?php echo $id_user; ?>" method="post" enctype="multipart/form-data">
				<label id="file_form">
					<input type="file" name="archivo" id="input_foto" accept="image/png, image/jpeg" required>
					Selecciona un archivo
				</label>
			</center>	
			</form>
		</div>
	</div>

	<!-- Aqui esta el lightbox de change_foto -->

	<!-- Aqui esta el lightbox de subir archivos -->

	<div id="lightbox_uploaded_file" onClick="close_uploaded_file();">
	<div id="main_change">
		<div onClick="close_uploaded_file();" id="btn_changue_foto">✖</div>
		<center>
		<h1>Selecciona los archivos que deseas subir</h1><br><br>
		<form id="uploaded" action="#" method="post" enctype="multipart/form-data">
			<label id="file_form">
				<input type="file" name="archivo" id="input_files" required>
				Selecciona un archivo
			</label>
		</center>	
		</form>
	</div>
	</div>

	<!-- End lightbox de subir archivos -->

	<div id="setings">
		<div onClick="close_settings();" id="btn_pop_down_up">✖</div>
		<h1>Cuenta</h1>
		<h4><b>Nombre de usuario:</b><br> <?php echo $username; ?></h4>
		<h4><b>Email:</b><br> <?php echo $email ?></h4>
		<h4><b>Fecha Inicio:</b> <?php echo $date_user; ?></h4>
		<h2 style="border-bottom: 2px #000 solid; border-top: 2px #000 solid; padding: 10px 0px;">Setings</h2>
		<h4><p><a style="cursor: pointer;" onclick="change_foto();">Cambiar foto de perfil</a></p></h4>
		<h4><p><a href="recover.php">Cambiar contraseña</a></p></h4>
		<h4><p><a href="session_close.php">Cerrar sesion</a></p></h4>
	</div>
	<header>
		<span><h2>Coldffee Drive</h2></span>
		<span><a onClick="setings();"> <img src="med/engrane.png"> </a></span>
	</header>
	<div id="main">
		<div id="info">
			<img src=<?php echo $foto_perfil; ?>>
		</div>
		<div id="con">
			<span>
				<p>Archivos Subidos</p><br>
				<p><?php echo $num_files; ?></p>
			</span>
			<span>
				<p>Peso Total</p><br>
				<p><?php total_size(); ?></p>
			</span>
			<span>
				<p>Favoritos</p><br>
				<p>0</p>
			</span>
			<span>
				<p>Ocultos</p><br>
				<p>0</p>
			</span>
		</div>
		<div id="con_blue">
		</div>
	</div>
	<div id="content_main">
		<!-- Aqui va el sistema de archivos -->
		<?php content_main(); //Esto esta dentro de include_home.php ?>
	</div>
</body>
</html>
<?php	
}else{
	header("location: index.php");
}
?>