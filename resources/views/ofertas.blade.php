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
                                <th>Modo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Fecha Fin</th>
                                <th>Operador</th>
                                <th>Puesto</th>
                                <th>Cobro</th>
                                <th>Plazo (días)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ofertas as $of)
                            @if($of->abierta === 0)
                            
                                <tr>
                                    <input type="hidden" name="id" value="{{$of->id}}">
                                    <input type="hidden" name="iduser" value="{{$of->user->id}}">
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->producto->nombre}} {{$of->producto->descripcion}} {{$of->producto->descripcion2}}" disabled></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$of->modo->descripcion}} X {{$of->peso}} {{$of->medida->descripcion}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$of->cantidad}}" disabled></td>
                                    <td><input type="text" class="input-table" name="precio" value="$ {{$of->precio}}" disabled></td>
                                    <td><input type="text" class="input-table" name="fechaFin" value="{{$of->fechaFin}}" disabled></td>
                                    @if($of->user->razonsocial === '')
                                    <td><input type="text" class="input-table" name="operador" value="{{$of->user->apellido}} {{$of->user->name}}" disabled></td>
                                    @else
                                    <td><input type="text" class="input-table" name="operador" value="{{$of->user->razonsocial}}" disabled></td>
                                    @endif
                                    <td><input type="text" class="input-table" name="puesto" value="{{$of->puesto->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cobro" value="{{$of->cobro->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="plazo" value="{{$of->plazo}}" disabled></td>
                                    <td>@if(Auth::user()->activo === 1 && Auth::user()->id != $of->user->id)
                                            <button type="button" id="ofertar" data-toggle="modal" onclick="ofertar({{$of->id}},{{$of->cantidad}},{{$of->precio}},{{$of->plazo}})" class="btn btn-success admin tabla">Ofertar</button>
                                        @else
                                            <button type="button" id="ofertar" data-toggle="modal" data_target="#modalOfertar" disabled class="btn btn-success admin tabla" title="Su Usuario no está ACTIVO o esta Oferta es suya">Ofertar</button>
                                        @endif</td>
                                </tr>
                            
                            @endif
                        @endforeach
                        </tbody>
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
                                <th>Precio</th>
                                <th>Fecha Fin</th>
                                <th>Operador</th>
                                <th>Puesto</th>
                                <th>Cobro</th>
                                <th>Plazo (días)</th>
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
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->producto->nombre}} {{$of->producto->descripcion}} {{$of->producto->descripcion2}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$of->cantidad}} {{$of->producto->medida->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="precio" value="$ {{$of->precio}}" disabled></td>
                                    <td><input type="text" class="input-table" name="fechaFin" value="{{$of->fechaFin}}" disabled></td>
                                    @if($of->user->razonsocial === '')
                                        <td><input type="text" class="input-table" name="operador" value="{{$of->user->apellido}} {{$of->user->name}}" disabled></td>
                                    @else
                                        <td><input type="text" class="input-table" name="operador" value="{{$of->user->razonsocial}}" disabled></td>
                                    @endif
                                    <td><input type="text" class="input-table" name="puesto" value="{{$of->puesto}}" disabled></td>
                                    <td><input type="text" class="input-table" name="cobro" value="{{$of->cobro}}" disabled></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$of->modo}}" readonly="true"></td>
                                    <td>@if(Auth::user()->activo === 1)
                                            <button type="button" id="ofertar" data-toggle="modal" onclick="ofertar({{$of->id}},{{$of->cantidad}})" class="btn btn-success admin tabla">Ofertar</button>
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

        <!-- Modal Ofertar -->
<div class="modal fade" id="modalOfertar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ofertar</h4>
      </div>
      <div class="modal-body ofertar">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="formOfertar" id="formOfertar" method="POST" action="/usuario/contraOferta">
                                {{ csrf_field() }}

                                <input type="hidden" id="id_oferta" name="id_oferta" value="">
                                <input type="hidden" id="cantOferta" name="cantOferta" value="">
                                <div class="row">
                                    <center><h4>Ingrese la Cantidad que desea comprar y Forma de Pago</h4>
                                    <p>Su Orden de Compra sera enviada al Oferente</p>
                                    <p>Éste la analizará y podrá aceptarla o rechazarla</p>
                                    <p>Se le informará sobre la decisión del Oferente</p>
                                    </center>
                                </div>
                                <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                    <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                    <div class="col-md-6">
                                        <input id="cantidadCo" placeholder="Ingrese la Cantidad a Comprar" type="number" class="form-control" name="cantidadCo" min="1" value="{{ old('cantidad') }}" required autofocus>

                                        @if ($errors->has('cantidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cantidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                                    <label for="precio" class="col-md-4 control-label">Precio</label>

                                    <div class="col-md-6">
                                        <input id="precioCo" placeholder="Precio" type="number" class="form-control" name="precioCo" min="1" value="{{ old('precio') }}" required autofocus>

                                        @if ($errors->has('precio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('precio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('cobroCo') ? ' has-error' : '' }}">
                                    <label for="cobroCo" class="col-md-4 control-label">Cobro</label>

                                    <div class="col-md-6">
                                    <select class="form-control" name="cobroCo" value="{{ old('cobroCo') }}" required>
                                        <option disabled selected hidden> -- Forma de Cobro -- </option>
                                        @foreach ($cobros as $cobro)
                                        <option value="{{$cobro->id}}" >{{$cobro->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('cobroCo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cobroCo') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    <span class="glyphicon glyphicon-info-sign" alt="Indicar la forma de Cobro que desea" title="Indicar la forma de Cobro que desea"></span>
                                <div class="col-md-12">
                                        <div class="checkbox">
                                        <ul class="filtro-usu">
                                            <label>
                                                <input type="checkbox" name="plazoCo" value="Contado" checked=""> Contado    
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox" name="plazoCo" value="30"> 30 días    
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox" name="plazoCo" value="60"> 60 días    
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> 
                                                <input type="checkbox" name="plazoCo" value="90"> 90 días    
                                            </label>
                                        </ul>
                                        </div>
                                        <hr class="hrblanco">
                                    </div>

                                <div class="row model">
                                    <button type="submit" class="btn btn-primary">Ofertar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    @endguest
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@stop