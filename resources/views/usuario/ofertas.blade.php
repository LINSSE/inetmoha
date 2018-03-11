@extends('layouts.principal')

@section('content')
	@if(Session::has('oferta'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('oferta')}}</strong>
            </div>
        @endif
	<div class="row">
        @if(Auth::user()->activo === 1)
            <button type="button" id="agregarOfer" data-toggle="modal" data_target="#agregarOferta" class="btn btn-success admin">Nueva Oferta</button>
        @else
            <button type="button" id="agregarOfer" data-toggle="modal" disabled="" data_target="#agregarOferta" class="btn btn-success admin">Nueva Oferta</button>
        @endif
		
            <div class="col-md-12">
                <h1 class="h1-tabla">Mis Ofertas</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Modo</th>
                                <th>Cant. Original</th>
                                <th>Cant. Disponible</th>
                                <th>Precio</th>
                                <th>Fecha Fin</th>
                                <th>Puesto</th>
                                <th>Cobro</th>
                                <th>Plazo (días)</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($ofertas as $of)
	                        <tbody>
	                            <tr>
	                            	<form class="form-horizontal" name="eliminarOferta" method="POST" action="/usuario/eliminarOferta">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$of->id}}">
	                            	<td><input type="text" class="input-table" name="producto" value="{{$of->producto->nombre}} {{$of->producto->descripcion}} {{$of->producto->descripcion2}}" disabled></td>
                                    <td><input type="text" class="input-table" name="modo" value="{{$of->modo->descripcion}} X {{$of->peso}} {{$of->medida->descripcion}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="cantidado" value="{{$of->cantidadOriginal}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="cantidad" value="{{$of->cantidad}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="precio" value="$ {{$of->precio}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="fechafin" value="{{$of->fechaFin}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="puesto" value="{{$of->puesto->descripcion}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="cobro" value="{{$of->cobro->descripcion}}" readonly="true"></td>
                                    <td><input type="text" class="input-table" name="plazo" value="{{$of->plazo}}" readonly="true"></td>
	                            	
                                    <td><a type="button" href="/usuario/detalleOferta/{{$of->id}}" class="btn btn-info admin tabla" title="Ver Contra-Ofertas">Ver Contra Ofertas</a></td>
	                            	@if($of->cantidad != $of->cantidadOriginal)
                                        <td><button type="submit" class="btn btn-danger admin tabla" title="No puede eliminar esta Oferta porque ya tiene Operaciones Concretadas" disabled>X</button></td>
                                    @else
                                        <td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Oferta" >X</button></td>
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
        
    <!-- Modal Nueva Oferta -->
<div class="modal fade" id="agregarOferta" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nueva Oferta</h4>
      </div>
      <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" id="formagregarOferta" name="formagregarOferta" method="POST" action="/usuario/nuevaOferta">
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
                                        <input id="cantidad" placeholder="Cantidad Ofrecida" type="number" class="form-control" name="cantidad" min="1" value="{{ old('cantidad') }}" required>

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
                                    <label for="fecha" class="col-md-4 control-label">Fecha Inicio</label>

                                    <div class="col-md-6">
                                        <input id="fecha" placeholder="Fecha Inicio de Oferta" onfocus="(this.type='date')" type="text" class="form-control" onblur="if(this.value==''){this.type='text'}" name="fecha" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>" value=""  required>

                                        @if ($errors->has('fecha'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fecha') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fechaf') ? ' has-error' : '' }}">
                                    <label for="fechaf" class="col-md-4 control-label">Fecha Fin</label>

                                    <div class="col-md-6">
                                        <input id="fechaf" placeholder="Fecha Fin de Oferta" onfocus="(this.type='date')" type="text" class="form-control" onblur="if(this.value==''){this.type='text'}" name="fechaf" value="{{ old('fechaf') }}" min="" disabled="true" title="Primero seleccione una Fecha de Inicio de la Oferta" required>

                                        @if ($errors->has('fechaf'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fechaf') }}</strong>
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
                                    <label for="cobro" class="col-md-4 control-label">Cobro</label>

                                    <div class="col-md-6">
	                                <select class="form-control" name="cobro" value="{{ old('cobro') }}" required>
	                                    <option disabled selected hidden> -- Forma de Cobro -- </option>
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
	                            	<span class="glyphicon glyphicon-info-sign" alt="Indicar la forma de Cobro que desea" title="Indicar la forma de Cobro que desea"></span>

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