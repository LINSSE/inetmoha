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