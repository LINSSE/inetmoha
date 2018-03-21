@extends('layouts.principal')

@section('content')
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>{{Session::get('mensaje')}}</strong>
        </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>El ítem que desea agregar ya existe!</strong>
    </div>
    @endif
    <div class="row">
    
	<div class="col-md-6 admin">
        <h4 class="h4tit">Productos</h4>
        <a type="button" id="agregarProd" data-toggle="modal" data_target="#agregarProducto" class="btn btn-success admin">Agregar Producto</a>
        <br>
        <table class="table chica prod">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Descripción Alt.</th>
                    <th>Categoría</th>
                    <th></th>
                </tr>
            </thead>
            @foreach($productos as $prod)        
                    <tbody>
                        <tr>
                            <form class="form-horizontal" name="eliminarProducto" method="POST" action="/admin/producto/eliminar">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$prod->id}}">
                            <td>{{$prod->nombre}}</td>
                            <td>{{$prod->descripcion}}</td>
                            <td>{{$prod->descripcion2}}</td>
                            <td>{{$prod->categoria->descripcion}}</td>
                            <td class="col-chica"><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Producto" onclick="return confirm('¿Seguro que deseas eliminar este Producto?')">X</button></td>
                            </form>
                        </tr>
                    </tbody>
            @endforeach
        </table>
    </div>
    <div class="col-md-3 admin prod">    
        <h4 class="h4tit">Categorías</h4>
        <a type="button" id="agregarCat" data-toggle="modal" data_target="#agregarCategoria" class="btn btn-success admin">Agregar Categoría</a>
        <br>
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
                            <form class="form-horizontal" name="eliminarCategoria" method="POST" action="/admin/categoria/eliminar">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$cat->id}}">
                            <td><input type="text" class="input-table" name="descripcion" value="{{$cat->descripcion}}" disabled></td>
                            <td class="col-chica"><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Categoría" onclick="return confirm('¿Seguro que deseas eliminar esta Categoría?')">X</button></td>
                            </form>
                        </tr>
                    </tbody>
            @endforeach
        </table>
    </div>
    <div class="col-md-3 admin prod">
        <h4 class="h4tit">Unidades de Medida</h4>
        <a type="button" id="agregarMed" data-toggle="modal" data_target="#agregarMedida" class="btn btn-success admin">Agregar Unidad de Medida</a>
        <br>
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
                            <form class="form-horizontal" name="eliminarMedida" method="POST" action="/admin/medida/eliminar">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$med->id}}">
                            <td><input type="text" class="input-table" name="descripcion" value="{{$med->descripcion}}" disabled></td>
                            <td class="col-chica"><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Unidad de Medida" onclick="return confirm('¿Seguro que deseas eliminar esta Unidad de Medida?')">X</button></td>
                            </form>
                        </tr>
                    </tbody>
            @endforeach
        </table>
    </div>
    </div>
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
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
                                <form class="form-horizontal" id="formagregarProducto" name="agregarProducto" method="POST" action="{{ url('admin/producto/store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                        <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                        <div class="col-md-6">
                                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Papa" required autofocus>

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
                                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ej: Blanca" required >

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
                                            <input id="descripcion2" type="text" class="form-control" name="descripcion2" value="{{ old('descripcion2') }}" placeholder="Ej: Grande" >

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
                                <form class="form-horizontal" id="formagregarCategoria" name="agregarCategoria" method="POST" action="{{ url('admin/categoria/store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                        <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                                        <div class="col-md-6">
                                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                            @if ($errors->has('descripcion'))
                                                <span class="help-block">
                                                    <strong>Esta Categoría ya existe!</strong>
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
                                <form class="form-horizontal" id="formagregarMedida" name="agregarMedida" method="POST" action="{{ url('admin/medida/store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                        <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                                        <div class="col-md-6">
                                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus="autofocus">

                                            @if ($errors->has('descripcion'))
                                                <span class="help-block">
                                                    <strong>Esta Unidad de Medida ya existe!</strong>
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