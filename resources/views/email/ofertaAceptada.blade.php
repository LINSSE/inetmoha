<center>
<div class="content" style="width:100%;height:20%;background-color:#7fb850;padding:15px; ">
<center><h2 style="color:#74787e;">{{ config('app.name') }}</h2></center></div>
<br>
<h3>La contra Oferta que realizó ha sido ACEPTADA por el vendedor!</h3>
<br>
<h4 style="color:gray;">Estos son los datos del Vendedor y de la Compra:</h4>
<p style="color:gray;">Apellido y Nombre: {{$user->apellido}}, {{$user->name}}</p>
<p style="color:gray;">Correo Electrónico: {{$user->email}}</p>
<p style="color:gray;">Teléfono: {{$user->telefono}}</p>
<p style="color:gray;">Producto: {{$co->oferta->producto->nombre}}</p>
<p style="color:gray;">Cantidad: {{$co->cantidad}}</p>
<p style="color:gray;">Precio: ${{$co->oferta->precio}}</p>
<p style="color:gray;">Puesto: {{$co->oferta->puesto}}</p>
<p style="color:gray;">Cobro: {{$co->oferta->cobro}}</p>
<p style="color:gray;">Modo: {{$co->oferta->modo}}</p>
<br>
<p><a href="{{ config('app.url') }}" type="button"  style="background-color:#3498db;border-radius:6px;color:white;height: 40px;border-style: hidden;padding: 10px;text-decoration: none" >Ir al Sitio MOHA WEB</a></p>
<br>
<div class="content" style="width:100%;height:20%;background-color:#7fb850;padding:15px; ">
<center><h4 style="color:#74787e;">&copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.</h4></center></div>
</center>