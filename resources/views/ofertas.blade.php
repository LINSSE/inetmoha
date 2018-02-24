@extends('layouts.principal')

@section('content')
    @if(Session::has('contraoferta'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Su Orden de Compra a sido registrada. Será notificado si el Oferente la acepta o rechaza.</strong>
            </div>
        @endif
    @guest
        <center><h4>Debe Registrarse para Acceder a esta sección</h4></center>
    @else
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <form class="form-horizontal" method="GET" action="/usuario/buscarOfertas">
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
                <h1 class="h1-tabla">Ofertas sin Tomar</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio $</th>
                                <th>Fecha Fin</th>
                                <th>Puesto</th>
                                <th>Cobro</th>
                                <th>Modo</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($ofertas as $of)
                            @if($of->abierta === 0)
                            <tbody>
                                <tr>
                                    <input type="hidden" name="id" value="{{$of->id}}">
                                    <input type="hidden" name="iduser" value="{{$of->user->id}}">
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->producto->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$of->cantidad}}" disabled></td>
                                    <td><input type="text" class="input-table" name="precio" value="{{$of->precio}}" disabled></td>
                                    <td><input type="text" class="input-table" name="fechaFin" value="{{$of->fechaFin}}" disabled></td>
                                    <td><input type="text" class="input-table" name="puesto" value="{{$of->puesto->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cobro" value="{{$of->cobro->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$of->modo->descripcion}}" readonly="true"></td>
                                    <td>@if(Auth::user()->activo === 1)
                                            <button type="button" id="ofertar" data-toggle="modal" onclick="ofertar({{$of->id}})" class="btn btn-success admin tabla">Ofertar</button>
                                        @else
                                            <button type="button" id="ofertar" data-toggle="modal" data_target="#modalOfertar" disabled class="btn btn-success admin tabla">Ofertar</button>
                                        @endif</td>
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
                <h1 class="h1-tabla">Ofertas Abiertas</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio $</th>
                                <th>Fecha Fin</th>
                                <th>Puesto</th>
                                <th>Cobro</th>
                                <th>Modo</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($ofertas as $of)
                            @if($of->abierta === 1)
                            <tbody>
                                <tr>
                                    <input type="hidden" name="id" value="{{$of->id}}">
                                    <input type="hidden" name="iduser" value="{{$of->user->id}}">
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->producto->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$of->cantidad}}" disabled></td>
                                    <td><input type="text" class="input-table" name="precio" value="{{$of->precio}}" disabled></td>
                                    <td><input type="text" class="input-table" name="fechaFin" value="{{$of->fechaFin}}" disabled></td>
                                    <td><input type="text" class="input-table" name="puesto" value="{{$of->puesto}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cobro" value="{{$of->cobro}}" disabled></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$of->modo}}" readonly="true"></td>
                                    <td>@if(Auth::user()->activo === 1)
                                            <button type="button" id="ofertar" data-toggle="modal" onclick="ofertar({{$of->id}})" class="btn btn-success admin tabla">Ofertar</button>
                                        @else
                                            <button type="button" id="ofertar" data-toggle="modal" data_target="#modalOfertar" disabled class="btn btn-success admin tabla">Ofertar</button>
                                        @endif</td>
                                </tr>
                            </tbody>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>

        <!-- Modal Nueva Oferta -->
<div class="modal fade" id="modalOfertar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ofertar</h4>
      </div>
      <div class="modal-body ofertar">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="formOfertar" method="POST" action="/usuario/contraOferta">
                                {{ csrf_field() }}

                                <input type="hidden" id="idco" name="idco" value="">
                                <div class="row">
                                    <center><h4>Ingrese la cantidad que desea comprar de la oferta seleccionada</h4>
                                    <p>Su Orden de Compra sera enviada al Oferente</p>
                                    <p>Éste la analizará y podrá aceptarla o rechazarla</p>
                                    <p>Se le informará sobre la decisión del Oferente</p>
                                    </center>
                                </div>
                                <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                    <label for="cantidad" class="col-md-2 control-label">Cantidad</label>

                                    <div class="col-md-10">
                                        <input id="cantidad" placeholder="Ingrese la cantidad que desea comprar" type="number" class="form-control" name="cantidad" min="1" value="{{ old('cantidad') }}" required autofocus>

                                        @if ($errors->has('cantidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cantidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row model">
                                    <button type="submit" class="btn btn-primary">Ofertar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    @endguest
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@stop