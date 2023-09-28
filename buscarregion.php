<!DOCTYPE html>
<html>
<head>
	<title>Mantenedor de Datos</title>
</head>
<body bgcolor="#52C953"><form method="post">
	<?php error_reporting(0);?>
	<center><b><h1>Consultar por Región</h1></b>
		<table border="1">
			<tr>
				<td>Seleccione la Región</td>
				<td><select name="txtreg" size="1">
					<option value="Ohiggins">O'Higgins</option>
					<option value="Metropolitana">Metropolitana</option>
					<option value="Maule">Maule</option></select></td>
			</tr>
		</table>
		<br>
		<input type="submit" name="btnVer" value="Visualizar">
		<br><br>
		<?php     
			if ($_POST['btnVer']=="Visualizar") {
				include("funciones.php");
				$reg=$_POST['txtreg'];
				$cnn=Conectar();
				$rs= mysqli_query($cnn,"SELECT * FROM ClIENTES WHERE region= '$reg'");
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