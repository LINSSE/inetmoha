
        <form class="form-horizontal">
            <div class="row" id="formulario">
                <div class="col-md-5 col-md-offset-4" id="columnageneral"><span class="label label-default">Datos Personales</span>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label" for="email">Email </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="email_op" required="" inputmode="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Contraseña </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="pass_op" required="" minlength="8">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Nombre </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Apellido </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">DNI </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="" maxlength="8" inputmode="numeric">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Domicilio </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Ciudad </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Provincia </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Teléfono </label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" required="" maxlength="10" minlength="10" inputmode="tel">
                        </div>
                    </div>
                    <hr><span class="label label-default">Despachante </span>
                    <hr>
                    <select class="form-control">
                        <option value="13">Gonzalez</option>
                        <option value="14">Rodriguez</option>
                        <option value="">Agregar Nuevo</option>
                    </select>
                    <hr><span class="label label-default">Representante </span>
                    <hr>
                    <select class="form-control" required="">
                        <option value="" selected="">Seleccione un Representante</option>
                        <option value="12" selected="">Representante 1</option>
                        <option value="13">Representante 2</option>
                        <option value="14">Representante 3</option>
                    </select>
                    <hr>
                    <button class="btn btn-success" type="submit">Registrar </button>
                </div>
            </div>
        </form>