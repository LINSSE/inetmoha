@extends('layouts.principal')

@section('content')
	<div class="row">
        @if($activo === 1)
            <button type="button" id="agregarDemanda" data-toggle="modal" data_target="#nuevaDemanda" class="btn btn-success admin">Nueva Demanda</button>
        @else
            <button type="button" id="agregarDemanda" data-toggle="modal" disabled="" data_target="#nuevaDemanda" class="btn btn-success admin">Nueva Demanda</button>
        @endif
		
            <div class="col-md-12">
                <h1 class="h1-tabla">Mis Demandas</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Pago</th>
                                <th>Destino</th>
                                <th>Modo</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($demandas as $dem)
	                        <tbody>
	                            <tr>
	                            	<form class="form-horizontal" name="eliminarDemanda" method="POST" action="/usuario/eliminarDemanda">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$dem->id}}">
	                            	<td><input type="text" class="input-table" name="producto" value="{{$dem->producto->nombre}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="cantidad" value="{{$dem->cantidad}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="precio" value="{{$dem->precio}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="pago" value="{{$dem->pago}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="destino" value="{{$dem->destino}}" readonly="true"></td>
	                            	<td><input type="text" class="input-table" name="modo" value="{{$dem->modo}}" readonly="true"></td>
	                            	<td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Demanda">X</button></td>
	                            	</form>
	                            </tr>
	                        </tbody>
	                    @endforeach
                    </table>
                </div>
            </div>
    </div>

    <!-- Modal Nueva Demanda -->
<div class="modal fade" id="nuevaDemanda" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content oferta">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nueva Demanda</h4>
      </div>
      <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="nuevaDemanda" method="POST" action="/usuario/nuevaDemanda">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('id_prod') ? ' has-error' : '' }}">
                                    <label for="id_prod" class="col-md-4 control-label">Producto</label>

                                    <div class="col-md-6">
	                                <select class="form-control" name="id_prod" value="{{ old('id_prod') }}" required>
	                                    <option disabled selected value> -- Seleccione un Producto -- </option>
	                                    @foreach($productos as $prod)
	                                    <option value="{{$prod->id}}">{{$prod->nombre}}</option>
	                                    @endforeach
	                                </select>
	                                @if ($errors->has('id_prod'))
	                                    <span class="help-block">
	                                	    <strong>{{ $errors->first('id_prod') }}</strong>
	                                        </span>
	                                @endif
	                            	</div>
	                            </div>

                                <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                    <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                    <div class="col-md-6">
                                        <input id="cantidad" placeholder="Cantidad Demandada" type="number" class="form-control" name="cantidad" min="1" value="{{ old('cantidad') }}" required autofocus>

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
                                        <input id="precio" placeholder="Precio" type="number" class="form-control" name="precio" min="1" value="{{ old('precio') }}" required autofocus>

                                        @if ($errors->has('precio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('precio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

	                            <div class="form-group{{ $errors->has('pago') ? ' has-error' : '' }}">
                                    <label for="pago" class="col-md-4 control-label">Pago</label>

                                    <div class="col-md-6">
	                                <select class="form-control" name="pago" value="{{ old('pago') }}" required>
	                                    <option disabled selected value> -- Forma de Pago -- </option>
	                                    <option value="1" >Contado</option>
	                                    <option value="2">CPD</option>
	                                    <option value="3">Com</option>
	                                    <option value="4">Efectivo</option>
	                                </select>
	                                @if ($errors->has('pago'))
	                                    <span class="help-block">
	                                	    <strong>{{ $errors->first('pago') }}</strong>
	                                        </span>
	                                @endif
	                            	</div>
	                            	<span class="glyphicon glyphicon-info-sign" alt="Indicar la forma de Pago que desea" title="Indicar la forma de Pago que desea"></span>
	                            </div>

	                            <div class="form-group{{ $errors->has('destino') ? ' has-error' : '' }}">
                                    <label for="destino" class="col-md-4 control-label">Destino</label>

                                    <div class="col-md-6">
	                                <select class="form-control" name="destino" value="{{ old('destino') }}" required>
	                                    <option disabled selected value> -- Destino -- </option>
	                                    <option value="1" >Buenos Aires</option>
	                                    <option value="2">Rosario</option>
	                                    <option value="3">Córdoba</option>
	                                    <option value="4">Barranquera</option>
	                                    <option value="5">Corrientes</option>
	                                </select>
	                                @if ($errors->has('destino'))
	                                    <span class="help-block">
	                                	    <strong>{{ $errors->first('destino') }}</strong>
	                                        </span>
	                                @endif
	                            	</div>
	                            	<span class="glyphicon glyphicon-info-sign" alt="Indicar el Destino" title="Indicar el Destino"></span>
	                            </div>	

	                            <div class="form-group{{ $errors->has('modo') ? ' has-error' : '' }}">
                                    <label for="modo" class="col-md-4 control-label">Modo</label>

                                    <div class="col-md-6">
	                                <select class="form-control" name="modo" value="{{ old('modo') }}" required>
	                                    <option disabled selected value> -- Modo de Presentación -- </option>
	                                    <option value="1" >Raso</option>
	                                    <option value="2">Embalado</option>
	                                    <option value="3">Abierto</option>
	                                </select>
	                                @if ($errors->has('modo'))
	                                    <span class="help-block">
	                                	    <strong>{{ $errors->first('modo') }}</strong>
	                                        </span>
	                                @endif
	                            	</div>
	                            	<span class="glyphicon glyphicon-info-sign" alt="Indicar el Modo de Presentación del Producto" title="Indicar el Modo de Presentación del Producto"></span>
	                            </div>	

                                    <div class="row model">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
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
@endsection