@extends('layouts.principal')

@section('content')
    @guest
        <center><h4>Debe Regstrarse para Acceder a esta seccion</h4></center>
    @else
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <form class="form-horizontal" method="GET" action="/usuario/buscarDemandas">
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
                <h1 class="h1-tabla">Demandas sin Tomar</h1>
                <div class="table-responsive">
                    <table class="table chica">
                        <thead>
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Operador</th>
                                <th>Pago</th>
                                <th>Destino</th>
                                <th>Modo</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($demandas as $dem)
                            <tbody>
                                <tr>
                                    <!-- <form class="form-horizontal" name="" method="POST" action=""> -->
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$dem->id}}">
                                    <input type="hidden" name="id_op" value="{{$dem->user->id}}">
                                    <td><input type="text" class="input-table" name="producto" value="{{$dem->producto->nombre}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$dem->cantidad}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="precio" value="{{$dem->precio}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="operador" value="{{$dem->user->apellido}} {{$dem->user->apellido}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="pago" value="{{$dem->pago}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="destino" value="{{$dem->destino}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$dem->modo}}" readonly="true"></td>
                                    <td>@if($activo === 1)
                                            <button type="button" name="ofertar" class="btn btn-success admin">Ofertar</button>
                                        @else
                                            <button type="button" name="ofertar" disabled="" class="btn btn-success admin">Ofertar</button>
                                        @endif</td>
                                    <!-- </form> -->
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
                <h1 class="h1-tabla">Demandas Abiertas</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Precio </th>
                                <th>C. Pendiente</th>
                                <th>Operador </th>
                                <th>Pago</th>
                                <th>Destino </th>
                                <th>Modo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200</td>
                                <td>520 </td>
                                <td>Zone J.</td>
                                <td>Efect </td>
                                <td>Bs. As.</td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>185 </td>
                                <td>220 </td>
                                <td>Rodriguez L.</td>
                                <td>Efect </td>
                                <td>Barranquera </td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>360 </td>
                                <td>Zone J.</td>
                                <td>CPD </td>
                                <td>Cba </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>200 </td>
                                <td>90 </td>
                                <td>Rodriguez L.</td>
                                <td>Efect </td>
                                <td>Rsario </td>
                                <td>Abierto </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>250 </td>
                                <td>430 </td>
                                <td>Rodriguez L.</td>
                                <td>Com </td>
                                <td>Rosario </td>
                                <td>Emb </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endguest
@stop