@extends('layouts.principal')

@section('content')
    @if(Session::has('rep'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('rep')}}</strong>
            </div>
        @endif
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <form class="form-horizontal" method="GET" action="/admin/buscarRepresentantes">
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
	</div>
	<div class="col-md-12 admin">
        <a type="button" id="agregarRep" data-toggle="modal" data_target="#agregarRepresentante" class="btn btn-success admin">Agregar</a>
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
                    @foreach($representantes as $rep)        
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="apellido" value="{{$rep->apellido}}" disabled></td>
                                    <td><input type="text" class="input-table" name="nombre" value="{{$rep->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="email" value="{{$rep->email}}" disabled></td>
                                    <td><input type="text" class="input-table" name="telefono" maxlength="8" minlength="8" inputmode="numeric" value="{{$rep->telefono}}" disabled></td>
                                    <td><a type="button" data-toggle="modal" onclick="eliminarRep({{$rep->id}})" class="btn btn-danger admin tabla" title="Eliminar Representante">X</a></td>
                                    </td>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
            </div>
    </div>

    <!-- Modal Representante -->
<div class="modal fade" id="agregarRepresentante" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Representante</h4>
      </div>
      <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="agregarRepresentante" method="POST" action="{{ url('representante/store') }}">
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

<!-- Modal Eliminar Representante -->
<div class="modal fade" id="eliminarRepresentante" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Eliminar Representante</h4>
        </div>
        <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="eliminarRepresentante" method="POST" action="/admin/representante/eliminar">
                                {{ csrf_field() }}
                                    <h4 class="info">El Representante a eliminar está asignado a uno o más oferentes. Su eliminación hará que estos oferentes pierdan esta asignación.

Si continúa con la eliminación es necesario elegir otro Representante para la reasignación.</h4>
                                    <input type="hidden" id="id" name="id" value="">
                                    <br>
                                    <div class="col-md-12">
                                        <select class="form-control" name="id_rep" value="{{ old('id_rep') }}" required>
                                            <option disabled selected value> -- Seleccione un Representante -- </option>
                                            @foreach($representantes as $representante)
                                            <option value="{{$representante->id}}">{{$representante->apellido}} {{$representante->nombre}}</option>
                                            @endforeach
                                        </select>
                                            @if ($errors->has('id_rep'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('id_rep') }}</strong>
                                                </span>
                                            @endif
                                    <hr>
                                    <div class="row model">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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