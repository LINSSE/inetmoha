@extends('layouts.principal')

@section('content')

    <div class="row">
            <div class="col-md-12">
                <h1 class="h1-tabla">Demandas sin Tomar</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Precio </th>
                                <th>Cant </th>
                                <th>Operador </th>
                                <th>Pago </th>
                                <th>Destino </th>
                                <th>Modo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>200 </td>
                                <td>1.000 </td>
                                <td>La Anonima</td>
                                <td>Efect </td>
                                <td>Bs. As.</td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>185 </td>
                                <td>3.000 </td>
                                <td>Los 3 Hnos.</td>
                                <td>CPD </td>
                                <td>Rosario </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>210 </td>
                                <td>3.000 </td>
                                <td>Est. AAA</td>
                                <td>Com </td>
                                <td>B. Blanca</td>
                                <td>Abierto </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>3.000 </td>
                                <td>Perez Juan</td>
                                <td>Efect </td>
                                <td>Barranquera </td>
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
                <h1 class="h1-tabla">Demandas Abiertas</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Precio </th>
                                <th>C. Pendiente</th>
                                <th>Operador </th>
                                <th>Pago</th>
                                <th>Destino </th>
                                <th>Modo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200</td>
                                <td>520 </td>
                                <td>Zone J.</td>
                                <td>Efect </td>
                                <td>Bs. As.</td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>185 </td>
                                <td>220 </td>
                                <td>Rodriguez L.</td>
                                <td>Efect </td>
                                <td>Barranquera </td>
                                <td>Emb </td>
                            </tr>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>360 </td>
                                <td>Zone J.</td>
                                <td>CPD </td>
                                <td>Cba </td>
                                <td>Raso </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>200 </td>
                                <td>90 </td>
                                <td>Rodriguez L.</td>
                                <td>Efect </td>
                                <td>Rsario </td>
                                <td>Abierto </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 10kg</td>
                                <td>250 </td>
                                <td>430 </td>
                                <td>Rodriguez L.</td>
                                <td>Com </td>
                                <td>Rosario </td>
                                <td>Emb </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop