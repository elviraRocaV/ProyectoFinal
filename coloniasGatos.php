<?php
require __DIR__."/views/partials/cabecera.part.php";
?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12 text-md-center acceso mb-md-5">
            <h2>Datos Colonia</h2>
        </div>
    </div>

    <form action="coloniasGatos.php" method="post">

        <div class="row">
            <div class="col-md-3 col-sm-6 mt-md-3 offset-md-2 mb-md-4">
                <label class="textFormularioVoluntario">Ubicación colonia <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="gatoCalle" id="gatoCalle" placeholder="Calle referencia" onclick="cambiarFondoUbicacionGatos()" onblur="cambiarFondoUbicacionGatosExpresionRegular(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3 mt-sm-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto11"></div>
            </div>

            <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

            <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 mb-md-4">
                <label class="textFormularioVoluntario">Nº total de gatos/as de la colonia<span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="numTotalGatos" id="numTotalGatos" placeholder="nº total gat@s" onclick="cambiarFondoTotalGatos()" onblur="cambiarFondoTotalGatosExpresionRegular(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3 mt-sm-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto12"></div>
            </div>
        </div>

        <div class="row mb-md-5">
            <div class="col-md-2 mt-md-5 offset-md-2">
                <label class="textFormularioVoluntario">Cantidad de gatas<span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                    <input class="linea lineaGatos fondocaja" type="text" name="numTotalgatas" id="numTotalgatas" placeholder="Número total de gatas en colonia" onclick="cambiarFondoCantidadGatas()" onblur="cambiarFondoCantidadGatasExpresionRegular(this)">
                </div>
                <div class="col-md-1 col-sm-1 mt-md-3 mt-sm-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto13"></div>
                </div>
            </div>


            <div class="col-md-2 mt-md-5 ml-md-5">
                <label class="textFormularioVoluntario">Nº de gatas castradas <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                    <input class="linea lineaGatos fondocaja" type="text" name="numGatasCastradas" id="numGatasCastradas" placeholder="Número gatas castradas" onclick="cambiarFondoGatasCastradas()" onblur="cambiarFondoGatasCastradasExpresionRegular(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3 mt-sm-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto14"></div>
            </div>

            <div class="col-md-2 mt-md-5 mb-md-3 ml-md-4">
                <label class="textFormularioVoluntario">Nº de gatas por castrar</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                    <input class="linea lineaGatos fondocaja" type="text" name="numGatasNoCastradas" id="numGatasNoCastradas" placeholder="Nún gatas no castradas" onclick="cambiarFondoGastasNoCastradas()" onblur="cambiarFondoGastasNoCastradasExpresionRegular(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3 mt-sm-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto15"></div>
            </div>
        </div>

        <div class="row">
            <div class="cajaBoton mt-md-2 mb-md-3 offset-md-9">
                <label class="textFormularioVoluntario">Añadir colonia</label>
                <div class="btn btn-primary boton1" data-toggle="toggle" id="anyadir" role="button">+</div>
            </div>
            <script type="text/javascript" src="jsValidar/anyadirColonia.js"></script>
        </div>


        <div class="row justify-content-md-center">
            <div class="cajaBoton mt-md-4 mb-md-5">
                <a href="hazteVoluntario.php" class="btn btn-primary boton1" role="button">Anterior</a>
            </div>
            <div class=" cajaBoton mt-md-4 offset-md-2 mb-md-5">
                <div class="btn btn-primary boton1" role="button">Enviar</div>
            </div>
        </div>
    </form>
</div>





<script type="text/javascript" src="jsValidar/validar.js"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>