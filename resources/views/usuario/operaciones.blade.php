@extends('layouts.principal')

@section('content')
	<div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Mis Operaciones (Compras)</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                                <th>Pago</th>
                                <th>Destino</th>
                                <th>Modo</th>
                            </tr>
                        </thead>
                        @foreach($operaciones as $op)
                        <tbody>
                        	<tr>
                        		<input type="hidden" name="id" value="{{$op->id}}">
                            	<td><input type="text" class="input-table" name="producto" value="{{$op->oferta->producto->nombre}}" disabled></td>
                            	<td><input type="text" class="input-table" name="cantidad" value="{{$op->cantidad}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="fecha" value="{{$op->fecha}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="precio" value="{{$op->precio}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="pago" value="{{$op->pago}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="destino" value="{{$op->destino}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="modo" value="{{$op->modo}}" readonly="true"></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
    <hr>
    <div class="row">
    	<div class="col-md-12">
                <h1 class="h1-tabla">Mis Operaciones (Ventas)</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                                <th>Pago</th>
                                <th>Destino</th>
                                <th>Modo</th>
                            </tr>
                        </thead>
                        @foreach($operaciones as $op)
                        <tbody>
                        	<tr>
                        		<input type="hidden" name="id" value="{{$op->id}}">
                            	<td><input type="text" class="input-table" name="producto" value="{{$op->oferta->producto->nombre}}" disabled></td>
                            	<td><input type="text" class="input-table" name="cantidad" value="{{$op->cantidad}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="fecha" value="{{$op->fecha}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="precio" value="{{$op->precio}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="pago" value="{{$op->pago}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="destino" value="{{$op->destino}}" readonly="true"></td>
                            	<td><input type="text" class="input-table" name="modo" value="{{$op->modo}}" readonly="true"></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
	
