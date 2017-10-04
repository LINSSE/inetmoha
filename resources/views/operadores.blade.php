@extends('layouts.principal')

@section('content')
	<div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Apellido </th>
                            <th>Nombre </th>
                            <th>Email </th>
                            <th>DNI </th>
                            <th>Telefono </th>
                            <th>Domicilio </th>
                            <th>Ciuedad </th>
                            <th>Provincia </th>
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
                            <td>{{$user->ciudad}}</td>
                            <td>{{$user->provincia}}</td>
                        </tr>
                        
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
@endsection