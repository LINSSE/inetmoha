@extends('layouts.principal')

@section('content')
    <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <form class="form-horizontal" method="GET" action="/admin/buscarOperadores">
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
    <br>
    <h4 class="h4tit">Operadores Inactivos</h4>
	<div class="col-md-12 admin">
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apellido </th>
                            <th>Nombre </th>
                            <th>Email </th>
                            <th>DNI </th>
                            <th>Telefono </th>
                            <th>Domicilio </th>
                            <th>Ciudad </th>
                            <th>Provincia </th>
                            <th>Despachante </th>
                            <th>Representante </th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    @if ($user->activo === 0)
                        <form class="form-horizontal" method="POST" action="/admin/activar/{{$user->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="apellido" value="{{$user->apellido}}" disabled></td>
                                    <td><input type="text" class="input-table" name="name" value="{{$user->name}}" disabled></td>
                                    <td><input type="email" class="input-table" name="email" value="{{$user->email}}" disabled></td>
                                    <td><input type="text" class="input-table" name="dni" value="{{ $user->dni }}" disabled maxlength="8" minlength="8" inputmode="numeric"></td>
                                    <td><input id="telefono" type="text" class="input-table" name="telefono" value="{{ $user->telefono }}" disabled maxlength="13" inputmode="numeric"></td>
                                    <td><input id="domicilio" type="text" class="input-table" name="domicilio" value="{{ $user->domicilio }}" disabled></td>
                                    <td><input id="id_ciudad" type="text" class="input-table" name="id_ciudad" value="{{ $user->ciudad->nombre }}" disabled></td>
                                    <td><input id="id_provincia" type="text" class="input-table" name="id_provincia" value="{{ $user->provincia->nombre }}" disabled></td>
                                    <td><input id="id_des" type="text" class="input-table" name="id_des" value="{{ $user->despachante->apellido}} {{$user->despachante->nombre }}" disabled></td>
                                    <td><input id="id_rep" type="text" class="input-table" name="id_rep" value="{{ $user->representante->apellido}} {{ $user->representante->nombre }}" disabled></td>
                                    <td><button type="submit" class="btn btn-success" title="Haga click para ACTIVAR éste Operador">Activar</button></td>
                                </tr>
                            </tbody>
                        </form>
                    @endif
                    @endforeach
                </table>
        </div>
        <hr>
    </div>
    
    <h4 class="h4tit">Operadores Activos</h4>
    <div class="col-md-12 admin">
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apellido </th>
                            <th>Nombre </th>
                            <th>Email </th>
                            <th>DNI </th>
                            <th>Telefono </th>
                            <th>Domicilio </th>
                            <th>Ciudad </th>
                            <th>Provincia </th>
                            <th>Despachante </th>
                            <th>Representante </th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    @if ($user->activo === 1)
                        <form class="form-horizontal" method="POST" action="/admin/desactivar/{{$user->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="apellido" value="{{$user->apellido}}" disabled></td>
                                    <td><input type="text" class="input-table" name="name" value="{{$user->name}}" disabled></td>
                                    <td><input type="email" class="input-table" name="email" value="{{$user->email}}" disabled></td>
                                    <td><input type="text" class="input-table" name="dni" value="{{ $user->dni }}" disabled maxlength="8" minlength="8" inputmode="numeric"></td>
                                    <td><input id="telefono" type="text" class="input-table" name="telefono" value="{{ $user->telefono }}" disabled maxlength="13" inputmode="numeric"></td>
                                    <td><input id="domicilio" type="text" class="input-table" name="domicilio" value="{{ $user->domicilio }}" disabled></td>
                                    <td><input id="id_ciudad" type="text" class="input-table" name="id_ciudad" value="{{ $user->ciudad->nombre }}" disabled></td>
                                    <td><input id="id_provincia" type="text" class="input-table" name="id_provincia" value="{{ $user->provincia->nombre }}" disabled></td>
                                    <td><a type="button" data-toggle="modal" onclick="eliminarDesp({{$user->id}})" class="glyphicon glyphicon-pencil" title="Haga click para Asignar otro Despachante a este Operador"></a><input id="id_des" type="text" class="input-table" name="id_des" value="{{ $user->despachante->apellido}} {{$user->despachante->nombre }}" disabled></td>
                                    <td><input id="id_rep" type="text" class="input-table" name="id_rep" value="{{ $user->representante->apellido}} {{ $user->representante->nombre }}" disabled></td>
                                    <td><button type="submit" class="btn btn-danger" title="Haga click para DESACTIVAR éste Operador">Desactivar</button></a></td>
                                </tr>
                            </tbody>
                        </form>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
<!-- Modal Eliminar Despachante -->
<div class="modal fade" id="eliminarDespachante" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Asignar Despachante</h4>
        </div>
        <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           
                            <form class="form-horizontal" method="POST" action="/admin/reasignar">
                                {{ csrf_field() }}

                                    <input type="hidden" id="id" name="id" value="">
                                    <h4>Asignar un Despachante</h4>
                                    <div class="col-md-12">
                                        <select class="form-control" name="id_des" value="{{ old('id_des') }}" required>
                                            <option disabled selected value> -- Seleccione un Despachante -- </option>
                                            @foreach($despachantes as $despachante)
                                            <option value="{{$despachante->id}}">{{$despachante->apellido}} {{$despachante->nombre}}</option>
                                            @endforeach
                                        </select>
                                            @if ($errors->has('id_des'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('id_des') }}</strong>
                                                </span>
                                            @endif
                                    <hr>
                                    <div class="row model">
                                        <button type="submit" class="btn btn-primary">Asignar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
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