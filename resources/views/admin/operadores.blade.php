@extends('layouts.principal')

@section('content')
    @include('admin.menu')
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
                            <th>Activo </th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
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
                            <td>
                                @if($user->activo === 0)
                                    <input type="checkbox" name="activo" >
                                @else
                                    <input type="checkbox" name="activo" checked="true">
                                @endif
                            </td>
                        </tr>
                        
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
@endsection