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
Correo: <input type="text" name="correo">
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
echo $_POST['nombre'];
echo $_POST['apellido'];
echo $_POST['correo'];
echo $_POST['telefono'];
echo $_POST['cedula'];
};
?>

<b> <?php hola(); ?> </b>

</form>
</center>
</BODY>
</HTM>