<?php $hoy=date("Y-m-j"); echo $hoy;?>
<br>
<?php $nuevafecha=strtotime('+1 day',strtotime($hoy));$nuevafecha=date('Y-m-j',$nuevafecha);echo $nuevafecha;?>

