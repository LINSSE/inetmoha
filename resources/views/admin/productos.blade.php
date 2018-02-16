@extends('layouts.principal')

@section('content')
    <div class="row">
    <h4 class="h4tit">Productos</h4>
    <a type="button" id="agregarProd" data-toggle="modal" data_target="#agregarProducto" class="btn btn-success admin">Agregar Producto</a>
	
	<div class="col-md-12 admin">
                <table class="table chica">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Descripción Alt.</th>
                            <th>Categoría</th>
                            <th>U. de Medida</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($productos as $prod)        
                            <tbody>
                                <tr>
                                    <form class="form-horizontal" name="eliminarProducto" method="POST" action="/producto/eliminar">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$prod->id}}">
                                    <td><input type="text" class="input-table" name="nombre" value="{{$prod->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="descripcion" value="{{$prod->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="descripcion2" value="{{$prod->descripcion2}}" disabled></td>
                                    <td><input type="text" class="input-table" name="categoria" value="{{$prod->categoria->descripcion}}" disabled></td>
                                    <td><input type="text" class="input-table" name="medida" value="{{$prod->medida->descripcion}}" disabled></td>
                                    <td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Producto">X</button></td>
                                    </form>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
    </div>
    </div> 

    <hr>
    <div class="col-md-12 admin">
    <div class="col-md-6 admin prod">    
        <h4 class="h4tit">Categorías</h4>
        <a type="button" id="agregarCat" data-toggle="modal" data_target="#agregarCategoria" class="btn btn-success admin">Agregar Categoría</a>
                <table class="table chica prod">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($categorias as $cat)        
                            <tbody>
                                <tr>
                                    <form class="form-horizontal" name="eliminarCategoria" method="POST" action="/categoria/eliminar">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$cat->id}}">
                                    <td><input type="text" class="input-table" name="descripcion" value="{{$cat->descripcion}}" disabled></td>
                                    <td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Categoría">X</button></td>
                                    </form>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
    </div>
    <div class="col-md-6 admin prod">
        <h4 class="h4tit">Unidades de Medida</h4>
        <a type="button" id="agregarMed" data-toggle="modal" data_target="#agregarMedida" class="btn btn-success admin">Agregar Unidad de Medida</a>
                <table class="table chica prod">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($medidas as $med)        
                            <tbody>
                                <tr>
                                    <form class="form-horizontal" name="eliminarMedida" method="POST" action="/medidas/eliminar">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$med->id}}">
                                    <td><input type="text" class="input-table" name="descripcion" value="{{$med->descripcion}}" disabled></td>
                                    <td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Unidad de Medida">X</button></td>
                                    </form>
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
                                        <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                                        <div class="col-md-6">
                                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required >

                                            @if ($errors->has('descripcion'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('descripcion2') ? ' has-error' : '' }}">
                                        <label for="descripcion2" class="col-md-4 control-label">Descripción Alternativa</label>

                                        <div class="col-md-6">
                                            <input id="descripcion2" type="text" class="form-control" name="descripcion2" value="{{ old('descripcion2') }}" >

                                            @if ($errors->has('descripcion2'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('descripcion2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('id_cat') ? ' has-error' : '' }}">
                                        <label for="id_cat" class="col-md-4 control-label">Categoría</label>

                                        <div class="col-md-6">
                                        <select class="form-control" id="id_cat" name="id_cat" value="{{ old('id_cat') }}" required>
                                            <option disabled selected hidden> -- Seleccione una Categoría -- </option>
                                            @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                            
                                            @endforeach
                                        </select>

                                            @if ($errors->has('id_cat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('id_cat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('id_medida') ? ' has-error' : '' }}">
                                        <label for="id_medida" class="col-md-4 control-label">Unidad de Medida</label>

                                        <div class="col-md-6">
                                        <select class="form-control" id="id_medida" name="id_medida" value="{{ old('id_medida') }}" required>
                                            <option disabled selected hidden> -- Seleccione una Unidad de Medida -- </option>
                                            @foreach($medidas as $medida)
                                            <option value="{{$medida->id}}">{{$medida->descripcion}}</option>
                                            
                                            @endforeach
                                        </select>

                                            @if ($errors->has('medida'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('medida') }}</strong>
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
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Categorias -->
    <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar Categoría</h4>
          </div>
          <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" name="agregarCategoria" method="POST" action="{{ url('categoria/store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                        <label for="descripcion" class="col-md-4 control-label">Descripción</label>

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
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

        <!-- Modal Medida -->
    <div class="modal fade" id="agregarMedida" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar Medida</h4>
          </div>
          <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" name="agregarMedida" method="POST" action="{{ url('medida/store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                        <label for="descripcion" class="col-md-4 control-label">Descripción</label>

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
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection