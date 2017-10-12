@extends('layouts.principal')

@section('content')
    @include('admin.menu')
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
                            <th>Estado </th>
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
                                    @foreach($ciudades as $ciudad)
                                    @if($ciudad->id === $user->id_ciudad)
                                        <td><input id="id_ciudad" type="text" class="input-table" name="id_ciudad" value="{{ $ciudad->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    @foreach($provincias as $provincia)
                                    @if($provincia->id === $user->id_provincia)
                                        <td><input id="id_provincia" type="text" class="input-table" name="id_provincia" value="{{ $provincia->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    @foreach($despachantes as $des)
                                    @if($des->id === $user->id_des)
                                        <td><input id="id_des" type="text" class="input-table" name="id_des" value="{{ $des->apellido}} {{$des->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    @foreach($representantes as $rep)
                                    @if($rep->id === $user->id_rep)
                                        <td><input id="id_rep" type="text" class="input-table" name="id_rep" value="{{ $rep->apellido}} {{ $rep->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    <td><button type="submit" class="btn btn-primary" >Activar</button></td>
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
                            <th>Estado </th>
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
                                    @foreach($ciudades as $ciudad)
                                    @if($ciudad->id === $user->id_ciudad)
                                        <td><input id="id_ciudad" type="text" class="input-table" name="id_ciudad" value="{{ $ciudad->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    @foreach($provincias as $provincia)
                                    @if($provincia->id === $user->id_provincia)
                                        <td><input id="id_provincia" type="text" class="input-table" name="id_provincia" value="{{ $provincia->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    @foreach($despachantes as $des)
                                    @if($des->id === $user->id_des)
                                        <td><input id="id_des" type="text" class="input-table" name="id_des" value="{{ $des->apellido}} {{$des->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    @foreach($representantes as $rep)
                                    @if($rep->id === $user->id_rep)
                                        <td><input id="id_rep" type="text" class="input-table" name="id_rep" value="{{ $rep->apellido}} {{ $rep->nombre }}" disabled></td>
                                    @endif
                                    @endforeach
                                    <td><button type="submit" class="btn btn-primary" >Desactivar</button></td>
                                </tr>
                            </tbody>
                        </form>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>

@endsection