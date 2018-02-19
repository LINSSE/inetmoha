@extends('layouts.principal')

@section('content')
    
    @guest
        <center><h4>Debe Registrarse para Acceder a esta sección</h4></center>
    @else
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
                <h1 class="h1-tabla">Principales Mercados</h1>
                <div class="table-responsive admin">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="enlaces"><a href="http://www.mercadocentral.gob.ar/servicios/precios-y-volumenes/precios-mayoristas" class="links"> Mercado de Buenos Aires </a></td>
                            </tr>
                            <tr>
                                <td class="enlaces"><a href="https://mercacordoba.es/mercado-de-frutas-y-verduras">Mercado de Córdoba </a></td>
                            </tr>
                            <tr>
                                <td class="enlaces"><a href="http://www.mprosario.com.ar/">Mercado de Rosario</a></td>
                            </tr>
                            <tr>
                                <td class="enlaces"><a href="http://www.cooperativah.com.ar/">Cooperativa de Horticultores de Bahía Blanca</a></td>
                            </tr>
                            <tr>
                                <td class="enlaces"><a href="http://mercadoproductoressantafe.com/">Mercado de Santa Fé</a></td>
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
    @endguest
    <hr>
<a type="button" href="/index" class="btn btn-primary admin" title="Volver">Volver</a>
@stop