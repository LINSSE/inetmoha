@extends('layouts.principal')

@section('content')
        
        @include('usuario.menu')
    <div class="container datos">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Datos</div>

                <div class="panel-body">
                <form class="form-horizontal" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled autofocus>

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
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $user->apellido }}" disabled>

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>

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
                                <input id="password" type="password" class="form-control" name="password" value="{{ $user->password }}" disabled>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" disabled>
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" value="{{ $user->dni }}" disabled maxlength="8" minlength="8" inputmode="numeric">

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
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $user->telefono }}" disabled maxlength="13" inputmode="numeric">

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
                                <input id="domicilio" type="text" class="form-control" name="domicilio" value="{{ $user->domicilio }}" disabled>

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
                            <input id="id_provincia" type="text" class="form-control" name="id_provincia" value="{{ $provincia->nombre }}" disabled>

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
                            <input id="id_ciudad" type="text" class="form-control" name="id_ciudad" value="{{ $ciudad->nombre }}" disabled>

                                @if ($errors->has('id_ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-group{{ $errors->has('despachante') ? ' has-error' : '' }}">
                            <label for="despachante" class="col-md-4 control-label">Despachante</label>

                            <div class="col-md-6">
                            <input id="id_des" type="text" class="form-control" name="id_des" value="{{ $despachante->apellido, $despachante->nombre }}" disabled>

                                @if ($errors->has('despachante'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('despachante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
                            <label for="representante" class="col-md-4 control-label">Representante</label>
                            <div class="col-md-6">
                            <input id="id_rep" type="text" class="form-control" name="id_rep" value="{{ $representante->apellido}} {{ $representante->nombre }}" disabled>

                                @if ($errors->has('representante'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('representante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" disabled="">
                                    Actualizar
                                </button>
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