<div class="col-md-6 admin">
    
            <div class="table-responsive admin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre </th>
                            <th>Descripcion </th>
                            <th>Min</th>
                            <th>Med</th>
                            <th>Max</th>
                        </tr>
                    </thead>
                    @foreach($datos as $prod)        
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-table" name="nombre" value="{{$prod->nombre}}" disabled></td>
                                    <td><input type="text" class="input-table" name="min" value="" disabled></td>
                                    <td><input type="text" class="input-table" name="med" value="" disabled></td>
                                    <td><input type="text" class="input-table" name="max" value="" disabled></td>
                                </tr>
                            </tbody>
                    @endforeach
                </table>
            </div>
    </div>