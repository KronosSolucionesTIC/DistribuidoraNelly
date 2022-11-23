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

	//Funcion guardar empresa
	$("#btn_guardar_empresa").click(function(){
		resultado = campos_incompletos('form_empresa');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_empresa();
			}
			if(accion == 'editar'){
				edita_empresa();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_empresa = $(this).attr('data-id-empresa');
		$("#empresaModalLabel").text("Editar empresa");
		carga_empresa(id_empresa);
		$("#btn_guardar_empresa").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});
</script>