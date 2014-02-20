<HTM>
<HEAD>
<TITLE> Formulario</TITLE>
</HEAD>
<center>Bienvenido</center>

<BODY>
	<center>
		<p>Todos los campos son obligatorios</p>

<form  method="POST" name="formulario" action="index.php">
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

<input name="submit" value="Enviar" type="submit">

<?php

		if (!empty($_POST['nombre'])&&!empty($_POST['apellido'])&&!empty($_POST['correo'])&&!empty($_POST['telefono'])&&!empty($_POST['cedula']))
		{			 
			 hola();
			         echo '<br>';
					echo '<h1> Sus datos han sido agregados <h1>'; 
		}else{ 
     				echo '<br>';
					echo 'Todos los campos son obligatorios';    		
	};


	function hola(){
	date_default_timezone_set("America/Costa_Rica");			
			$fecha = date("d").date("m").date("Y");
            $file = fopen($fecha.".csv","a");
	        fwrite($file,$_POST['nombre'].";".$_POST['apellido'].";".$_POST['correo'].";".$_POST['telefono'].";".$_POST['cedula']."\n");
	        fclose($file); 

	}

?>



</form>
</center>
</BODY>
</HTM>