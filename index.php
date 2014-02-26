<?php
date_default_timezone_set("America/Costa_Rica");			
$fecha = date("d").date("m").date("Y");

$ruta = 'C:\xampp\htdocs\Proyectoparteweb'."&#92;".$fecha.'.csv';
echo $ruta;

echo "\n";
$fila = "";
$celdas = "";
$first_line = true;
$columns_name = array();
if (($gestor = fopen($ruta, "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) { //examina la línea que lee para tratar campos en formato CSV y devuelve una matriz que contiene el campo leído.
        
       // if($first_line){
          //  $columns_name = $datos;
          //  $first_line = false;
          //  foreach ($datos as $row) {
          //      $celdas .= "`".$row."`".",";
          //  }
            //$numero = strlen($celdas);
          //  $celdas = substr($celdas, 0, -1);
          //  echo $celdas;
          //  continue;
       // }

        $numero = count($datos);
        //echo "Fila $fila: \n";
        //$fila++;
        foreach ($datos as $row) {
            $fila .= "'".$row."'".",";

        }
        $fila = substr($fila, 0, -1);

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
}


?>