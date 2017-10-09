@extends('layouts.principal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" required maxlength="8" minlength="8" inputmode="numeric">

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
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required maxlength="13" inputmode="numeric">

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
                                <input id="domicilio" type="text" class="form-control" name="domicilio" value="{{ old('domicilio') }}" required>

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
                            <select class="form-control" id="provincias" name="id_provincia" value="{{ old('id_provincia') }}">
                                <option disabled selected value> -- Seleccione una Provincia -- </option>
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
                            <select class="form-control" id="ciudades" name="id_ciudad" value="{{ old('id_ciudad') }}" placeholder=" -- Selleccione una Ciudad -- ">
                                <option disabled selected value> -- Seleccione una Ciudad -- </option>
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
                            </div>
                            <span class="glyphicon glyphicon-info-sign" alt="Puede indicar un Despachante luego, o agregar uno nuevo si no encuentra su Despachante" title="Puede indicar un Despachante luego, o agregar uno nuevo si no encuentra su Despachante"></span>
                            <a type="button" id="agregarDesp" data-toggle="modal" data_target="#agregarDespachante" class="btn btn-success">Agregar</a>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('id_rep') ? ' has-error' : '' }}">
                            <label for="id_rep" class="col-md-4 control-label">Representante</label>

                            <div class="col-md-6">
                            <select class="form-control" name="id_rep" value="{{ old('id_rep') }}"  required>
                                <option value disabled selected> -- Seleccione un Representante -- </option>
                                @foreach($representantes as $representante)
                                <option value="{{$representante->id}}">{{$representante->apellido}} {{$representante->nombre}}</option>
                                
                                @endforeach
                            </select>

                                @if ($errors->has('id_rep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_rep') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="glyphicon glyphicon-info-sign" alt="Puede agregar un Representante nuevo, si no encuentra su Representante" title="Puede agregar un Representante nuevo, si no encuentra su Representante"></span>
                            <a type="button" id="agregarDesp" data-toggle="modal" data_target="#agregarDespachante" class="btn btn-success">Agregar</a>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
                            <form class="form-horizontal" name="agregarRepresentante" method="POST" action="{{ url('representante.store') }}">
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

<!-- Modal Despachante-->
<div class="modal fade" id="agregarDespachante" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Despachante</h4>
      </div>
      <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="agregarDespachante" method="POST" action="{{ url('despachante/store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="nombr" type="text" class="form-control" name="nombre" value="{{ old('name') }}" required autofocus>

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
<script type="text/javascript">
    $('#agregarDesp').on('click', function () {
    //var id = $(this).attr("id"); //get the id from the line
 
        $('#agregarDespachante').load("agregarDespachante")//load a view into a modal

    $('#agregarDespachante').modal('show'); //show the modal

  });
</script></center>
@endsection
