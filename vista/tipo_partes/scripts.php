<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaTipo_partes').DataTable(
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

    //Funcion boton crear tipo_partes
	$("#btn_crear_tipo_partes").click(function(){
		$("#tipo_partesModalLabel").text("Crear tipo parte");
		$("#btn_guardar_tipo_partes").attr("data-accion","crear");
		$("#form_tipo_partes")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar tipo_partes
	$("#btn_guardar_tipo_partes").click(function(){
		resultado = campos_incompletos('form_tipo_partes');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_tipo_partes();
			}
			if(accion == 'editar'){
				edita_tipo_partes();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_tipo_partes = $(this).attr('data-id-tipo_partes');
		$("#tipo_partesModalLabel").text("Editar tipo parte");
		carga_tipo_partes(id_tipo_partes);
		$("#btn_guardar_tipo_partes").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar tipo_partes
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_tipo_partes = $(this).attr('data-id-tipo_partes');
		$("#btn_eliminar_tipo_partes").attr("data-id-tipo_partes",id_tipo_partes);
	});

	//Funcion eliminar tipo_partes
	$("[name*='btn_eliminar_tipo_partes']").click(function(){
		id_tipo_partes = $(this).attr('data-id-tipo_partes');
		elimina_tipo_partes(id_tipo_partes);
	});
</script>