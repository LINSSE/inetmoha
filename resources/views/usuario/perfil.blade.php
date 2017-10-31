@extends('layouts.principal')

@section('content')
    <div class="container datos">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Datos</div>

                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/usuario/editarPerfil">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input disabled id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autofocus>

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
                                <input disabled id="apellido" type="text" class="form-control" name="apellido" value="{{ $user->apellido }}" >

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
                                <input disabled id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input disabled id="password" type="password" class="form-control" name="password" value="{{ $user->password }}" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input disabled id="dni" type="text" class="form-control" name="dni" value="{{ $user->dni }}"  maxlength="8" minlength="8" inputmode="numeric">

                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input disabled id="telefono" type="text" class="form-control" name="telefono" value="{{ $user->telefono }}"  maxlength="13" inputmode="numeric">

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('domicilio') ? ' has-error' : '' }}">
                            <label for="domicilio" class="col-md-4 control-label">Domicilio</label>

                            <div class="col-md-6">
                                <input disabled id="domicilio" type="text" class="form-control" name="domicilio" value="{{ $user->domicilio }}" >

                                @if ($errors->has('domicilio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domicilio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_provincia') ? ' has-error' : '' }}">
                            <label for="id_provincia" class="col-md-4 control-label">Provincia</label>

                            <div class="col-md-6">
                                @foreach($provincias as $provincia)
                                @if($user->id_provincia === $provincia->id)
                                <input type="text" class="form-control" disabled  value="{{$provincia->nombre}}">
                                @endif
                                @endforeach
                            </select>

                                @if ($errors->has('id_provincia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_provincia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('id_ciudad') ? ' has-error' : '' }}">
                            <label for="id_ciudad" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                @foreach($ciudades as $ciudad)
                                @if($user->id_ciudad === $ciudad->id)
                                <input type="text" class="form-control" disabled  value="{{$ciudad->nombre}}">
                                @endif
                                @endforeach
                            </select>

                                @if ($errors->has('id_ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-group{{ $errors->has('id_des') ? ' has-error' : '' }}">
                            <label for="id_des" class="col-md-4 control-label">Despachante</label>

                            <div class="col-md-6">
                                @foreach($despachantes as $despachante)
                                @if($user->id_des === $despachante->id)
                                <input type="text" class="form-control" disabled value="{{$despachante->apellido}} {{$despachante->nombre}}">
                                @endif
                                @endforeach
                            </select>


                                @if ($errors->has('id_des'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_des') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('id_rep') ? ' has-error' : '' }}">
                            <label for="id_rep" class="col-md-4 control-label">Representante</label>

                            <div class="col-md-6">
                                @foreach($representantes as $representante)
                                @if($user->id_rep === $representante->id)
                                <input type="text" class="form-control" disabled value="{{$representante->apellido}} {{$representante->nombre}}">
                                @endif
                                @endforeach

                                @if ($errors->has('id_rep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_rep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" disabled>Actualizar</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        </div>
        </div>
    </div>

     </div>   
@endsection