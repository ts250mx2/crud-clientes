<?php

if(isset($_POST['idcliente']) && isset($_POST['idcliente']) != "")
{
    include("../functions/conexion.php");
    include("../functions/funciones.php");

    $idcliente = $_POST['idcliente'];

    
    $consultaSQL = "DELETE FROM clientes WHERE idcliente =" . $idcliente;
    
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();
}
?>