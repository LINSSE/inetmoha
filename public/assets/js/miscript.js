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

    $('#agregarCat').on('click', function () {
            $('#agregarCategoria').load("agregarCategoria")//load a view into a modal
        $('#agregarCategoria').modal('show'); //show the modal
      });

    $('#agregarMed').on('click', function () {
            $('#agregarMedida').load("agregarMedida")//load a view into a modal
        $('#agregarMedida').modal('show'); //show the modal
      });

    $('#agregarCob').on('click', function () {
            $('#agregarCobro').load("agregarCobro")//load a view into a modal
        $('#agregarCobro').modal('show'); //show the modal
      });

    $('#agregarMod').on('click', function () {
            $('#agregarModo').load("agregarModo")//load a view into a modal
        $('#agregarModo').modal('show'); //show the modal
      });

    $('#agregarPue').on('click', function () {
            $('#agregarPuesto').load("agregarPuesto")//load a view into a modal
        $('#agregarPuesto').modal('show'); //show the modal
      });
    
    $('#agregarOferta').on('click', function () {
        $('#nuevaOferta').modal('show'); //show the modal
      });

    $('#agregarDemanda').on('click', function () {
        $('#nuevaDemanda').modal('show'); //show the modal
      });
 
    ofertar = function (id) {
            $('#idco').val(id);
        $('#modalOfertar').modal('show'); //show the modal
      }

    $("#fmNuevaOferta input:checkbox").on('click', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

});