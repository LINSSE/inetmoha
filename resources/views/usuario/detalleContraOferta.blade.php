@extends('layouts.principal')

@section('content')
@if(Session::has('oferta'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('oferta')}}</strong>
            </div>
        @endif
	<center><h3>Detalle de Contra Oferta</h3></center>
	@if(empty($cofertas))
		<center><h4>La Oferta no posee ninguna Orden de Compra</h4></center> 
	@else
	<div class="row">
		<div class="col-md-12">
          <h1 class="h1-tabla">Mi Oferta</h1>
          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Producto</th>
                          <th>Modo</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Fecha Fin</th>
                          <th>Puesto</th>
                          <th>Cobro</th>
                          <th>Plazo (días)</th>
                      </tr>
                  </thead>
                     <tbody>
                         <tr>
                           <input type="hidden" name="id" value="{{$of->id}}">
                         	<td><input type="text" class="input-table" name="producto" value="{{$of->producto->nombre}} {{$of->producto->descripcion}} {{$of->producto->descripcion2}}" disabled></td>
                          <td><input type="text" class="input-table" name="modo" value="{{$of->modo->descripcion}} X {{$of->peso}} {{$of->medida->descripcion}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="cantidad" value="{{$of->cantidad}}" readonly="true"></td>
                         	<td><input type="text" class="input-table" name="precio" value="$ {{$of->precio}}" readonly="true"></td>
                         	<td><input type="text" class="input-table" name="fechafin" value="{{$of->fechaFin}}" readonly="true"></td>
                         	<td><input type="text" class="input-table" name="puesto" value="{{$of->puesto->descripcion}}" readonly="true"></td>
                         	<td><input type="text" class="input-table" name="cobro" value="{{$of->cobro->descripcion}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="plazo" value="{{$of->plazo}}" readonly="true"></td>
                         </tr>
                     </tbody>
              </table>
          </div>
		</div>
		</div>
		<hr>
		<div class="row">
      <div class="col-md-6">
          <h1 class="h1-tabla">Ordenes de Compra (Contra Ofertas)</h1>
          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Comprador</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Cobro</th>
                          <th>Plazo</th>
                          <th></th>
                      </tr>
                  </thead>
                  @foreach($cofertas as $co)
                     <tbody>
                         <tr> 
                         	<td><input type="text" class="input-table" name="comprador" value="{{$co->user->apellido}} {{$co->user->name}}" disabled></td>
                         	<td><input type="text" class="input-table" name="cantidad" value="{{$co->cantidad}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="precio" value="{{$co->precio}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="cobro" value="{{$co->cobro->descripcion}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="plazo" value="{{$co->plazo}}" readonly="true"></td>
                         	<td><a type="button" href="/usuario/aceptarOferta/{{$co->id}}" class="btn btn-success admin tabla" title="Aceptar Contra Oferta">Aceptar</a><br><a type="button" href="/usuario/rechazarOferta/{{$co->id}}" class="btn btn-danger admin tabla" title="Aceptar Contra Oferta">Rechazar</a></td>
                         </tr>
                     </tbody>
                 @endforeach
              </table>
          </div>
      </div>
      <div class="col-md-6">
          <h1 class="h1-tabla">Ordenes de Compra Aceptadas</h1>
          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Comprador</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Cobro</th>
                          <th>Plazo</th>
                          <th></th>
                      </tr>
                  </thead>
                  @foreach($cofacep as $coa)
                     <tbody>
                         <tr> 
                          <td><input type="text" class="input-table" name="comprador" value="{{$coa->user->apellido}} {{$coa->user->name}}" disabled></td>
                          <td><input type="text" class="input-table" name="cantidad" value="{{$coa->cantidad}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="precio" value="{{$coa->precio}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="cobro" value="{{$coa->cobro->descripcion}}" readonly="true"></td>
                          <td><input type="text" class="input-table" name="plazo" value="{{$coa->plazo}}" readonly="true"></td>
                         </tr>
                     </tbody>
                 @endforeach
              </table>
          </div>
      </div>
   	</div>
    @endif
    <a type="button" href="/usuario/ofertas" class="btn btn-primary admin" title="Volver">Volver</a>
@endsection