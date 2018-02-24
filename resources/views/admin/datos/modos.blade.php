@extends('layouts.principal')

@section('content')
    
    <div class="row">
        <div class="col-md-6 admin prod">    
        <h4 class="h4tit">Modos</h4>
        <a type="button" id="agregarMod" data-toggle="modal" data_target="#agregarModo" class="btn btn-success admin">Agregar Modo</a>
        <br>
                <table class="table chica prod">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($modos as $modo)        
                            <tbody>
                                <tr>
                                    <form class="form-horizontal" name="eliminarModos" method="POST" action="/modo/eliminar">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$modo->id}}">
                                    <td><input type="text" class="input-table" name="descripcion" value="{{$modo->descripcion}}" disabled></td>
                                    <td><button type="submit" class="btn btn-danger admin tabla" title="Eliminar Modo">X</button></td>
                                    </form>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
    	</div>
    </div>

    <!-- Modal Cobros -->
    <div class="modal fade" id="agregarModo" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar Modo</h4>
          </div>
          <div class="modal-body">
             <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" name="agregarModo" method="POST" action="{{ url('admin/modo/store') }}">
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
    <hr>
    <a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@endsection