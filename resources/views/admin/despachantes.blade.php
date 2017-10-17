@extends('layouts.principal')

@section('content')
    @include('admin.menu')
    <div class="row">
    <h4 class="h4tit">Despachantes</h4>
    <br>
    <a type="button" id="agregarDesp" data-toggle="modal" data_target="#agregarDespachante" class="btn btn-success admin">Agregar</a>
	</div>
	<div class="col-md-12 admin">
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apellido </th>
                            <th>Nombre </th>
                            <th>Email </th>
                            <th>Telefono </th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($despachantes as $desp)        
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="apellido" value="{{$desp->apellido}}" disabled></td>
                                    <td><input type="text" class="input-table" name="nombre" value="{{$desp->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="email" value="{{$desp->email}}" disabled></td>
                                    <td><input type="text" class="input-table" name="telefono" maxlength="8" minlength="8" inputmode="numeric" value="{{$desp->telefono}}" disabled></td>
                                    <td><a type="button" id="eliminarDesp" data-toggle="modal" data_target="#eliminarDespachante" data-id="{{$desp->id}}" class="btn btn-success admin">Eliminar</a>
                                    </td>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
            </div>
    </div>

    <!-- Modal Despachante -->
<div class="modal fade" id="agregarDespachante" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Despachante</h4>
      </div>
      <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="agregarDespachante" method="POST" action="{{ url('despachante/store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                    <label for="apellido" class="col-md-4 control-label">Apellido</label>

                                    <div class="col-md-6">
                                        <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required>

                                        @if ($errors->has('apellido'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('apellido') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                

                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                    <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required maxlength="13" inputmode="numeric">

                                        @if ($errors->has('telefono'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('telefono') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                    
                                    <div class="row model">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
        </div>
      
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Eliminar Despachante -->
<div class="modal fade" id="eliminarDespachante" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Eliminar Despachante</h4>
        </div>
        <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="eliminarDespachante" method="POST" action="{{ url('despachante/eliminar') }}">
                                {{ csrf_field() }}

                                
                                    
                                    <div class="row model">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
   </div>
</div>
@endsection