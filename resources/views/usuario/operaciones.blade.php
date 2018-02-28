@extends('layouts.principal')

@section('content')
	<div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Mis Operaciones</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Modo</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                                <th>Pago</th>
                                <th>Plazo (días)</th>
                                <th>Origen</th>
                                <th>Destino</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($operaciones as $op)
                        	<tr>
                        		<input type="hidden" name="id" value="{{$op->id}}">
                            	<td><input type="text" class="input-table" name="producto" value="{{$op->oferta->producto->nombre}} {{$op->oferta->producto->descripcion}} {{$op->oferta->producto->descripcion2}}" disabled></td>
                                <td><input type="text" class="input-table" name="modo" value="{{$op->oferta->modo->descripcion}} X {{$op->oferta->peso}} {{$op->oferta->medida->descripcion}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="cantidad" value="{{$op->cantidad}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="fecha" value="{{$op->fecha}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="precio" value="$ {{$op->precio}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="pago" value="{{$op->cobro->descripcion}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="plazo" value="{{$op->plazo}}" readonly="true"></td>
                                @if ($op->tipo === 1)
                            	   <td><input type="text" class="input-table" name="destino" value="{{$op->oferta->puesto->descripcion}}" readonly="true"></td>
                                   <td><input type="text" class="input-table" name="" value="" readonly="true"></td>
                                @else                
                                    <td><input type="text" class="input-table" name="" value="" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="destino" value="{{$op->oferta->puesto->descripcion}}" readonly="true"></td>
                                @endif            	
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
    
@endsection
	
