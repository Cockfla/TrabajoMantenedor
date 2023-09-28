<!DOCTYPE html>
<html>
<head>
	<title>Mantenedor de Datos</title>
</head>
<body bgcolor="#52C953"><form method="post"><?php error_reporting(0); ?>
	<center><b><h1>Consultar Registros</h1></b>
		<?php
		if ($_POST['btnBuscar']=="Buscar") {
			include ("funciones.php");
			$cnn= Conectar();
			$rut=$_POST['txtrut'];
			$rs=mysqli_query($cnn,"SELECT * FROM CLIENTES  WHERE RUT='$rut'");
			if ($row=mysqli_fetch_array($rs)) {
				$nombre=$row[1];
				$apellido=$row[2];
				$fnac=$row[3];
				$sexo=$row[4];
				$region=$row[5];
				$fono=$row[6];
			}else{
				echo "<script>alert('No hay datos con el rut igresado.')</script>";
			}

		}
		?>
		<table border="1">
			<tr>
				<td>RUT</td>
				<td><input type="text" name="txtrut" value="<?php echo $rut; ?>"></td>
				<td><input type="submit" name="btnBuscar" value="Buscar"></td>
			</tr>
		</table>
		<br>
		<table border="1">
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="txtnom" value="<?php echo $nombre; ?>" size="30"disabled></td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td><input type="text" name="txtape" value="<?php echo $apellido; ?>" size="30"disabled></td>
			</tr>
			<tr>
				<td>Fecha de Nacimiento</td>
				<td><input type="text" name="txtfnac" value="<?php echo $fnac; ?>" size="30"disabled></td>

			</tr>
			<tr>
				<td>Sexo</td>
				<td><input type="text" name="txtsex" value="<?php echo $sexo; ?>" size="30"disabled></td>
			</tr>
			<tr>
				<td>Region</td>
				<td><input type="text" name="txtreg" value="<?php echo $region; ?>" size="30"disabled></td>
			</tr>
			<tr>
				<td>Fono</td>
				<td><input type="text" name="txtfono" value="<?php echo $fono; ?>" size="30"disabled></td>
			</tr>

		</table>
		<br><br><a href="buscar.php">Volver</a>
	
</form>
</body>
</html>