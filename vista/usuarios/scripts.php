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

    //Funcion boton crear usuario
	$("#btn_crear_usuario").click(function(){
		$("#usuarioModalLabel").text("Crear usuario");
		$("#btn_guardar_usuario").attr("data-accion","crear");
		$("#form_usuario")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar usuario
	$("#btn_guardar_usuario").click(function(){
		resultado = campos_incompletos('form_usuario');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_usuario();
			}
			if(accion == 'editar'){
				edita_usuario();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_usuario = $(this).attr('data-id-usuario');
		$("#usuarioModalLabel").text("Editar usuario");
		carga_usuario(id_usuario);
		$("#btn_guardar_usuario").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion eliminar usuario
	$("[name*='btn_eliminar']").click(function(){
		$("#btn_eliminando").hide();
		id_usuario = $(this).attr('data-id-usuario');
		$("#btn_eliminar_usuario").attr("data-id-usuario",id_usuario);
	});

	//Funcion eliminar usuario
	$("[name*='btn_eliminar_usuario']").click(function(){
		id_usuario = $(this).attr('data-id-usuario');
		elimina_usuario(id_usuario);
	});
</script>