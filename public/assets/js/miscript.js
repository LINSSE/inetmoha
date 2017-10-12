$(document).ready(function(){
        $("#provincias").change(function(event){
            $.get("ciudades/"+event.target.value+"",function(response, provincia){
            $("#ciudades").empty();
                for(i=0; i<response.length; i++){
                $("#ciudades").append("<option value="+response[i].id+"> "+response[i].nombre+" </option>");
                }
            });
        });
});


$(document).ready(function(){
    $('#agregarRep').on('click', function () {
        $('#agregarRepresentante').load("agregarRepresentante")//load a view into a modal
    $('#agregarRepresentante').modal('show'); 
  });
});

$(document).ready(function(){
	$('#agregarDesp').on('click', function () {
	        $('#agregarDespachante').load("agregarDespachante")//load a view into a modal
	    $('#agregarDespachante').modal('show'); //show the modal
	  });
});

$(document).ready(function(){
    $('#agregarProd').on('click', function () {
            $('#agregarProducto').load("agregarProducto")//load a view into a modal
        $('#agregarProducto').modal('show'); //show the modal
      });
});