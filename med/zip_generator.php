<?php
	$conexion = new mysqli("localhost", "root", "password", "coldffee");
	function createZip($zipname, $array_files)
	{
		global $conexion;
		$zip = new ZipArchive();
		if ($zip->open($zipname, ZIPARCHIVE::CREATE)===true)
		{
			foreach ($array_files as $file)
			{
				$query = $conexion->query("SELECT ext FROM files where new_filename = '".$file."'");
				while($arr = $query->fetch_array(MYSQLI_ASSOC)){
					$zip->addFile("files/".$file.".".$arr['ext']);
				}
			}
			$zip->close();
		}
	}

	if (!empty($_POST['files'])) {
		$files = $_POST['files'];
		$name = date("Y-m-i-s").".zip";
		createZip($name, $files);
		header("Content-type: application/octet-stream");
		header("Content-disposition: attachment; filename=".$name);
		readfile($name);
		unlink($name);
		if(file_exists($name)){
			header("Location: ../home.php");
		}else{
			echo "No Ok";
		}

	}else{
		echo "string";
	}
?>