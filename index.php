<?php
date_default_timezone_set("America/Costa_Rica");      
$fecha = date("d").date("m").date("Y");

$ruta = "C:\\xampp\\htdocs\\Proyectoparteweb\\".$fecha.'.csv';
echo $ruta;


echo "\n";
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
        $conect = mysql_connect('127.0.0.1', 'root', '')
        or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('proyecto') or die('No se pudo seleccionar la base de datos');

        // Realizar una consulta MySQL
        echo $celdas."\n";
        echo $fila."\n";
        $centencia = 'INSERT INTO estudiantes (nombre,apellido,correo,telefono,cedula) VALUES ('.$fila.');';
        echo $centencia."\n";

        $result = mysql_query($centencia) or die('Consulta fallida: ' . mysql_error());
        // Cerrar la conexión
        mysql_close($conect);
        //echo $centencia;
        $fila = "";

    }
    fclose($gestor); //Se cierra la conexión
    echo "\n";
    include("class.phpmailer.php"); 
 include("class.smtp.php"); 
 $mail = new PHPMailer(); 
 $mail->IsSMTP(); 
 $mail->SMTPAuth = true; 
 $mail->SMTPSecure = "ssl"; 
 $mail->Host = "smtp.gmail.com"; 
 $mail->Port = 465; 
 $mail->Username = "juanquirosgonzalez@gmail.com"; 
 $mail->Password = "juan1243";



  $mail->From = "juanquirosgonzalez@gmail.com"; 
 $mail->FromName = "Server"; 
 $mail->Subject = "Request del dia"; 
 $mail->AltBody = "Este es un mensaje."; 
 $mail->MsgHTML("<b>Cantidad de Alumnos insertados  :".$cont."</b>."); 
 $mail->AddAttachment("files/files.zip"); 
 $mail->AddAttachment("files/img03.jpg"); 
 $mail->AddAddress("juan_gonzalez93@hotmail.com", "juan quiros gonzalez"); 
 $mail->IsHTML(true); 
  if(!$mail->Send()) { 
 echo "Error: " . $mail->ErrorInfo; 
 } else { 
 echo "Mensaje enviado correctamente"; 
 }
}


?>