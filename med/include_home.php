<?php
function content_main(){
	$conexion = new mysqli("localhost", "root", "password", "coldffee");
	if ($conexion) {
		$query = $conexion->query("SELECT * FROM users");
		$files = $conexion->query("SELECT * FROM files WHERE id_user = '".$id_user."'");
		$condicion = $files->num_rows;
		if($query){
			?>

<div id="cont_main_home">
	<table border="0">
		<form>
		<tr>
			<td>
				<input type="checkbox">
			</td>
			<td colspan="4">
				<div id="btn_icon_event" title="Upload">
					<div class="icon_upload"></div>
				</div>
				<div id="btn_icon_event" title="Download">
					<div class="icon_download"></div>
				</div>
				<div id="btn_icon_event" title="Delete">
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
			<tr>
				<td>
					<input type="checkbox">
				</td>
				<td>Nombre</td>
				<td>png</td>
				<td>120.5MB</td>
				<td>2019-12-04</td>
			</tr>
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