@extends('layouts.principal')

@section('content')
    @guest
        <center><h4>Debe Registrarse para Acceder a esta sección</h4></center>
    @else
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <form class="form-horizontal" method="GET" action="/usuario/buscarOperaciones">
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" autofocus="autofocus" name="buscar" placeholder="Buscar..." >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
                </form>
            </div>
        </div>
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
                            <tr>
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