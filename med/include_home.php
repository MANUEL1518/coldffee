<?php
include("datos_serv.php");
$files = mysqli_query($conexion,"SELECT * FROM files WHERE id_user = '".$id_user."'");
$num_files = $files->num_rows;


function formatSizeUnits($bytes) // Redimencionar peso
    { 
        if ($bytes >= 1073741824) 
        { 
            $bytes = number_format($bytes / 1073741824, 2) . ' GB'; 
        } 
        elseif ($bytes >= 1048576) 
        { 
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } 
        elseif ($bytes >= 1024) 
        { 
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } 
        elseif ($bytes > 1) 
        { 
            $bytes = $bytes . ' bytes'; 
        } 
        elseif ($bytes == 1) 
        { 
            $bytes = $bytes . ' byte'; 
        } 
        else 
        { 
            $bytes = '0 bytes'; 
        } 

        return $bytes; 
}
function total_size(){
	global $id_user;
	include("datos_serv.php");
	$query = mysqli_query($conexion, "SELECT new_filename,ext FROM files WHERE id_user = '".$id_user."'");
	$size = 0;
	while ($file = mysqli_fetch_array($query)) {
		$fichero = "med/files/".$file['new_filename'].".".$file['ext'];
		$size = filesize($fichero) + $size;
	}
	echo formatSizeUnits($size);
}
function generadorRandom($length) {
	$dia = date("YmdGis");
	$car = $dia; 
    return substr(str_shuffle($car), 0, $length); 
}
function uploaded_file($filename, $ext, $size){
	global $id_user; // id_user

	$ruta = str_replace("/coldffee/home.php", "", $_SERVER["REQUEST_URI"]); // Ruta actual
	$ruta .= str_replace("#", "", $ruta);
	
	//Nuevo nombre para el archivo basado en fecha
	$new_name = date("YmdGis");
	$new_name = generadorRandom(12)."_".$new_name."_".generadorRandom(12);

	//Sube archivo
	$subir = move_uploaded_file($_FILES['archivo']['tmp_name'], "med/files/".$new_name.".".$ext);
	if ($subir) {
		include("datos_serv.php");

		$filename = str_replace("'", "", $_FILES['archivo']['name']);
		$filename = str_replace('"', "", $filename);
		$info = pathinfo($filename);
		$name =  basename($filename,'.'.$info['extension']);

		$dia = date("Y/m/d");
		$query = mysqli_query($conexion, "INSERT INTO files VALUES('".$id_user."','".$name."','".$ext."','".$size."','".$new_name."','".$dia."','/')");
		if ($query) {
			header("Location: home.php");
		}else{
			echo "No Ok";
		}
	}
}

// Si se recibe archivo *idiotas*
if (isset($_FILES['archivo']) && isset($id_user)) {
	$name = $_FILES['archivo']['name']; // filename
	//Extension File
	$info = new SplFileInfo($name);
	$ext = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
	// Peso
	$size = formatSizeUnits($_FILES['archivo']['size']); // filesize
	// Sube
	$subir = uploaded_file($_FILES['archivo']['tmp_name'], $ext, $size);
}

function content_main(){
	$conexion = new mysqli("localhost", "root", "password", "coldffee");
	if ($conexion) {
		global $id_user;
		$query = $conexion->query("SELECT * FROM users");
		$files = $conexion->query("SELECT * FROM files WHERE id_user = '".$id_user."'");
		$condicion = $files->num_rows;
		if($query){
			?>

<div id="cont_main_home">
	<table border="0">
		<form action="med/delete_files.php?id_user=<?php echo $id_user; ?>" method="post" id="checkboxs_files">
		<tr>
			<td>
				<input type="checkbox" onclick="check_avery_files();" id="every_files">
			</td>
			<td colspan="4">
				<div id="btn_icon_event" title="Upload" onclick="uploaded_file();">
					<div class="icon_upload"></div>
				</div>
				<div id="btn_icon_event" title="Download" onclick="download_in_zip();">
					<div class="icon_download"></div>
				</div>
				<div id="btn_icon_event" title="Delete" onclick="delete_files();">
					<div class="icon_delete"></div>
				</div>
			</td>
		</tr>
		<?php
			if ($condicion > 0) {
		?>
		<tr class="tr_title">
			<td></td>
			<td>Name</td>
			<td>Extension</td>
			<td>Size</td>
			<td>Date Uploaded</td>
		</tr>
		<?php
			$x = 0;
			while ($file = $files->fetch_array(MYSQLI_ASSOC)) {
				?>
				<tr class="tr_file">
					<td>
						<input type="checkbox" name="files[]" value=<?php echo $file['new_filename']; ?>>
					</td>
					<td><?php echo $file['filename']; ?></td>
					<td><?php echo $file['ext']; ?></td>
					<td><?php echo $file['size']; ?></td>
					<td><?php echo $file['date_upload']; ?></td>
				</tr>
				<?php
				$x++;
			}
		?>
		<?php
			}else{
				echo "<tr><td colspan='5'><center><h2 style='padding: 20px 0px;'>No hay archivos subidos aun</h2></center></td></tr>";
			}
		?>
		</form>
	</table>
</div>

			<?php
		}else{
			echo "No Ok";
		}
	}else{
		echo "Problemas en la conexion";
	}
}
?>