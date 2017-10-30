@extends('layouts.principal')

@section('content')
    @guest
        <center><h4>Debe Regstrarse para Acceder a esta seccion</h4></center>
    @else
    <div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Operaciones Físicas</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Cant </th>
                                <th>Fecha </th>
                                <th>Precio </th>
                                <th>Pago </th>
                                <th>P1 </th>
                                <th>Destino </th>
                                <th>Modo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>200 </td>
                                <td>Cpd </td>
                                <td>-- </td>
                                <td>Bs. As.</td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>3.000 </td>
                                <td>15-20 sep</td>
                                <td>185 </td>
                                <td>Cdo </td>
                                <td>30 </td>
                                <td>Ros </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>3.000 </td>
                                <td>15-20 sep</td>
                                <td>220 </td>
                                <td>Com </td>
                                <td>10 </td>
                                <td>Ros </td>
                                <td>Abierto </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>3.000 </td>
                                <td>15-20 sep</td>
                                <td>175 </td>
                                <td>Cdo </td>
                                <td>-- </td>
                                <td>Cba </td>
                                <td>Raso </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Operaciones Comprometidas</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Cant </th>
                                <th>Fecha </th>
                                <th>Precio </th>
                                <th>Pago</th>
                                <th>P1 </th>
                                <th>Destino </th>
                                <th>Modo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>2.000 </td>
                                <td>15-20 sep</td>
                                <td>250 </td>
                                <td>Cdo </td>
                                <td>-- </td>
                                <td>Bs. As.</td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>200 </td>
                                <td>Efect </td>
                                <td>30 </td>
                                <td>Cba </td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>3.000 </td>
                                <td>15-20 sep</td>
                                <td>180 </td>
                                <td>Cdo </td>
                                <td>10 </td>
                                <td>Rosario </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>185 </td>
                                <td>Com </td>
                                <td>Cpd </td>
                                <td>Rosario </td>
                                <td>Abierto </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>1.000 </td>
                                <td>15-30 sep</td>
                                <td>210 </td>
                                <td>Anticipo </td>
                                <td>40 </td>
                                <td>Cba </td>
                                <td>Emb </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endguest
@stop