@extends('layouts.principal')

@section('content')
    @guest
        <center><h4>Debe Registrarse para Acceder a esta sección</h4></center>
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
                <table class="table">
                    <thead>
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio $</th>
                            <th>Fecha Fin</th>
                            <th>Operador</th>
                            <th>Pago</th>
                            <th>Destino</th>
                            <th>Modo</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($demandas as $dem)
                    @if($dem->abierta === 0)
                    <tbody>
                        <tr>
                            <!-- <form class="form-horizontal" name="" method="POST" action=""> -->
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$dem->id}}">
                            <input type="hidden" name="id_op" value="{{$dem->user->id}}">
                            <td><input type="text" class="input-table" name="producto" value="{{$dem->producto->nombre}}" readonly="true"></td>
                            <td><input type="text" class="input-table" name="cantidad" value="{{$dem->cantidad}}" readonly="true"></td>
                            <td><input type="text" class="input-table" name="precio" value="{{$dem->precio}}" readonly="true"></td>
                            <td><input type="text" class="input-table" name="fechaFin" value="{{$dem->fechaFin}}" disabled></td>
                            <td><input type="text" class="input-table" name="operador" value="{{$dem->user->apellido}} {{$dem->user->name}}" readonly="true"></td>
                            <td><input type="text" class="input-table" name="pago" value="{{$dem->pago}}" readonly="true"></td>
                            <td><input type="text" class="input-table" name="destino" value="{{$dem->destino}}" readonly="true"></td>
                            <td><input type="text" class="input-table" name="modo" value="{{$dem->modo}}" readonly="true"></td>
                            <td>@if(Auth::user()->activo === 1)
                                    <button type="button" name="ofertar" class="btn btn-success admin tabla">Ofertar</button>
                                @else
                                    <button type="button" name="ofertar" disabled="" class="btn btn-success admin">Ofertar</button>
                                @endif</td>
                            <!-- </form> -->
                        </tr>
                    </tbody>
                    @endif
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
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio $</th>
                            <th>Fecha Fin</th>
                            <th>Operador</th>
                            <th>Pago</th>
                            <th>Destino</th>
                            <th>Modo</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($demandas as $dem)
                        @if($dem->abierta === 1)
                        <tbody>
                            <tr>
                                <!-- <form class="form-horizontal" name="" method="POST" action=""> -->
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$dem->id}}">
                                <input type="hidden" name="id_op" value="{{$dem->user->id}}">
                                <td><input type="text" class="input-table" name="producto" value="{{$dem->producto->nombre}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="cantidad" value="{{$dem->cantidad}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="precio" value="{{$dem->precio}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="fechaFin" value="{{$dem->fechaFin}}" disabled></td>
                                <td><input type="text" class="input-table" name="operador" value="{{$dem->user->apellido}} {{$dem->user->name}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="pago" value="{{$dem->pago}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="destino" value="{{$dem->destino}}" readonly="true"></td>
                                <td><input type="text" class="input-table" name="modo" value="{{$dem->modo}}" readonly="true"></td>
                                <td>@if(Auth::user()->activo === 1)
                                        <button type="button" name="ofertar" class="btn btn-success admin tabla">Ofertar</button>
                                    @else
                                        <button type="button" name="ofertar" disabled="" class="btn btn-success admin">Ofertar</button>
                                    @endif</td>
                                <!-- </form> -->
                            </tr>
                        </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endguest
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@stop