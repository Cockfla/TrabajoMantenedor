<!DOCTYPE html>
<html>
<head><title>Mantenedor de Clientes</title>
</head>
<body bgcolor="#52C953">
	<center>
	<form method="post">
		<?php error_reporting(0) ?>
		<h1><b>Consultar Todos</b></h1>
		<input type="submit" name="btnmostrar" value="Visualizar">
		<br><br>
		<?php     
			if ($_POST['btnmostrar']=="Visualizar") {
				include("funciones.php"); 
				$cnn=Conectar();
				$rs= mysqli_query($cnn,"SELECT * FROM ClIENTES");
				echo "<table align='center' border='2'>";
				echo"<tr>";
				echo"<td><b>RUT</td>";
				echo"<td><b>Nombres</td>";
				echo"<td><b>Apellidos</td>";
				echo"<td><b>FNAC</td>";
				echo"<td><b>Sexo</td>";
				echo"<td><b>Region</td>";
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

<br><br><a href="buscar.php">Volver</a>
		
	</form>
</body>
</html>