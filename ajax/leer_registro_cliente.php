<?php

include("../functions/conexion.php");

if(isset($_POST['id']) && isset($_POST['id']) != "")
{

    $id_cliente = $_POST['id'];


    $consultaSQL = "SELECT * FROM clientes WHERE idcliente = '$id_cliente'";
    
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();

    $clientes = $sentencia->fetchAll();
    
    $response = array();
    if ($clientes && $sentencia->rowCount() > 0)
    {
        foreach ($clientes as $fila) {
            $response = $fila;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    
    
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

?>