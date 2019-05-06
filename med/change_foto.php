<?php
if (isset($_FILES['archivo']) && isset($_GET['usr'])) {
	include("datos_serv.php");
	$usr = $_GET['usr'];
	$filename = $_FILES['archivo']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$temp_filename = $_FILES['archivo']['tmp_name'];
	if ($conexion) {

		//aleator generator
		$alpha = "0123456789";
		$code = "";
		for($i=0; $i < 10; $i++){
		    $code .= $alpha[rand(0, strlen($alpha)-1)];
		}

		//borra foto de perfil anterior
		$pet = mysqli_query($conexion, "SELECT * FROM users WHERE id = '".$usr."'");
		while($foto = mysqli_fetch_array($pet)){
			$fperfil = str_replace("med/", "", $foto['foto_perfil']);
			unlink($fperfil);
		}

		$move = move_uploaded_file($_FILES['archivo']['tmp_name'], "files/".$code.".".$ext);
		if($move){
			echo "Ok";
			$peticion = mysqli_query($conexion, "UPDATE users set foto_perfil = 'med/files/".$code.".".$ext."' WHERE id = '".$usr."'");
			if ($peticion) {
				//header("location: ../home.php");
			}else{
				echo "No Ok";
			}
			header("location: ../index.php");
		}else{
			echo "No se subio archivo";
		}
	}else{
		echo "Problemas con conexion";
	}
}else{
	header("location: ../home.php");
}
?>