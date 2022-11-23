<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaPartes').DataTable(
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

    //Funcion boton crear partes
	$("#btn_crear_partes").click(function(){
		$("#partesModalLabel").text("Crear partes");
		$("#btn_guardar_partes").attr("data-accion","crear");
		$("#form_partes")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar partes
	$("#btn_guardar_partes").click(function(){
		resultado = campos_incompletos('form_partes');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_partes();
			}
			if(accion == 'editar'){
				edita_partes();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_partes = $(this).attr('data-id-partes');
		$("#partesModalLabel").text("Editar partes");
		carga_partes(id_partes);
		$("#btn_guardar_partes").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar partes
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_partes = $(this).attr('data-id-partes');
		$("#btn_eliminar_partes").attr("data-id-partes",id_partes);
	});

	//Funcion eliminar partes
	$("[name*='btn_eliminar_partes']").click(function(){
		id_partes = $(this).attr('data-id-partes');
		elimina_partes(id_partes);
	});
</script>