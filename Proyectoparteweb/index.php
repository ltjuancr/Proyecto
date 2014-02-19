<HTM>
<HEAD>
<TITLE> Formulario</TITLE>
</HEAD>
<center>Bienvenido</center>

<BODY>
	<center>
		<p>Todos los campos son obligatorios</p>

<form  method="POST" name="formulario">
Nombre: <input type="text" name="nombre">
<br><br>
Apellido: <input type="text" name="apellido">
<br><br>
Correo: <input type="email" name="correo">
<br><br>
Telefono: <input type="text" name="telefono">
<br><br>
Cédula: <input type="text" name="cedula">
<br><br>
<input name="reset" value="Borrar datos" type="reset">

<input name="submit" value="Enviar datos" type="submit"  onclick='<?php hola(); ?>'>

<?php
function hola()
	{
		if (!empty($_POST['nombre'])&&!empty($_POST['apellido'])&&!empty($_POST['correo'])&&!empty($_POST['telefono'])&&!empty($_POST['cedula']))
		{
			echo $_POST['nombre'];
			echo $_POST['apellido'];
			echo $_POST['correo'];
			echo $_POST['telefono'];
			echo $_POST['cedula'];
		}else{ 
     				echo '<br>';
					echo 'Todos los campos son obligatorios';
					//date_default_timezone_set('UTC');
					$fecha = date("d").date("m").date("Y");
					echo $fecha;
     		}
	};
?>

<b> <?php hola(); ?> </b>

</form>
</center>
</BODY>
</HTM>