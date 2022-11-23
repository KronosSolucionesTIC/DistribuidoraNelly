<script type="text/javascript">
	//Funcion para guardar los permisos
	function crea_permisos(){
		contador = $("#contador").val();
		for(i=0; i < contador; i++){
			cod_rol = $("#cod_rol_" + i).val();
			cod_int_per = $("#cod_int_per_" + i).val();
			var resultado = $('#consulta_' + i).is(":checked");
			consulta = calcula(resultado);
			var resultado = $('#edicion_' + i).is(":checked");
			edicion = calcula(resultado);
			var resultado = $('#insercion_' + i).is(":checked");
			insercion = calcula(resultado);
			var resultado = $('#eliminacion_' + i).is(":checked");
			eliminacion = calcula(resultado);
			$.ajax({
	      		url: "../../controlador/ajaxPermisos.php",
	      		data: 'cod_rol='+cod_rol+'&cod_int_per='+cod_int_per+'&con_per='+consulta+'&edi_per='+edicion+'&ins_per='+insercion+'&eli_per='+eliminacion+'&tipo=inserta'
	    	})
	    	.done(function(data) {
	    		console.log(data);
	    	})
	    	.fail(function(data) {
	      		console.log(data);
	    	})
	     	.always(function(data) {
	      		console.log(data);
	    	});
		}
	}

	//Funcion para eliminar permisos
	function eliminar_permisos(cod_rol){
	    $.ajax({
	      url: "../../controlador/ajaxPermisos.php",
	      data: 'cod_rol='+cod_rol+'&tipo=elimina'
	    })
	    .done(function(data) {
	    	crea_permisos();
	      	alertify.success('Creado correctamente');
		  	setTimeout('recargar()',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para devolver valor de 1 o 0
	function calcula(valor){
		if (valor == true){
			return 1;
		} else{
			return 0;
		}	
	}
</script>