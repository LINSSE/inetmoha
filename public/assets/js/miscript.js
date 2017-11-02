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


    $('#agregarRep').on('click', function () {
        $('#agregarRepresentante').load("agregarRepresentante")//load a view into a modal
    $('#agregarRepresentante').modal('show'); 
    });


	$('#agregarDesp').on('click', function () {
	        $('#agregarDespachante').load("agregarDespachante")//load a view into a modal
	    $('#agregarDespachante').modal('show'); //show the modal
	  });

    $('#agregarProd').on('click', function () {
            $('#agregarProducto').load("agregarProducto")//load a view into a modal
        $('#agregarProducto').modal('show'); //show the modal
      });

    /*$('#eliminarDesp').on('click', function () {

            var id = $(this).data('id');
            
            $('#eliminarDespachante #id-des').val(id);//load a view into a modal
        $('#eliminarDespachante').modal('show'); //show the modal
      });*/

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

    eliminarDesp = function (id) {
             $('#id').val(id);//load a view into a modal
        $('#eliminarDespachante').modal('show'); //show the modal
    }    

    eliminarRep = function (id) {
             $('#id').val(id);//load a view into a modal
        $('#eliminarRepresentante').modal('show'); //show the modal
    }

});