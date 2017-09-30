@extends('layouts.principal')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="row">
            <div class="col-md-12 col-md-offset-0 menu">
                <a class="btn btn-default menu" role="button" href="precios"> PRECIOS</a>
                <a class="btn btn-default menu" role="button" href="ofertas">OFERTAS </a>
                <a class="btn btn-default menu" role="button" href="demandas">DEMANDAS </a>
                <a class="btn btn-default menu" role="button" href="operaciones">OPERACIONES </a>
                <a class="btn btn-default menu" role="button" href="operadores">OPERADORES </a>
            </div>
    </div>
@endsection