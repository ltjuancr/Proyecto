<html>
<head>
	<a href="<?php echo base_url();?>Login/logear">Cerrar sesion</a>

	<title>Administrativo</title>

	<style type="text/css">
body
{
background-color:#d0e4fe;
}


	</style>
</head>
<body BACKGROUND='http://www.people-up.com/userfiles/palabras-clave-imagenes/administracion-de-recursos-humanos.jpg'>
	<center>
	       <form  method="POST" name="formulario" action="<?php echo base_url();?>/index.php/EdicionCuenta">
            <input name="submit" value="Editar Cuenta" type="submit"  >
           </form>

           <form  method="POST" name="formulario" action="<?php echo base_url();?>/index.php/EdicionPost">
            <input name="submit" value="Editar Post" type="submit">
           </form>
</center>



</body>
</html>