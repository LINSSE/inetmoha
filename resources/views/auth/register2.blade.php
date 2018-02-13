<?php
    ini_set('display_errors', '1');
    error_reporting(-1);

$cuit = '23133458689';
$buscar = 'https://www.sistemasagiles.com.ar/padron/consulta/persona/'.$cuit;
$respuesta = file_get_contents($buscar);
echo($respuesta);echo('</br>');
echo('=================================================================');echo('</br>');
$respuesta = json_decode($respuesta);
// Leer provincias en base al codigo fiscarl.
echo("nombre : ".$respuesta->data->nombre);echo('</br>');
echo("direccion : ".$respuesta->data->domicilioFiscal->direccion);echo('</br>');
echo("cp : ".$respuesta->data->domicilioFiscal->codPostal);echo('</br>');
echo("prov : ".$respuesta->data->domicilioFiscal->idProvincia);echo('</br>');
echo("local : ".$respuesta->data->domicilioFiscal->localidad);echo('</br>');
// Impuestos inscriptos
$tabla = $respuesta->data->impuestos;
$elementos = count ($tabla);
for($i=0;$i<$elementos;$i++){
    echo('Impuesto = '.$respuesta->data->impuestos[$i]);echo('</br>');
}

?>