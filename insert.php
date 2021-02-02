<?php

    require_once 'conexion.php';
    
    $recurrente= $_POST['exampleInputRecurrente'];
    $fecha = $_POST['exampleInputDate'];
    $tipoReclamo = $_POST['exampleInputTipoReclamo'];
    $nroDocumento = $_POST['exampleInputDocumento'];
    $reclamo = $_POST['exampleInputReclamo'];
     
    $sql="INSERT INTO tickets (Recurrente,Fecha,Tipo_Reclamo,Nro_Documento,Reclamo)
            VALUES ('$recurrente','$fecha','$tipoReclamo','$nroDocumento','$reclamo')";
    echo "Updated records: "+ mysqli_affected_rows($conex);
    echo $resultado= mysqli_query($conex, $sql);
   
?>