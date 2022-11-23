<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaMantenimiento').DataTable(
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

    //Funcion boton crear mantenimiento
	$("#btn_crear_mantenimiento").click(function(){
		$("#mantenimientoModalLabel").text("Crear mantenimiento");
		$("#btn_guardar_mantenimiento").attr("data-accion","crear");
		$("#form_mantenimiento")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar mantenimiento
	$("#btn_guardar_mantenimiento").click(function(){
		resultado = campos_incompletos('form_mantenimiento');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_mantenimiento();
			}
			if(accion == 'editar'){
				edita_mantenimiento();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_mantenimiento = $(this).attr('data-id-mantenimiento');
		$("#mantenimientoModalLabel").text("Editar mantenimiento");
		carga_mantenimiento(id_mantenimiento);
		$("#btn_guardar_mantenimiento").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar mantenimiento
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_mantenimiento = $(this).attr('data-id-mantenimiento');
		$("#btn_eliminar_mantenimiento").attr("data-id-mantenimiento",id_mantenimiento);
	});

	//Funcion eliminar mantenimiento
	$("[name*='btn_eliminar_mantenimiento']").click(function(){
		id_mantenimiento = $(this).attr('data-id-mantenimiento');
		elimina_mantenimiento(id_mantenimiento);
	});
</script>