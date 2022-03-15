<?php
	
    include("../functions/conexion.php");


      if (isset($_POST['busqueda'])) {
        $consultaSQL = "SELECT * FROM clientes WHERE cliente LIKE '%" . $_POST['busqueda'] . "%' OR RFC LIKE '%" . $_POST['busqueda'] . "%'";
      } else {
        $consultaSQL = "SELECT * FROM clientes ORDER BY idcliente";
      }

      $sentencia = $conexion->prepare($consultaSQL);
      $sentencia->execute();

      $clientes = $sentencia->fetchAll();

	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>#</th>
							<th>RFC</th>
							<th>Cliente</th>
							<th>Direccion</th>
                                                        <th>Telefono</th>
                                                        <th>Correo Electronico</th>
							<th></th>
							<th></th>
						</tr>';



    if ($clientes && $sentencia->rowCount() > 0)
    {
    	$number = 1;
    	foreach ($clientes as $fila) {
    		$data .= '<tr>
				<td>'.$fila["idcliente"].'</td>
                                <td>'.$fila["rfc"].'</td>
				<td>'.$fila["cliente"].'</td>
				<td>'.$fila["direccion"].'</td>
                                <td>'.$fila["telefono"].'</td>
                                <td>'.$fila["correoelectronico"].'</td>
				<td>
					<button onclick="ObtenerCliente('.$fila['idcliente'].')" class="btn btn-warning"><i class="fas fa-edit">&nbsp;Editar</i></button>
				</td>
				<td>
					<button onclick="BorrarCliente('.$fila['idcliente'].')" class="btn btn-danger"><i class="far fa-trash-alt">&nbsp;Borrar</i></button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {

    	$data .= '<tr><td colspan="6">Sin Registros</td></tr>';
    }
    
    $data .= '</table>';
    

    echo $data;
?>