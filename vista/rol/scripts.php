<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaRol').DataTable(
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

    //Funcion boton crear rol
	$("#btn_crear_rol").click(function(){
		$("#rolModalLabel").text("Crear rol");
		$("#btn_guardar_rol").attr("data-accion","crear");
		$("#form_rol")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar rol
	$("#btn_guardar_rol").click(function(){
		resultado = campos_incompletos('form_rol');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_rol();
			}
			if(accion == 'editar'){
				edita_rol();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_rol = $(this).attr('data-id-rol');
		$("#rolModalLabel").text("Editar rol");
		carga_rol(id_rol);
		$("#btn_guardar_rol").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar rol
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_rol = $(this).attr('data-id-rol');
		$("#btn_eliminar_rol").attr("data-id-rol",id_rol);
	});

	//Funcion eliminar rol
	$("[name*='btn_eliminar_rol']").click(function(){
		id_rol = $(this).attr('data-id-rol');
		elimina_rol(id_rol);
	});
</script>