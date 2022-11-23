<?php include "../transversales.php"; ?>
<?php include '../scriptsNumeroALetras.php'; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaOtro_si').DataTable(
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

	//Funcion boton detalle
	$("[name*='btn_ver']").click(function(){
		$("#otro_siModalLabel").text("Otro si");
		otro_si = $(this).attr('data-id-otro-si');
		carga_empresa();
		carga_otro_si(otro_si);
		carga_equipos(otro_si);
 	});

    //Funcion mes a letra
    function mesALetra(mes){
        switch(mes) {
          case '1': return 'Enero'; break;
          case '2': return 'Febrero'; break;
          case '3': return 'Marzo'; break;
          case '4': return 'Abril'; break;
          case '5': return 'Mayo'; break;
          case '6': return 'Junio'; break;
          case '7': return 'Julio'; break;
          case '8': return 'Agosto'; break;
          case '9': return 'Septiembre'; break;
          case '10': return 'Octubre'; break;
          case '11': return 'Noviembre'; break;
          case '12': return 'Diciembre'; break;
          default: return 'No existe mes';
        }
    }

    //Funcion para imprimir
    $("#btn_imprimir").click(function(){
        printDiv('contenidoAnexo');
        return false;
    });
</script>