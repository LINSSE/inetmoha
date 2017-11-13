<center>
<div class="content" style="width:100%;height:20%;background-color:#f5f8fa;padding:15px; ">
<center><h2 style="color:#74787e;">{{ config('app.name') }}</h2></center></div>
<br>
<h3>Bienvenido! Usted se ha registrado en MOHA WEB</h3>
<br>
<p style="color:gray;">Su cuenta esta pendiente de activación.</p>
<br>
<p style="color:gray;">Un Adminsitrador verificará sus datos para poder activar su cuenta y poder realizar operaciones.</p>
<br>
<?php $direccion = 'http://localhost:8000/'; ?>
<p><a type="button" href="{{$direccion}}">Ir al Sitio MOHA WEB</a></p>
<br>
<div class="content" style="width:100%;height:20%;background-color:#f5f8fa;padding:15px; ">
<center><h4 style="color:#74787e;">&copy; {{ date('Y') }} {{ config('app.name') }}. Todo los derechos reservados.</h4></center></div>
</center>