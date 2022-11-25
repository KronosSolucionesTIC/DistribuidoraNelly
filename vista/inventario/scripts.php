<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaInventario').DataTable(
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

    //Funcion boton crear inventario
	$("#btn_crear_inventario").click(function(){
		$("#inventarioModalLabel").text("Crear inventario");
		$("#btn_guardar_inventario").attr("data-accion","crear");
		$("#form_inventario")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar inventario
	$("#btn_guardar_inventario").click(function(){
		resultado = campos_incompletos('form_inventario');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_inventario();
			}
			if(accion == 'editar'){
				edita_inventario();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_inventario = $(this).attr('data-id-inventario');
		$("#inventarioModalLabel").text("Editar inventario");
		carga_inventario(id_inventario);
		$("#btn_guardar_inventario").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar inventario
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_inventario = $(this).attr('data-id-inventario');
		$("#btn_eliminar_inventario").attr("data-id-inventario",id_inventario);
	});

	//Funcion eliminar inventario
	$("[name*='btn_eliminar_inventario']").click(function(){
		id_inventario = $(this).attr('data-id-inventario');
		elimina_inventario(id_inventario);
	});
</script>