<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaPrecio').DataTable(
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

    //Funcion boton crear precio
	$("#btn_crear_precio").click(function(){
		$("#precioModalLabel").text("Crear precio");
		$("#btn_guardar_precio").attr("data-accion","crear");
		$("#form_precio")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar precio
	$("#btn_guardar_precio").click(function(){
		resultado = campos_incompletos('form_precio');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_precio();
			}
			if(accion == 'editar'){
				edita_precio();
			}
		}
	});

    //Funcion para select dependiente
    $("#clase_equipo").on('change', function () {
        cargaSelects();
    });

    //Funcion para los selects
    function cargaSelects(){
        $("#clase_equipo option:selected").each(function () {
            elegido=$(this).val();
            select_tipo(elegido);   
        });
    }
</script>