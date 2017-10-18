@extends('layouts.principal')

@section('content')
    @include('admin.menu')
    <div class="row">
    <h4 class="h4tit">Productos</h4>
    <br>
    <a type="button" id="agregarProd" data-toggle="modal" data_target="#agregarProducto" class="btn btn-success admin">Agregar</a>
	</div>
	<div class="col-md-6 admin">
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre </th>
                            <th>Descripcion </th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($productos as $prod)        
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="nombre" value="{{$prod->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="descripcion" value="{{$prod->descripcion}}" disabled></td>
                                    <td>
                                        <form class="form-horizontal" method="POST" action="{{ url('producto/eliminar') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$prod->id}}">
                                        <a type="submit" class="btn btn-success admin">Eliminar</a>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
            </div>
    </div>

<!-- Modal Producto -->
<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Producto</h4>
      </div>
      <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" name="agregarProducto" method="POST" action="{{ url('producto/store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                        @if ($errors->has('nombre'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                    <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                                    <div class="col-md-6">
                                        <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                        @if ($errors->has('descripcion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="row model">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
      
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection