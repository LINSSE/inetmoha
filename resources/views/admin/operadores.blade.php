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
                <div class="checkbox">
                    <ul class="filtro-usu">
                        <label>
                            Filtrar por Tipos de Usuarios    
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                            <input type="checkbox" name="usuarios[]" value="1"> Operadores    
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                            <input type="checkbox" name="usuarios[]" value="2"> Despachantes    
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label> 
                            <input type="checkbox" name="usuarios[]" value="3"> Representantes    
                        </label>
                    </ul>
                </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
    <h4 class="h4tit">Usuarios Inactivos</h4>
	<div class="col-md-12 admin">
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apellido </th>
                            <th>Nombre </th>
                            <th>Razón Social </th>
                            <th>Email </th>
                            <th>DNI/CUIT </th>
                            <th>Teléfono </th>
                            <th>Domicilio </th>
                            <th>Ciudad </th>
                            <th>Provincia </th>
                            <th>Tipo de Usuario</th>
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
                                    <td><input type="text" class="input-table" name="razonsocial" value="{{ $user->razonsocial }}" disabled></td>
                                    <td><input type="email" class="input-table" name="email" value="{{$user->email}}" disabled></td>
                                    <td><input type="text" class="input-table" name="dni" value="{{ $user->dni }}" disabled maxlength="8" minlength="8" inputmode="numeric"></td>
                                    <td><input id="telefono" type="text" class="input-table" name="telefono" value="{{ $user->telefono }}" disabled maxlength="13" inputmode="numeric"></td>
                                    <td><input id="domicilio" type="text" class="input-table" name="domicilio" value="{{ $user->domicilio }}" disabled></td>
                                    <td><input id="id_ciudad" type="text" class="input-table" name="id_ciudad" value="{{ $user->ciudad->nombre }}" disabled></td>
                                    <td><input id="id_provincia" type="text" class="input-table" name="id_provincia" value="{{ $user->provincia->nombre }}" disabled></td>
                                    <td><input id="tipo_us" type="text" class="input-table" name="tipo_us" value="{{ $user->tipoUsuario->descripcion}}" disabled></td>
                                    <td><button type="submit" class="btn btn-success" title="Haga click para ACTIVAR éste Operador">Activar</button></td>
                                </tr>
                            </tbody>
                        </form>
                    @endif
                    @endforeach
                </table>
            </div>
    </div>
    </div>
    <hr>
    <div class="row">
    <h4 class="h4tit">Usuarios Activos</h4>
    <div class="col-md-12 admin">
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apellido </th>
                            <th>Nombre </th>
                            <th>Razón Social </th>
                            <th>Email </th>
                            <th>DNI/CUIT </th>
                            <th>Teléfono </th>
                            <th>Domicilio </th>
                            <th>Ciudad </th>
                            <th>Provincia </th>
                            <th>Tipo de Usuario</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    @if ($user->activo === 1 and $user->admin === 0)
                        <form class="form-horizontal" method="POST" action="/admin/desactivar/{{$user->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="apellido" value="{{$user->apellido}}" disabled></td>
                                    <td><input type="text" class="input-table" name="name" value="{{$user->name}}" disabled></td>
                                    <td><input type="text" class="input-table" name="razonsocial" value="{{$user->razonsocial}}" disabled></td>
                                    <td><input type="email" class="input-table" name="email" value="{{$user->email}}" disabled></td>
                                    <td><input type="text" class="input-table" name="dni" value="{{ $user->dni }}" disabled maxlength="8" minlength="8" inputmode="numeric"></td>
                                    <td><input id="telefono" type="text" class="input-table" name="telefono" value="{{ $user->telefono }}" disabled maxlength="13" inputmode="numeric"></td>
                                    <td><input id="domicilio" type="text" class="input-table" name="domicilio" value="{{ $user->domicilio }}" disabled></td>
                                    <td><input id="id_ciudad" type="text" class="input-table" name="id_ciudad" value="{{ $user->ciudad->nombre }}" disabled></td>
                                    <td><input id="id_provincia" type="text" class="input-table" name="id_provincia" value="{{ $user->provincia->nombre }}" disabled></td>
                                    <td><input id="tipo_us" type="text" class="input-table" name="tipo_us" value="{{ $user->tipoUsuario->descripcion}}" disabled></td>
                                    <td><button type="submit" class="btn btn-danger" title="Haga click para DESACTIVAR éste Operador">Desactivar</button></a></td>
                                </tr>
                            </tbody>
                        </form>
                    @endif
                    @endforeach
                </table>
            </div>
    </div>
    </div>
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@endsection