$(document).ready(function(){
    
    $("#provincias").change(function(event){
        $.get("ciudades/"+event.target.value+"",function(response, provincia){
        $("#ciudades").empty();
            for(i=0; i<response.length; i++){
            $("#ciudades").append("<option value="+response[i].id+"> "+response[i].nombre+" </option>");
            }
        });
    });

    $("#fecha").change(function(event){
        var fecha = document.getElementById("fecha").value;
        $("#fechaf").attr("disabled", false);
        $("#fechaf").attr("min", fecha);
    });

    $('#agregarProd').on('click', function () {
            $('#agregarProducto').load("agregarProducto")//load a view into a modal
        $('#agregarProducto').modal('show'); //show the modal
      });

    $('#agregarProducto').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarProducto')[0].reset(); //para limpiar campos del modal
    });

    $('#agregarCat').on('click', function () {
            $('#agregarCategoria').load("agregarCategoria")//load a view into a modal
        $('#agregarCategoria').modal('show'); //show the modal
      });

    $('#agregarCategoria').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarCategoria')[0].reset(); //para limpiar campos del modal
    });

    $('#agregarMed').on('click', function () {
            $('#agregarMedida').load("agregarMedida")//load a view into a modal
        $('#agregarMedida').modal('show'); //show the modal
      });

    $('#agregarMedida').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarMedida')[0].reset(); //para limpiar campos del modal
    });

    $('#agregarCob').on('click', function () {
            $('#agregarCobro').load("agregarCobro")//load a view into a modal
        $('#agregarCobro').modal('show'); //show the modal
      });

    $('#agregarCobro').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarCobro')[0].reset(); //para limpiar campos del modal
    });

    $('#agregarMod').on('click', function () {
            $('#agregarModo').load("agregarModo")//load a view into a modal
        $('#agregarModo').modal('show'); //show the modal
      });

    $('#agregarModo').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarModo')[0].reset(); //para limpiar campos del modal
    });

    $('#agregarPue').on('click', function () {
            $('#agregarPuesto').load("agregarPuesto")//load a view into a modal
        $('#agregarPuesto').modal('show'); //show the modal
      });

    $('#agregarPuesto').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarPuesto')[0].reset(); //para limpiar campos del modal
    });
    
    $('#agregarOfer').on('click', function () {
        $('#agregarOferta').modal('show'); //show the modal
      });

    $('#agregarOferta').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarOferta')[0].reset(); //para limpiar campos del modal
    });

    $('#agregarDem').on('click', function () {
        $('#agregarDemanda').modal('show'); //show the modal
      });

    $('#agregarDemanda').on('hidden.bs.modal', function(){ 
        $(this).find('#formagregarDemanda')[0].reset(); //para limpiar campos del modal
    });
 
    ofertar = function (id, cantidad, precio) {
            $('#id_oferta').val(id);
            $('#cantOferta').val(cantidad);
            $('#cantidadCo').val(cantidad);
            $('#precioCo').val(precio);
        $('#modalOfertar').modal('show'); //show the modal
      }

    $("#cantidad").change(function(event){
        var cant = document.getElementById("cantOferta").value;
        $("#cantidad").attr("max", cant);
    });

    $('#modalOfertar').on('hidden.bs.modal', function(){ 
        $(this).find('#formOfertar')[0].reset(); //para limpiar campos del modal
    });

    $("#fmNuevaOferta input:checkbox").on('click', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

});