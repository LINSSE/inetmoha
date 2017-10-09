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
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->dni}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->domicilio}}</td>
                                    <td>{{$user->id_ciudad}}</td>
                                    <td>{{$user->id_provincia}}</td>
                                    <td>{{$user->id_des}}</td>
                                    <td>{{$user->id_rep}}</td>
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
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->dni}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->domicilio}}</td>
                                    <td>{{$user->id_ciudad}}</td>
                                    <td>{{$user->id_provincia}}</td>
                                    <td>{{$user->id_des}}</td>
                                    <td>{{$user->id_rep}}</td>
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