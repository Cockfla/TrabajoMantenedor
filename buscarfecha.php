<!DOCTYPE html>
<html>
<head>
	<title>Mantenedor de Datos</title>
</head>
<body bgcolor="#52C953"><form method="post">
	<center><b><h1>Consultar por Fecha</h1></b>
		<?php error_reporting(0);?>
		<table border="1">
			<tr>
				<td>Seleccione la fecha inicial</td>
				<td><input type="date" name="txtfecha1">
			</tr>
			<tr>
				<td>Seleccione la fecha final</td>
				<td><input type="date" name="txtfecha2">
			</tr>
		</table>
		<br>
		<input type="submit" name="btnVer" value="Visualizar">
		<br><br>
		<?php     
			if ($_POST['btnVer']=="Visualizar") {
				include("funciones.php");
				$fnac1=$_POST['txtfecha1'];
				$fnac2=$_POST['txtfecha2'];
				$cnn=Conectar();
				$rs= mysqli_query($cnn,"SELECT * FROM ClIENTES WHERE fnac>='$fnac1' AND fnac<='$fnac2'");
				echo "<table align='center' border='2'>";
				echo"<tr>";
				echo"<td><b>RUT</td>";
				echo"<td><b>Nombres</td>";
				echo"<td><b>Apellidos</td>";
				echo"<td><b>FNAC</td>";
				echo"<td><b>Sexo</td>";
				echo"<td><b>Región</td>";
				echo"<td><b>Fono</td>";
				echo"</tr>";
				while($row=mysqli_fetch_array($rs)){

					echo"<tr>";
					echo "<td>$row[0]</td>";
					echo "<td>$row[1]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row[4]</td>";
					echo "<td>$row[5]</td>";
					echo "<td>$row[6]</td>";
					echo"</tr>";

				}

				echo "</table>";
			}

		 ?>


</form>
<br><br><a href="buscar.php">Volver</a>
</body>
</html>