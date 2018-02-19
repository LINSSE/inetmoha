@extends('layouts.principal')

@section('content')
@if(Session::has('desp'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('desp')}}</strong>
            </div>
    @elseif(Session::has('rep'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('rep')}}</strong>
            </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-md-4 control-label">DNI/CUIT</label>

                            <div class="col-md-6">
                                <input id="dni" type="tel" class="form-control" name="dni" value="{{ old('dni') }}" required autofocus maxlength="11" minlength="8" inputmode="numeric" placeholder="Ingrese DNI o CUIT según corresponda" title="Ingrese DNI o CUIT según corresponda">

                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="glyphicon glyphicon-info-sign" alt="Ingrese solo números" title="Ingrese solo números"></span>
                        </div>

                        <div class="form-group{{ $errors->has('razonsocial') ? ' has-error' : '' }}">
                            <label for="razonsocial" class="col-md-4 control-label">Razón Social</label>

                            <div class="col-md-6">
                                <input id="razonsocial" type="text" class="form-control" name="razonsocial" value="{{ old('razonsocial') }}" placeholder="Ingrese Razón Social si corresponde">

                                @if ($errors->has('razonsocial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('razonsocial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required>

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
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" placeholder="Apellido" required>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required>

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
                                <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}" required minlength="6" maxlength="13" inputmode="numeric" placeholder="Teléfono">

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
                                <input id="domicilio" type="text" class="form-control" name="domicilio" value="{{ old('domicilio') }}" placeholder="Domicilio" required>

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
                            <select class="form-control" id="provincias" name="id_provincia" value="{{ old('id_provincia') }}" required>
                                <option disabled selected hidden> -- Seleccione una Provincia -- </option>
                                @foreach($provincias as $provincia)
                                <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                                
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
                            <select class="form-control" id="ciudades" name="id_ciudad" value="{{ old('id_ciudad') }}" required>
                                <option disabled selected hidden> -- Seleccione una Ciudad -- </option>
                            </select>

                                @if ($errors->has('id_ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-group{{ $errors->has('tipo_us') ? ' has-error' : '' }}">
                            <label for="tipo_us" class="col-md-4 control-label">Tipo de Usuario</label>

                            <div class="col-md-6">
                            <select class="form-control" name="tipo_us" value="{{ old('tipo_us') }}" required>
                                <option disabled selected hidden> -- Seleccione Tipo de Usuario -- </option>
                                <!--Cargar tipos de Usuarios (Operador-Despachante-Representante)  -->
                                @foreach ($tipousuarios as $tipo_us)
                                    <option value="{{$tipo_us->id}}">{{$tipo_us->descripcion}}</option>
                                @endforeach
                            </select>


                                @if ($errors->has('tipo_us'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo_us') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Repita Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repita Contraseña" required>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 reg">
                                <button type="submit" class="btn btn-primary reg">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
