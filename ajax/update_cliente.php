<?php

include("../functions/conexion.php");
include("../functions/funciones.php");


if(isset($_POST))
{
      
    
    $cliente = [
        "rfc"    => strtoupper($_POST['rfc']),
        "cliente"  => $_POST['cliente'],
        "direccion"     => $_POST['direccion'],
        "telefono"      => $_POST['telefono'],
        "correoelectronico"      => $_POST['correoelectronico']
      ];
    
    $idcliente = $_POST['idcliente'];
    

    if($idcliente>0)
    {
        
        
        $consultaSQL = "UPDATE clientes SET
            rfc = :rfc,
            cliente = :cliente,
            direccion = :direccion,
            telefono = :telefono,
            correoelectronico = :correoelectronico,
            fechaactualizacion = NOW()
            WHERE idcliente = ".$idcliente;
    }
    else
    {
        
            
        $consultaSQL = "INSERT INTO clientes (rfc, cliente, direccion, telefono, correoelectronico, fechaalta, fechaactualizacion) 
                        VALUES(:rfc, :cliente, :direccion, :telefono, :correoelectronico, Now(), Now())";
    }
    
    
    $consulta = $conexion->prepare($consultaSQL);
    $consulta->execute($cliente);
}

?>