<?php
date_default_timezone_set("America/Costa_Rica");      
$fecha = date("d").date("m").date("Y");

$ruta = "C:\\xampp\\htdocs\\Proyectoparteweb\\".$fecha.'.csv';

$json = $_SERVER['argv'][1];

$str_datos = file_get_contents($json);
$datos = json_decode($str_datos,true);

$ip= $datos["BD"]["ip"];
$user=$datos["BD"]["usuario"];
$clave=$datos["BD"]["contrasena"];
$emisor=$datos["correo"]["cuentaemisor"];
$clavee=$datos["correo"]["contrasena"];
$host=$datos["correo"]["servidor"];
$receptor=$datos["correo"]["cuentareceptor"];



//echo "\n";
$fila = "";
$celdas = "";
$cont=0;
$first_line = true;
$columns_name = array();
if (($gestor = fopen($ruta, "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) { //examina la línea que lee para tratar campos en formato CSV y devuelve una matriz que contiene el campo leído.
        

        $numero = count($datos);
        //echo "Fila $fila: \n";
        //$fila++;
        foreach ($datos as $row) {
            $fila .= "'".$row."'".",";

        }
        $fila = substr($fila, 0, -1);
         $cont=$cont+1;
        $conect = mysqli_connect($ip,$user,$clave,'proyecto')
        or die('No se pudo conectar: ' . mysqli_error());

        // Realizar una consulta MySQL
       // echo $celdas."\n";
        //echo $fila."\n";
        $centencia = 'INSERT INTO estudiantes (nombre,apellido,correo,telefono,cedula) VALUES ('.$fila.');';
        //echo $centencia."\n";

        $result = mysqli_query( $conect,$centencia) or die('Consulta fallida: ' . mysqli_error());
        // Cerrar la conexión
        mysqli_close($conect);
        //echo $centencia;
        $fila = "";

    }
    fclose($gestor); //Se cierra la conexión
    //echo "\n";

     include("class.phpmailer.php"); 
     include("class.smtp.php"); 
     $mail = new PHPMailer(); 
     $mail->IsSMTP(); 
     $mail->SMTPAuth = true; 
     $mail->SMTPSecure = "ssl"; 
     $mail->Host = $host; 
     $mail->Port = 465; 
     $mail->Username = $emisor; 
     $mail->Password = $clavee;



     $mail->From = $emisor; 
     $mail->FromName = "Server"; 
     $mail->Subject = "Request del dia"; 
     $mail->AltBody = "Este es un mensaje"; 
     $mail->MsgHTML("<b>Cantidad de Alumnos insertados  :".$cont."</b>"); 
     $mail->AddAttachment(""); 
     $mail->AddAttachment(""); 
     $mail->AddAddress($receptor, "juan quiros gonzalez"); 
     $mail->IsHTML(true); 

  if(!$mail->Send()) { 
 echo "Error: " . $mail->ErrorInfo; 
 } else { 
 echo "Mensaje enviado correctamente"; 
 }
}

?>