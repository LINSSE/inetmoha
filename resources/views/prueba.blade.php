@foreach($ofertas as $oferta)
    @foreach($oferta->contraoferta as $of)
    dd{{$of->estado}}
    @endforeach
@endforeach