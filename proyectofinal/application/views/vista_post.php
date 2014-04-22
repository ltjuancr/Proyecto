<!DOCTYPE html>
<html lang="en">
<head>
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
	</style>
</head>
<body>
  <a href="<?php echo base_url();?>">Atras</a>


<div id="container" style="height: 800px;">
<center>
	<h1>Welcome to <?php  echo  $user->nombre_blog; ?></h1>
</center>
  <div id="sidebar" >
			<center>
			<h1>Autor</h1>	
			</center>		
		<?php echo  $user->nombre.' '.$user->apellidos; ?>
			<br>
		<?php echo  $user->descripcion; ?>
			<br>
			<a href="<?php echo  $user->red1; ?>">Facebook </a>
			<br>
			<a href="<?php echo  $user->red2; ?>"> Twitter </a>
			<br>

			<form  method="POST" name="formulario" action="<?php echo base_url();?>/index.php/login">
            <input name="submit" value="Ingresar" type="submit">
           </form>

		</div>	
<h1></h1>
	<div id="body" style="float: left; height: 800px; ">
		
			<div>	
			<p>
				<?php echo $post->post ?>
			</p>
      <form method="POST" name="formulario" action="<?php echo base_url();?>index.php/Post/insert/<?php echo $id;?>">
            Nombre: <input type="text" name="nombre" id="nombre">
            Comentario: <input type="text" name="comentario" id="comentario">

            <input name="submit" value="Commentar" type="submit">
            <br>
      </form>       
           	<div id="body" style="float: left; height: 800px; ">
		<?php foreach ($comentarios as $key => $entry) : ?>
			<div>
			
			
           <h4>Nombre: </h4>   <?php echo $entry['nombre'] ?>
          <h4>Comentario: </h4>   <?php echo $entry['comentario'] ?>

			</div>
		<?php endforeach; ?>
		
			</div>
			</div>

		
	</div>
		
</div>

</body>
</html>