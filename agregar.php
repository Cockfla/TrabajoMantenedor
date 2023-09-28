<!DOCTYPE html>
<html>
<head>
<script language="javascript">
	function ValidaSoloNumeros(){
		if((event.keyCode<48)||(event.keyCode>57))
			event.returnValue= false;
	}
	function ValidaSoloLetras(){
		if((event.keyCode !=32)&&(event.keyCode<65)||
			(event.keyCode>90)&&(event.keyCode<97)||(event.keyCode>122))
			event.returnValue=false;
	}
var RelojID24 = null
var RelojEjecutandose24 = false
function DetenerReloj24 (){
if(RelojEjecutandose24)
clearTimeout(RelojID24)
RelojEjecutandose24 = false}
function MostrarHora24 () {
var ahora = new Date()
var horas = ahora.getHours()
var minutos = ahora.getMinutes()
var segundos = ahora.getSeconds()
var ValorHora
//establece las horas
if (horas < 10)
ValorHora = "0" + horas
else
ValorHora = "" + horas
//establece los minutos
if (minutos < 10)
ValorHora += ":0" + minutos
else
ValorHora += ":" + minutos
//establece los segundos
if (segundos < 10)
ValorHora += ":0" + segundos
else
ValorHora += ":" + segundos
document.reloj24.txtDigitos.value = ValorHora
//si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
//window.status = ValorHora
RelojID24 = setTimeout("MostrarHora24()",1000)
RelojEjecutandose24 = true
}
function IniciarReloj24 () {
DetenerReloj24()
MostrarHora24()
}
</script>
	<title></title>
</head>
<body  onLoad="IniciarReloj24()">
	<form name="reloj24">
		<input type="text" name="txtDigitos" value=" " size="7" style="background-color:#52C953">
		<?php
			date_default_timezone_set('America/Santiago');
			$vafecha=date('d-m-Y'); 
		?>
		<input type="text" name="txtFecha" value="<?php echo $vafecha ?> "size="10" style="background-color:#52C953">
	</form>
</body>
<body bgcolor="#52C953">
	<?php error_reporting(0); ?>
	<form method="post">
	<h1><center><b>Registro de Clientes</b></h1>
		<table border="0" align="center">
			<tr>
				<td>Rut</td>
				<td><input type="text" name="txtrutN" value="" size="10">
					- <input type="text" name="txtrutD" value="" size="3" ></td>
			</tr>
			<tr>
				<td>Nombres</td>
				<td><input type="text" name="txtnom" value="" size="10" onkeypress="ValidaSoloLetras()"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="txtapellidos" value="" size="10" onkeypress="ValidaSoloLetras()"></td>
			</tr>
			<tr>
				<td>Fecha de Nacimiento</td>
				<td><input type="date" name="txtfecha" value="" size="10"></td>
			</tr>
			<tr>
				<td>Sexo</td>
				<td><select name="selectSexo" size="1">
					<option value="Masculino"selected>Masculino</option>
					<option value="Femenino">Femenino</option></td>
			</tr>
			<tr>
				<td>Región</td>
				<td><select name="selectRegion" size="1">
					<option value="prederterminado" selected>Elija una Región</option>
					<option value="Ohiggins">O'Higgins</option>
					<option value="Metropolitana">Metropolitana</option>
					<option value="Maule">Maule</option>
				</td>
			</tr>
			<tr>
				<td>Fono</td>
				<td><input type="text" name="txtfono" value="" size="10" onkeypress="ValidaSoloNumeros()"></td>

			</tr>
		</table>
		<center><br><input type="submit" name="btnRegistrar" value="Registrar">
	</form>
	<?php
	if ($_POST['btnRegistrar']=="Registrar") {
		include("funciones.php");
		$cnn=Conectar();
		$rut=$_POST['txtrut'];
		$nom=$_POST['txtnom'];
		$ape=$_POST['txtapellidos'];
		$fnac=$_POST['txtfecha'];
		$sex=$_POST['selectSexo'];
		$reg=$_POST['selectRegion'];
		$fono=$_POST['txtfono'];

		$sql="insert into clientes values('$rut','$nom','$ape','$fnac','$sex','$reg','$fono')";
		//echo "$sql";
		mysqli_query($cnn,$sql);
		echo "<script>alert('Se ha grabado exitosamente')</script>";
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