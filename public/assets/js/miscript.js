$(document).ready(function(){
        $("#provincias").change(function(event){
            $.get("ciudades/"+event.target.value+"",function(response, provincia){
            $("#ciudades").empty();
                for(i=0; i<response.length; i++){
                $("#ciudades").append("<option value="+response[i].id+"> "+response[i].nombre+" </option>");
                }
            });
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

    $('#eliminarDesp').on('click', function () {

            var id = $(this).data('id');
            
            $('#eliminarDespachante #id-des').val(id);//load a view into a modal
        $('#eliminarDespachante').modal('show'); //show the modal
      });

    // function eliminarDesp(id) {
    //     var id = $(this).data('id');
            
    //         $('#eliminarDespachante #id-des').val(id);//load a view into a modal
    //     $('#eliminarDespachante').modal('show'); //show the modal
    // }
    

});