<?php
	if (!empty($_POST['files']) && isset($_GET['id_user'])) {
		foreach ($_POST['files'] as $file) {
			include("datos_serv.php");
			$query = mysqli_query($conexion, "SELECT new_filename, ext FROM files WHERE id_user = '".$_GET['id_user']."' AND new_filename = '".$file."'");
			$arr = mysqli_fetch_array($query);
			$borrar = unlink("files/".$file.".".$arr['ext']);
			if ($borrar) {
				$query = mysqli_query($conexion, "DELETE FROM files WHERE new_filename = '".$file."' AND id_user = '".$_GET['id_user']."'");
				if ($query) {
					header("Location: ../home.php");
				}else{
					echo "Ups!!!. Parece que ha ocurrido un problema";
				}
			}
		}
	}
?>