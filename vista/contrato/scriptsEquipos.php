<script type="text/javascript">
   //Funcion boton agregar equipos
    $("#agregarEquipos").click(function(){
        if($('#clase').val() == 0 || $('#equipo').val() == 0){
            alertify.alert(
                'Campos incompletos',
                'Verifique que los campos esten completos',
            function(){
                alertify.error('Campos incompletos');
            });
        } else {
            $("#clase option:selected").each(function () {
                nomClase=$(this).text();
            });
            $("#equipo option:selected").each(function () {
                nomConsecutivo=$(this).text();
            });
            canon = $('#canon').val();
            deposito = $('#deposito').val();
            total = $('#total').val();
            agregarEquipos(nomClase, $('#equipo').val(), nomConsecutivo, canon, deposito, total);           
        }
    });   

    //Funcion para agregar equipos
    function agregarEquipos(nomclase, consecutivo, nomConsecutivo, canon, deposito, total){
        contador = parseInt($('#contador').val());
        $("#tablaEquipos>tbody").append('<tr id="'+ contador + '"><td><div class="alert alert-secondary" role="alert">' + nomClase + '</div></td><td><input type="hidden" name="cod_equipo_'+ contador + '" value="'+ consecutivo + '"><input type="hidden" name="canon_equipo_'+ contador + '" value="'+ canon + '"><input type="hidden" name="deposito_equipo_'+ contador + '" value="'+ deposito + '"><input type="hidden" name="total_equipo_'+ contador + '" value="'+ total + '"><div class="alert alert-secondary" role="alert">'+ nomConsecutivo + '</div></td><td><div class="alert alert-secondary" role="alert">' + canon + '</div></td><td><div class="alert alert-secondary" role="alert">' + deposito + '</div></td><td><div class="alert alert-secondary" role="alert">' + total + '</div></td><td class="text-center"><button type="button" id="btn_'+ contador + '" data-equipo="' + consecutivo + '" class="btn btn-primary" onclick="quitarEquipos(' + contador + ')"><i class="fa-solid fa-minus"></i></button></td></tr>');
        contador = contador + 1;
        $('#contador').val(contador);
        limpiarTabla();
    }

    //Funcion para quitar equipos
    function quitarEquipos(fila){
        $("#" + fila).remove();
    }

    //Funcion para los selects
    function cargaSelects(){
        $("#cod_cliente option:selected").each(function () {
            elegido=$(this).val();
            $('#cod_paciente').empty();
            $('#cod_paciente').append(new Option('Seleccione un paciente...', 0));
            select_paciente(elegido, '');   
        });
    }

    //Funcion para select dependiente
    $("#clase").on('change', function () {
        $("#clase option:selected").each(function () {
            elegido=$(this).val();
            select_consecutivo(elegido); 
        });
    });

    //Funcion para select dependiente
    function bloquearDesbloquearSelect(elegido){
        if(elegido == 1){
            $("#cod_responsable").val('0');
            $("#cod_responsable").attr("disabled", true);
            $("#cod_responsable").attr("required", false);
        } else {
            $("#cod_responsable").attr("disabled", false);
            $("#cod_responsable").attr("required", true);
        }
    }

    //Funcion para select dependiente
    $("#cod_cliente").on('change', function () {
        $("#cod_cliente option:selected").each(function () {
            elegido=$(this).val();
            cargaSelects();
        });
    });

    //Funcion para select dependiente
    $("#equipo").on('change', function () {
        $("#equipo option:selected").each(function () {
            elegido=$(this).val();
            carga_valores(elegido); 
        });
    });

    //Funcion para calcular valores
    $("[name*='valor']").on('blur', function () {
        canon = parseInt($('#canon').val());
        deposito = parseInt($('#deposito').val());
        total = canon + deposito;
        $('#total').val(total);
    });
</script>