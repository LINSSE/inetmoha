<center>
<div class="content" style="width:100%;height:20%;background-color:#7fb850;padding:15px; ">
<center><h2 style="color:#74787e;">{{ config('app.name') }}</h2></center></div>
<br>
<h3>Nuevo Operador Registrado en MOHA WEB</h3>
<br>
<p style="color:gray;">Un nuevo Operador se ha registrado en MOHA WEB.</p>
<br>
<p style="color:gray;">Ingrese al Panel de Administración para comprobar los datos del Nuevo Operador y ACTIVARLO.</p>
<br>
<?php $direccion = 'http://localhost:8000/admin/operadores'; ?>
<p><a href="{{$direccion}}">Ingresar al Panel</a></p>
<br>
<div class="content" style="width:100%;height:20%;background-color:#7fb850;padding:15px; ">
<center><h4 style="color:#74787e;">&copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.</h4></center></div>
</center>
