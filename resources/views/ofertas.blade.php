@extends('layouts.principal')

@section('content')

    <div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Ofertas sin Tomar</h1>
                <div class="table-responsive">
                    <table class="table chica">
                        <thead>
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Fecha Fin</th>
                                <th>Puesto</th>
                                <th>Cobro</th>
                                <th>Modo</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($ofertas as $of)
                            <tbody>
                                <tr>
                                    <!-- <form class="form-horizontal" name="" method="POST" action=""> -->
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$of->id}}">
                                    @foreach($productos as $prod)
                                    @if($of->id_prod === $prod->id)
                                    <td><input type="text" class="input-table" name="producto" value="{{$prod->nombre}}" disabled></td>
                                    @endif
                                    @endforeach
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->cantidad}}" disabled></td>
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->precio}}" disabled></td>
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->fechaFin}}" disabled></td>
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->puesto}}" disabled></td>
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->cobro}}" disabled></td>
                                    <td><input type="text" class="input-table" name="producto" value="{{$of->modo}}" readonly="true"></td>
                                    <td>@if($activo === 1)
                                            <button type="button" name="ofertar" class="btn btn-success admin">Ofertar</button>
                                        @else
                                            <button type="button" name="ofertar" disabled="" class="btn btn-success admin">Ofertar</button>
                                        @endif</td>
                                    <!-- </form> -->
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Ofertas Abiertas</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Cant </th>
                                <th>Fecha </th>
                                <th>Operador </th>
                                <th>Puesto </th>
                                <th>Cobro </th>
                                <th>Modo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>2.000 </td>
                                <td>15-20 sep</td>
                                <td>Zone J.</td>
                                <td>Fine </td>
                                <td>Cdo </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>Rodriguez L.</td>
                                <td>Epq </td>
                                <td>Cpd </td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>3.000 </td>
                                <td>15-20 sep</td>
                                <td>Zone J.</td>
                                <td>Fine </td>
                                <td>Cdo </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>Rodriguez L.</td>
                                <td>Epq </td>
                                <td>Cpd </td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>Rodriguez L.</td>
                                <td>Epq </td>
                                <td>Cpd </td>
                                <td>Emb </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop