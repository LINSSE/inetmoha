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
                                <td>{{$op->contra->oferta->producto->nombre}} {{$op->contra->oferta->producto->descripcion}} {{$op->contra->oferta->producto->descripcion2}}</td>
                                <td>{{$op->contra->oferta->modo->descripcion}} X {{$op->contra->oferta->peso}} {{$op->contra->oferta->medida->descripcion}}</td>
                                <td>{{$op->contra->cantidad}}</td>
                                <td>{{$op->fecha}}</td>
                                <td>$ {{$op->contra->precio}}</td>
                                <td>{{$op->contra->cobro->descripcion}}</td>
                                <td>{{$op->contra->plazo}}</td>
                                <td>{{$op->contra->oferta->puesto->descripcion}}</td>
                                <td> --- </td>
                            </tr>
                        @endforeach
                        @foreach($operacionesd as $op)
                            <tr>
                                <td>{{$op->contra->demanda->producto->nombre}} {{$op->contra->demanda->producto->descripcion}} {{$op->contra->demanda->producto->descripcion2}}</td>
                                <td>{{$op->contra->demanda->modo->descripcion}} X {{$op->contra->demanda->peso}} {{$op->contra->demanda->medida->descripcion}}</td>
                                <td>{{$op->contra->cantidad}}</td>
                                <td>{{$op->fecha}}</td>
                                <td>$ {{$op->contra->precio}}</td>
                                <td>{{$op->contra->cobro->descripcion}}</td>
                                <td>{{$op->contra->plazo}}</td>
                                <td> --- </td>
                                <td>{{$op->contra->demanda->puesto->descripcion}}</td>                            
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
	
