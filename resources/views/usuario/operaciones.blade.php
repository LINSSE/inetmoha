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
                        @foreach($operacioneso as $op)
                            <tr>
                                <input type="hidden" name="id" value="{{$op->id}}">
                                <td><input type="text" class="input-table" name="producto" value="{{$op->contra->oferta->producto->nombre}} {{$op->contra->oferta->producto->descripcion}} {{$op->contra->oferta->producto->descripcion2}}" disabled></td>
                                <td><input type="text" class="input-table" name="modo" value="{{$op->contra->oferta->modo->descripcion}} X {{$op->contra->oferta->peso}} {{$op->contra->oferta->medida->descripcion}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="cantidad" value="{{$op->contra->cantidad}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="fecha" value="{{$op->fecha}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="precio" value="$ {{$op->contra->precio}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="pago" value="{{$op->contra->cobro->descripcion}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="plazo" value="{{$op->contra->plazo}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="destino" value="{{$op->contra->oferta->puesto->descripcion}}" readonly="true"></td>
                                <td> --- </td>
                            </tr>
                        @endforeach
                        @foreach($operacionesd as $op)
                            <tr>
                                <td><input type="text" class="input-table" name="producto" value="{{$op->contra->demanda->producto->nombre}} {{$op->contra->demanda->producto->descripcion}} {{$op->contra->demanda->producto->descripcion2}}" disabled></td>
                                <td><input type="text" class="input-table" name="modo" value="{{$op->contra->demanda->modo->descripcion}} X {{$op->contra->demanda->peso}} {{$op->contra->demanda->medida->descripcion}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="cantidad" value="{{$op->contra->cantidad}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="fecha" value="{{$op->fecha}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="precio" value="$ {{$op->contra->precio}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="pago" value="{{$op->contra->cobro->descripcion}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="plazo" value="{{$op->contra->plazo}}" readonly="true"></td>
                                <td> --- </td>
                                <td><input type="text" class="input-table" name="destino" value="{{$op->contra->demanda->puesto->descripcion}}" readonly="true"></td>                            
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
    
@endsection
	
