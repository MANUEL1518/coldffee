<?php
function content_main(){
	$conexion = new mysqli("localhost", "root", "password", "coldffee");
	if ($conexion) {
		$query = $conexion->query("SELECT * FROM users");
		if($query){
			?>

<div id="cont_main_home">
	<table border="0">
		<tr>
			<th colspan="5">
				Archivos pasados
			</th>
		</tr>
		<tr>
			<td></td>
			<td>Nombres</td>
			<td>Extension</td>
			<td>Size</td>
			<td>Fecha de subida</td>
		</tr>
		<tr>
			<td>
				<form>
					<input type="checkbox" name="file_1">
				</form>
			</td>
			<td>Nombre</td>
			<td>png</td>
			<td>120.5MB</td>
			<td>2019-12-04</td>
		</tr>
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