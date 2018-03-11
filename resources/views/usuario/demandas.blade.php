@extends('layouts.principal')

@section('content')
@if(Session::has('demanda'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>{{Session::get('demanda')}}</strong>
    </div>
@endif
<div class="row">
    @if(Auth::user()->activo === 1)
        <button type="button" id="agregarDem" data-toggle="modal" data_target="#agregarDemanda" class="btn btn-success admin">Nueva Demanda</button>
    @else
        <button type="button" id="agregarDem" data-toggle="modal" disabled="" data_target="#agregarDemanda" class="btn btn-success admin">Nueva Demanda</button>
    @endif
    <div class="col-md-12">
                <h1 class="h1-tabla">Mis Demandas</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Modo</th>
                                <th>Cant. Original</th>
                                <th>Cant. Disponible</th>
                                <th>Precio</th>
                                <th>Fecha Fin</th>
                                <th>Puesto</th>
                                <th>Pago</th>
                                <th>Plazo (días)</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($demandas as $dem)
                            <tbody>
                                <tr>
                                    <form class="form-horizontal" name="eliminarDemandas" method="POST" action="/usuario/eliminarDemanda">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$dem->id}}">
                                    <td><input type="text" class="input-table" name="producto" value="{{$dem->producto->nombre}} {{$dem->producto->descripcion}} {{$dem->producto->descripcion2}}" disabled></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$dem->modo->descripcion}} X {{$dem->peso}} {{$dem->medida->descripcion}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="cantidado" value="{{$dem->cantidadOriginal}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$dem->cantidad}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="precio" value="$ {{$dem->precio}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="fechafin" value="{{$dem->fechaFin}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="puesto" value="{{$dem->puesto->descripcion}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="cobro" value="{{$dem->cobro->descripcion}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="plazo" value="{{$dem->plazo}}" readonly="true"></td>
                                    
                                    <td><a type="button" href="/usuario/detalleDemanda/{{$dem->id}}" class="btn btn-info admin tabla" title="Ver Contra-Demandas">Ver Contra Demandas</a></td>
                                    @if($dem->cantidad != $dem->cantidadOriginal)
                                        <td><button type="submit" class="btn btn-danger admin tabla" title="No puede eliminar esta Demanda porque ya tiene Operaciones Concretadas" disabled>X</button></td>
                                    @else
                                        <td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Demanda" >X</button></td>
                                    @endif

                                    </form>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
<hr>
<a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>

<!-- Modal Nueva Demanda -->
<div class="modal fade" id="agregarDemanda" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nueva Demanda</h4>
      </div>
      <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" id="formagregarDemanda" name="formagregarDemanda" method="POST" action="/usuario/nuevaDemanda">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('id_prod') ? ' has-error' : '' }}">
                                    <label for="id_prod" class="col-md-4 control-label">Producto</label>

                                    <div class="col-md-6">
                                    <select class="form-control" name="id_prod" value="{{ old('id_prod') }}" required autofocus="true">
                                        <option disabled selected hidden> -- Seleccione un Producto -- </option>
                                        @foreach($productos as $prod)
                                        <option value="{{$prod->id}}">{{$prod->nombre}} {{$prod->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_prod'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_prod') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('id_modo') ? ' has-error' : '' }}">
                                    <label for="id_modo" class="col-md-2 control-label">Modo</label>

                                    <div class="col-md-4">
                                    <select class="form-control" name="id_modo" value="{{ old('id_modo') }}" required>
                                        <option disabled selected hidden> -- Modo -- </option>
                                        @foreach ($modos as $modo)
                                        <option value="{{$modo->id}}" >{{$modo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_modo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_modo') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    <div class="col-md-1 chico">
                                        <p class="texto-plano">X</p>
                                    </div>
                                    <div class="col-md-2">
                                    <input id="peso" placeholder="20" type="number" class="form-control" name="peso" min="1" value="{{ old('peso') }}" required >

                                    @if ($errors->has('peso'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('peso') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="id_medida" name="id_medida" value="{{ old('id_medida') }}" required>
                                            <option disabled selected hidden>U. Medida</option>
                                            @foreach($medidas as $medida)
                                            <option value="{{$medida->id}}">{{$medida->descripcion}}</option>
                                            
                                            @endforeach
                                        </select>

                                            @if ($errors->has('medida'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('medida') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                    <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                    <div class="col-md-6">
                                        <input id="cantidad" placeholder="Cantidad Demandada" type="number" class="form-control" name="cantidad" min="1" value="{{ old('cantidad') }}" required>

                                        @if ($errors->has('cantidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cantidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                                    <label for="precio" class="col-md-4 control-label">Precio $</label>

                                    <div class="col-md-6">
                                        <input id="precio" placeholder="Precio" type="number" class="form-control" name="precio" min="1" value="{{ old('precio') }}" required>

                                        @if ($errors->has('precio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('precio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                    <label for="fechadi" class="col-md-4 control-label">Fecha Inicio</label>

                                    <div class="col-md-6">
                                        <input id="fechadi" placeholder="Fecha Inicio de Demanda" onfocus="(this.type='date')" type="text" class="form-control" onblur="if(this.value==''){this.type='text'}" name="fechadi" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>" value=""  required>

                                        @if ($errors->has('fechadi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fechadi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fechadf') ? ' has-error' : '' }}">
                                    <label for="fechadf" class="col-md-4 control-label">Fecha Fin</label>

                                    <div class="col-md-6">
                                        <input id="fechadf" placeholder="Fecha Fin de Demanda" onfocus="(this.type='date')" type="text" class="form-control" onblur="if(this.value==''){this.type='text'}" name="fechadf" value="{{ old('fechad') }}" min="" disabled="true" title="Primero seleccione una Fecha de Inicio de la Demanda" required>

                                        @if ($errors->has('fechadf'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fechadf') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('puesto') ? ' has-error' : '' }}">
                                    <label for="puesto" class="col-md-4 control-label">Puesto</label>

                                    <div class="col-md-6">
                                    <select class="form-control" name="puesto" value="{{ old('puesto') }}" required>
                                        <option disabled selected hidden> -- Producto Puesto en -- </option>
                                        @foreach ($puestos as $puesto)
                                        <option value="{{$puesto->id}}" >{{$puesto->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_prod'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_prod') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    <span class="glyphicon glyphicon-info-sign" alt="Indicar donde se colocara el Producto" title="Indicar donde se colocara el Producto"></span>
                                </div>
                                <hr class="hrblanco">
                                <div class="form-group{{ $errors->has('cobro') ? ' has-error' : '' }}">
                                    <label for="cobro" class="col-md-4 control-label">Pago</label>

                                    <div class="col-md-6">
                                    <select class="form-control" name="cobro" value="{{ old('cobro') }}" required>
                                        <option disabled selected hidden> -- Forma de Pago -- </option>
                                        @foreach ($cobros as $cobro)
                                        <option value="{{$cobro->id}}" >{{$cobro->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('cobro'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cobro') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    <span class="glyphicon glyphicon-info-sign" alt="Indicar la forma de Pago que desea" title="Indicar la forma de Pago que desea"></span>

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                        <ul class="filtro-usu">
                                            <label>
                                                <input type="checkbox" name="plazo" value="Contado" checked=""> Contado    
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox" name="plazo" value="30"> 30 días    
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox" name="plazo" value="60"> 60 días    
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> 
                                                <input type="checkbox" name="plazo" value="90"> 90 días    
                                            </label>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hrblanco">

                                    <div class="row model">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                
                            </form>
                        </div>
                    </div>      
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection