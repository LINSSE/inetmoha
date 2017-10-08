$(document).ready(function(){
        $("#provincias").change(function(event){
            console.log("anda");
            $.get("ciudades/"+event.target.value+"",function(response, provincia){
            console.log(response);
            $("#ciudades").empty();
                for(i=0; i<response.length; i++){
                $("#ciudades").append("<option value="+response[i].id+"> "+response[i].nombre+" </option>");
                console.log(response);
                }
            });
        });
    });