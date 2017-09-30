@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 menu"><a class="btn btn-default menu" role="button" href="precios.html"> PRECIOS</a><a class="btn btn-default menu" role="button" href="ofertas.html">OFERTAS </a><a class="btn btn-default menu" role="button" href="demandas.html">DEMANDAS </a>
                <a
                class="btn btn-default menu" role="button" href="operaciones.html">OPERACIONES </a><a class="btn btn-default menu" role="button" href="operadores.html">OPERADORES </a></div>
        </div>
    </div>
@endsection
