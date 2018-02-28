@extends('layouts.principal')

@section('content')
    @guest
        <center><h4>Debe Registrarse para Acceder a esta sección</h4></center>
    @else
    <div class="row">
        <div class="col-md-12">
            <h1 class="h1-tabla">Operaciones Concretadas</h1>
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
                    @foreach($operaciones as $op)
                    <tbody>
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
    <div class="row">
        <div class="col-md-12">
            <h1 class="h1-tabla">Operaciones Comprometidas</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Producto </th>
                            <th>Cant </th>
                            <th>Fecha </th>
                            <th>Precio </th>
                            <th>Pago</th>
                            <th>P1 </th>
                            <th>Destino </th>
                            <th>Modo </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tomate x 20kg</td>
                            <td>2.000 </td>
                            <td>15-20 sep</td>
                            <td>250 </td>
                            <td>Cdo </td>
                            <td>-- </td>
                            <td>Bs. As.</td>
                            <td>Raso </td>
                        </tr>
                        <tr>
                            <td>Zapallito x 10kg</td>
                            <td>1.000 </td>
                            <td>15-30 sep</td>
                            <td>200 </td>
                            <td>Efect </td>
                            <td>30 </td>
                            <td>Cba </td>
                            <td>Emb </td>
                        </tr>
                        <tr>
                            <td>Tomate x 20kg</td>
                            <td>3.000 </td>
                            <td>15-20 sep</td>
                            <td>180 </td>
                            <td>Cdo </td>
                            <td>10 </td>
                            <td>Rosario </td>
                            <td>Raso </td>
                        </tr>
                        <tr>
                            <td>Zapallito x 10kg</td>
                            <td>1.000 </td>
                            <td>15-30 sep</td>
                            <td>185 </td>
                            <td>Com </td>
                            <td>Cpd </td>
                            <td>Rosario </td>
                            <td>Abierto </td>
                        </tr>
                        <tr>
                            <td>Zapallito x 10kg</td>
                            <td>1.000 </td>
                            <td>15-30 sep</td>
                            <td>210 </td>
                            <td>Anticipo </td>
                            <td>40 </td>
                            <td>Cba </td>
                            <td>Emb </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endguest
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@stop