@foreach ($ofertas as $oferta)
	<input type="text" class="input-table" name="producto" value="{{$oferta->producto->nombre}}" disabled>
@endforeach

