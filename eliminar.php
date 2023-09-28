<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#52C953">
	<?php error_reporting(0); ?>
	<form method="post">
		<?php

	if ($_POST['btnVer']=="Buscar") {
		include("funciones.php");
		$cnn=Conectar();
		$rut=$_POST['txtrut'];
		$rs= mysqli_query($cnn,"select * from clientes where rut='$rut'");
			if ($row=mysqli_fetch_array($rs)) {
				$nombre=$row[1];
				$apellido=$row[2];

			}else{
				echo "<script>alert('No hay datos con ese RUT.')</script>";
			}
		
	}
	?>
	<h1><center><b>Eliminar Clientes</b></h1>
		<table border="0" align="center">
			<tr>
				<td align="center">Rut</td>
				<td><input type="text" name="txtrut" value="<?php echo $rut; ?>" size="20">
					<input type="submit" name="btnVer" value="Buscar"></td>
			</tr>
				</table>
				<br>				
				<table align="center">
			<tr>
				<td><input type="text" name="txtNombre" value="<?php echo $nombre; ?>" size="15" disabled></td>
			<td align="center"><input type="text" name="txtApellido" value="<?php echo $apellido; ?>" size="15" disabled></td>
			</tr>
			<tr>
				<td align="center">Nombre</td>
				<td align="center">Apellido</td>
			</tr>
			</table>
		
		<center><br><input type="submit" name="btnEliminar" value="Eliminar">
	</form>
	
	<?php
	if ($_POST['btnEliminar']=="Eliminar") {
		include("funciones.php");
		$cnn=Conectar();
		$rut=$_POST['txtrut'];

		$sql="delete from clientes where (rut='$rut')";
		//echo "$sql";
		mysqli_query($cnn,$sql);
		echo "<script>alert('Se ha eliminado el registro exitosamente')</script>";
	}
	?>



<br><br>
	<a href="index.php">Volver</a>
	<br>
<br><br>
<br>
Elías Bahamondes Contreras




</body>
</html>