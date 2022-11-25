<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaVenta').DataTable(
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

    //Funcion boton crear venta
	$("#btn_crear_venta").click(function(){
		$("#ventaModalLabel").text("Crear venta");
		$("#btn_guardar_venta").attr("data-accion","crear");
		$("#form_venta")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar venta
	$("#btn_guardar_venta").click(function(){
		resultado = campos_incompletos('form_venta');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_venta();
			}
			if(accion == 'editar'){
				edita_venta();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_venta = $(this).attr('data-id-venta');
		$("#ventaModalLabel").text("Editar venta");
		carga_venta(id_venta);
		$("#btn_guardar_venta").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar venta
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_venta = $(this).attr('data-id-venta');
		$("#btn_eliminar_venta").attr("data-id-venta",id_venta);
	});

	//Funcion eliminar venta
	$("[name*='btn_eliminar_venta']").click(function(){
		id_venta = $(this).attr('data-id-venta');
		elimina_venta(id_venta);
	});
</script>