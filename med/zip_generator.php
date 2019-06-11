<?php
	function createZip($zipname, $array_files)
	{
		$zip = new ZipArchive();
		if ($zip->open($zipname, ZIPARCHIVE::CREATE)===true)
		{
			foreach ($array_files as $file)
			{
				$zip->addFile($file);
			}
			$zip->close();
		}
	}

	if (isset($_GET['id_user']) && !empty($_POST['files'])) {
		$files = $_POST['files'];
		$name = date("Y-m-i").$_GET['id_user'].".zip";
		createZip($name, $files);
	}
?>