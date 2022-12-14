<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaCliente').DataTable(
        	{
                "pagingType": "full_numbers",
                "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "Todos" ]],
                "language": {
                    "lengthMenu":     "Mostrando _MENU_ registros",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "search":         "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "zeroRecords": "No hay registros que coincidan.",
                    "infoEmpty": "No se encuentran registros.",
                    "infoFiltered":   "(Filtrando _MAX_ registros en total)",
                    "paginate": {
                        "first":      "<--",
                        "last":       "-->",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                },
                "order": []
            }
        );
    });

    //Funcion boton crear cliente
	$("#btn_crear_cliente").click(function(){
		$("#clienteModalLabel").text("Crear cliente");
		$("#btn_guardar_cliente").attr("data-accion","crear");
		$("#form_cliente")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar cliente
	$("#btn_guardar_cliente").click(function(){
		resultado = campos_incompletos('form_cliente');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_cliente();
			}
			if(accion == 'editar'){
				edita_cliente();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_cliente = $(this).attr('data-id-cliente');
		$("#clienteModalLabel").text("Editar cliente");
		carga_cliente(id_cliente);
		$("#btn_guardar_cliente").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar cliente
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_cliente = $(this).attr('data-id-cliente');
		$("#btn_eliminar_cliente").attr("data-id-cliente",id_cliente);
	});

	//Funcion eliminar cliente
	$("[name*='btn_eliminar_cliente']").click(function(){
		id_cliente = $(this).attr('data-id-cliente');
		elimina_cliente(id_cliente);
	});
</script>