<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaConsecutivo').DataTable(
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

	//Funcion guardar consecutivo
	$("#btn_guardar_consecutivo").click(function(){
		resultado = campos_incompletos('form_consecutivo');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_consecutivo();
			}
			if(accion == 'editar'){
				edita_consecutivo();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_consecutivo = $(this).attr('data-id-consecutivo');
		$("#consecutivoModalLabel").text("Editar consecutivo");
		carga_consecutivo(id_consecutivo);
		$("#btn_guardar_consecutivo").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});
</script>