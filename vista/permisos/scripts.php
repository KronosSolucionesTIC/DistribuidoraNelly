 <?php include "../transversales.php"; ?>
 <?php include "scriptsAjax.php"; ?>
 <script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaUsuarios').DataTable(
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

    //Funcion para marcar todos los check
   	function marcar(columna){
   		contador = $("#contador").val();
   		texto = $("#" + columna).val();
   		if(texto == 'Marcar'){
   			$("#" + columna).val('Desmarcar');
   			$("#" + columna).text('Desmarcar');
   			for(i=0; i < contador; i++){
   				$("#" + columna + '_' + i).prop("checked", true);
   			}
   		} else {
   			$("#" + columna).val('Marcar');
   			$("#" + columna).text('Marcar');
   			for(i=0; i < contador; i++){
   				$("#" + columna + '_' + i).prop("checked", false);
   			}
   		}
   	}
</script>