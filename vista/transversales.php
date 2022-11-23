<script type="text/javascript">
	//Funcion para limpiar campos
	function limpiar_campos(){
		$("input").removeClass('is-invalid');
		$("input").removeClass('is-valid');
		$("select").removeClass('is-invalid');
		$("select").removeClass('is-valid');
	}

    //Campos incompletos de usuario
    function campos_incompletos(formulario){
		var bandera = true;
      	$("#"+formulario).find(':input').each(function() {
        	var elemento= this;
        	if(elemento.required == true){
        		if(verificar_campo(elemento.id, elemento.type, elemento.value) == false){
            		bandera = false;
          		}
        	}
      	});
      	if(bandera == false){
        	alertify.alert(
          	'Campos incompletos',
          	'Los campos con * son obligatorios',
          	function(){
            	alertify.error('Campos vacios');
        	});
        	return false;
      	} else {
        	return true;
      	}
    }

	//Funcion para verificar campos
	function verificar_campo(id, tipo, valor){
		if(valor < 0){
			marcar_campos("#"+id, 'incorrecto');
			return false;
		} else {
	    	switch(valor){
	      		case "0":
	          			marcar_campos("#"+id, 'incorrecto');
	          			return false;
	      		break;
	      		case "":
	          			marcar_campos("#"+id, 'incorrecto');
	          			return false;
	      		break;
	      		default:
	      			marcar_campos("#"+id, 'correcto');
	      		break;
	    	}
		}
	}

	//Funcion para marcar los campos
  	function marcar_campos(campo, tipo){
    	if(tipo == 'correcto'){
      		$(campo).removeClass('is-invalid');
      		$(campo).addClass('is-valid');
    	}
    	if(tipo == 'incorrecto'){
      		$(campo).removeClass('is-valid');
      		$(campo).addClass('is-invalid');
    	}
  	}

	//Funcion para cargar sitio
	function cargar_sitio(modal){
  		$("#"+modal).removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		location.reload();
   	}

   	//Funcion para cargar sitio
	function recargar(){
  		url = "index.php";
		$(location).attr('href',url);
   	}

    //Funcion para imprimir
    function printDiv(nombreDiv) {
      var ficha = document.getElementById(nombreDiv);
      var ventimp = window.open(' ', 'popimpr');
      ventimp.document.write('<html><head><title>Ortopédicos W Y W - Software</title>');
 	  ventimp.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">');
      ventimp.document.write('</head><body>');
      ventimp.document.write(ficha.innerHTML);
      ventimp.document.write('</body></html>');
      ventimp.document.close();
      ventimp.print();
      ventimp.close();
    }

	//Saca los dias entre dos fechas
	function daysBetween(date1, date2){ 
	   if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; } 
	   if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; } 
	   if (parseInt(date1[0], 10) >= 1000) { 
	       var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);
	   } else if (parseInt(date1[2], 10) >= 1000) { 
	       var sDate = new Date(date1[2]+"/"+date1[0]+"/"+date1[1]);
	   } else { 
	       return 0; 
	   } 
	   if (parseInt(date2[0], 10) >= 1000) { 
	       var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);
	   } else if (parseInt(date2[2], 10) >= 1000) { 
	       var eDate = new Date(date2[2]+"/"+date2[0]+"/"+date2[1]);
	   } else { 
	       return 0; 
	   } 
	   var one_day = 1000*60*60*24; 
	   var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day)); 
	   return daysApart; 
	}

    //Funcion para convertir cedula
    function convertir_cedula(cc){
        return cc.replace(/\D/g, "")
            .replace(/([0-9])([0-9]{3})$/, '$1.$2')
            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
    }

    //Funcion para convertir nit
    function convertir_nit(nit){
        digito = '';
        if(nit.length == 10){
            base = nit.substring(0, 9);
            digito = '-' + nit.substring(9, 10);
            return base.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".") + digito;
        } else {
            return nit.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        }
    }
</script>