/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function LeerRegistros() {
    $("#update_titulo").html('Actualizar Cliente');
    var busqueda = $("#busqueda").val();
    
    $.post("ajax/leer_registros.php", {
        busqueda: busqueda
    }, function (data, status) {
        $("#records_content").html(data);
    });
}


function BorrarCliente(idcliente) {
    var conf = confirm("¿Desea eliminar el registro?");
    if (conf == true) {
        $.post("ajax/borrar_cliente.php", {
                idcliente: idcliente
            },
            function (data, status) {
                // reload Users by using readRecords();
                LeerRegistros();
            }
        );
    }
}

function ObtenerCliente(id) {
    
    // Add User ID to the hidden field for furture usage
    $("#hidden_idcliente").val(id);

    if(id>0)
    {
        $("#update_titulo").html('Actualizar Cliente');
        
        $.post("ajax/leer_registro_cliente.php", {
                id: id
            },
            function (data, status) {
                // PARSE json data
                var cliente = JSON.parse(data);
                // Assing existing values to the modal popup fields
                $("#update_rfc").val(cliente.rfc);
                $("#update_cliente").val(cliente.cliente);
                $("#update_direccion").val(cliente.direccion);
                $("#update_telefono").val(cliente.telefono);
                $("#update_correoelectronico").val(cliente.correoelectronico);

            }
        );
    }
    else
    {
        $("#update_titulo").html('Nuevo Cliente');
        
        $("#update_rfc").val('');
        $("#update_cliente").val('');
        $("#update_direccion").val('');
        $("#update_telefono").val('');
        $("#update_correoelectronico").val('');
    }
    // Open modal popup
    $("#update_cliente_modal").modal("show");
}


function UpdateCliente() {
    
    
    var rfc = $("#update_rfc").val();
    var cliente = $("#update_cliente").val();
    var direccion = $("#update_direccion").val();
    var telefono = $("#update_telefono").val();
    var correoelectronico = $("#update_correoelectronico").val();

    var idcliente = $("#hidden_idcliente").val();

    
    $.post("ajax/update_cliente.php", {
            idcliente: idcliente,
            rfc: rfc,
            cliente: cliente,
            direccion: direccion,
            telefono: telefono,
            correoelectronico: correoelectronico
        },
        function (data, status) {

            $("#update_cliente_modal").modal("hide");

            LeerRegistros();
        }
    );
}
$(document).ready(function () {
    // READ recods on page load
    LeerRegistros(); // calling function
});

