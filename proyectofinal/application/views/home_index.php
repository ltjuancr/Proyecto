<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="C:/xampp/htdocs/proyectofinal/application/views/style/index.css" media="screen" />
	<meta charset="utf-8">
	<title>Welcome to my blog</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
body
{
background-color:#d0e4fe;
}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	#id{
box-shadow: 10px 10px 5px #888888;
	}




	</style>
</head>
<body>

<div id="container" style="height: 800px;">
<center>
	<h1>Welcome to <?php  echo  $user->nombre_blog; ?></h1>
</center>
	<div id="body" style="float: left; height: 800px; ">
		<?php foreach ($post as $key => $entry) : ?>

			<div id="id">

			<h2><?php echo $entry['id_post'] ?> </h2>	
			<p>
				<a href="http://localhost/proyectofinal/index.php/Post/index/<?php echo $entry['id_post'] ?>">
<?php

// Mostramos solo los 11 primeros caracteres por ejemplo: "En un lugar"
$texto= substr($entry['post'], 0, 160);
echo $texto.'...'; 
?>		
</a> 
<h4 align="right"><?php echo $entry['fecha'] ?></h4>
			</p>
			</div>
		<?php endforeach; ?>
		
	</div>
	<div id="sidebar" style="float: right; border:1px solid #A4A4A4; width: 200px; height: 500px; ">
		<div>
			<center>
			<h1>Autor</h1>
			</center>
			<?php echo  $user->nombre.' '.$user->apellidos; ?>
			<br>
			<?php echo  $user->descripcion; ?>
			<br>
			<center>
			<a href="<?php echo  $user->red1; ?>">Facebook </a>
			<br>
			<a href="<?php echo  $user->red2; ?>"> Twitter </a>
			<br>

			<form  method="POST" name="formulario" action="<?php echo base_url();?>/index.php/login">
            <input name="submit" value="Ingresar" type="submit">
           </form>
         </center>
		</div>	
	</div>
</div>

</body>
</html>