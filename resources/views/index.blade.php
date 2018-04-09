@extends('layouts.principal')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="row">
            <div class="col-md-12 col-md-offset-0 menu">
                <table class="menu-principal">
                  <tr>
                    <td class="th-menu-principal"><a class="btn btn-default menu" role="button" href="{{ url('/ofertas') }}"> OFERTAS </a></td>
                    <td class="th-menu-principal"><a class="btn btn-default menu" role="button" href="{{ url('/demandas') }}">DEMANDAS </a></td>
                  </tr>
                  <tr>
                    <td class="th-menu-principal"><a class="btn btn-default menu" role="button" href="{{ url('/precios') }}"> PRECIOS</a></td>
                    <td class="th-menu-principal"><a class="btn btn-default menu" role="button" href="{{ url('operaciones') }}">OPERACIONES </a></td>
                  </tr>
                </table>
            </div>
    </div>
@endsection

