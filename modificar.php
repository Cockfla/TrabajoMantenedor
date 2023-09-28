<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR</title>
</head>
<body bgcolor="#52C953"><form method="post">
	<?php error_reporting(0);?>
	<h1><center><b>Modificar Clientes</b></h1>
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
		<table border="0" align="center">
			<tr>
				<td>Rut</td>
				<td><input type="text" name="txtrut" value="<?php echo $rut;?>" size="10">
					<input type="submit" name="btnBuscar" value="Buscar">
				</td>
			</tr>
			<tr>
				<td>Nombres</td>
				<td><input type="text" name="txtnom" value="<?php echo $nombre;?>" size="10"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="txtapellidos" value="<?php echo $apellido;?>" size="10"></td>
			</tr>
			<tr>
				<td>Fecha de Nacimiento</td>
				<td><input type="date" name="txtfecha" value="<?php echo $fnac; ?>" size="10"></td>
			</tr>
			<tr>
				<td>Sexo</td>
				<td><select name="selectSexo" value="<?php echo $sexo;?>" size="1">
					<option value="M"selected>Masculino</option>
					<option value="F">Femenino</option></td>
			</tr>
			<tr>
				<td>Región</td>
				<td><select name="selectRegion" size="1" value="<?php echo $region;?>">
					<option value="Ohiggins">O'Higgins</option>
					<option value="Metropolitana">Metropolitana</option>
					<option value="Maule">Maule</option>
				</td>
			</tr>
			<tr>
				<td>Fono</td>
				<td><input type="text" name="txtfono" value="<?php echo $fono;?>" size="10"></td>

			</tr>
		</table>
				<center><br><input type="submit" name="btnModificar" value="Modificar">
		<?php 
			if ($_POST['btnModificar']=="Modificar") {
				include("funciones.php");
				$cnn=Conectar();
				$rut=$_POST['txtrut'];
				$nom=$_POST['txtnom'];
				$ape=$_POST['txtapellidos'];
				$fnac=$_POST['txtfecha'];
				$sex=$_POST['selectSexo'];
				$reg=$_POST['selectRegion'];
				$fono=$_POST['txtfono'];

				$sql="UPDATE CLIENTES SET nombres='$nom',apellidos='$ape',fnac='$fnac',sexo='$sex',region='$reg',fono='$fono' WHERE rut='$rut'";
				mysqli_query($cnn,$sql);
				echo "<script>alert('Se han modificado los datos.')</script>";
			}
		?>

	</form>
	<br><br>
	<a href="index.php">Volver</a>

	<br>
<br><br>
<br>
Elías Bahamondes Contreras

</body>
</html>