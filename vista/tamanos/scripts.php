<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaTamano_equipos').DataTable(
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

    //Funcion boton crear tamano_equipos
	$("#btn_crear_tamano_equipos").click(function(){
		$("#tamano_equiposModalLabel").text("Crear tamaño");
		$("#btn_guardar_tamano_equipos").attr("data-accion","crear");
		$("#form_tamano_equipos")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar tamano_equipos
	$("#btn_guardar_tamano_equipos").click(function(){
		resultado = campos_incompletos('form_tamano_equipos');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_tamano_equipos();
			}
			if(accion == 'editar'){
				edita_tamano_equipos();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_tamano_equipos = $(this).attr('data-id-tamano_equipos');
		$("#tamano_equiposModalLabel").text("Editar tamaño");
		carga_tamano_equipos(id_tamano_equipos);
		$("#btn_guardar_tamano_equipos").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar tamano_equipos
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_tamano_equipos = $(this).attr('data-id-tamano_equipos');
		$("#btn_eliminar_tamano_equipos").attr("data-id-tamano_equipos",id_tamano_equipos);
	});

	//Funcion eliminar tamano_equipos
	$("[name*='btn_eliminar_tamano_equipos']").click(function(){
		id_tamano_equipos = $(this).attr('data-id-tamano_equipos');
		elimina_tamano_equipos(id_tamano_equipos);
	});
</script>