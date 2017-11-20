@extends('layouts.principal')

@section('content')

    <div class="page-header">
            <h1 class="text-center">Precios <small>Referencia de los distintos precios ofrecidos, demandados y de otros mercados</small></h1></div>
        <div class="row precios">
            <div class="col-md-6">
                <h1 class="h1-tabla">Precios del Día</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Min </th>
                                <th>Medio </th>
                                <th>Max </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>180 </td>
                                <td>220 </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 15kg</td>
                                <td>150 </td>
                                <td>150 </td>
                                <td>150 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="h1-tabla">Precios Mercado BA</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Min </th>
                                <th>Medio </th>
                                <th>Max </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>180 </td>
                                <td>220 </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 15kg</td>
                                <td>150 </td>
                                <td>150 </td>
                                <td>150 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h1 class="h1-tabla">Precios Ofrecidos</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Actual </th>
                                <th>Oct </th>
                                <th>Nov </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>180 </td>
                                <td>220 </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 15kg</td>
                                <td>150 </td>
                                <td>150 </td>
                                <td>150 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="h1-tabla">Tendencias de Precios</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Producto </th>
                                <th>Historico </th>
                                <th>Actual </th>
                                <th>Futuro </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate x 20kg</td>
                                <td>200 </td>
                                <td>180 </td>
                                <td>220 </td>
                            </tr>
                            <tr>
                                <td>Zapallito x 15kg</td>
                                <td>150 </td>
                                <td>150 </td>
                                <td>150 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@stop