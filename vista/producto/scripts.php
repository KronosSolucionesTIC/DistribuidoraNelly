<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaProducto').DataTable(
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

    //Funcion boton crear producto
	$("#btn_crear_producto").click(function(){
		$("#productoModalLabel").text("Crear producto");
		$("#btn_guardar_producto").attr("data-accion","crear");
		$("#form_producto")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar producto
	$("#btn_guardar_producto").click(function(){
		resultado = campos_incompletos('form_producto');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_producto();
			}
			if(accion == 'editar'){
				edita_producto();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_producto = $(this).attr('data-id-producto');
		$("#productoModalLabel").text("Editar producto");
		carga_producto(id_producto);
		$("#btn_guardar_producto").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar producto
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_producto = $(this).attr('data-id-producto');
		$("#btn_eliminar_producto").attr("data-id-producto",id_producto);
	});

	//Funcion eliminar producto
	$("[name*='btn_eliminar_producto']").click(function(){
		id_producto = $(this).attr('data-id-producto');
		elimina_producto(id_producto);
	});
</script>