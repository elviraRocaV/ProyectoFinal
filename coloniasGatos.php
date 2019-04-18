<?php
require __DIR__."/views/partials/cabecera.part.php";
?>



<div class="row mt-3">
    <div class="col-md-12 text-md-center acceso mb-md-5">
        <h2>Datos Colonia</h2>
    </div>
</div>

<form action="coloniasGatos.php" method="post">
    <div class="row">
        <div class="col-md-3 mt-md-3 offset-md-1 mb-md-5 mr-md-5">
            <label class="textFormularioVoluntario">Ubicación colonia</label><br>
            <input class="linea lineahazteVoluntario fondocaja" type="text" name="gatoCalle" id="gatoCalle" placeholder="Calle referencia" onfocus="cambiarFondoUsuario(this)">
        </div>
        <div class="col-md-3 mt-md-3 mb-md-5">
            <label class="textFormularioVoluntario">Nº total de gatos/as de la colonia</label><br>
            <input class="linea lineahazteVoluntario fondocaja" type="text" name="numTotalGatos" id="numTotalGatos" placeholder="nº total gat@s" onfocus="cambiarFondoApellido(this)">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-md-5 offset-md-1 mr-md-5">
            <label class="textFormularioVoluntario">Cantidad de gatas</label><br>
            <input class="linea lineahazteVoluntario fondocaja" type="text" name="numTotalgatas" id="numTotalgatas" placeholder="Número total de gatas en colonia" onfocus="cambiarFondoUsuario(this)">
        </div>
        <div class="col-md-3 mt-md-5 mr-md-5">
            <label class="textFormularioVoluntario">Nº de gatas castradas</label><br>
            <input class="linea lineahazteVoluntario fondocaja" type="text" name="numGatasCastradas" id="numGatasCastradas" placeholder="Número gatas castradas" onfocus="cambiarFondoUsuario(this)">
        </div>
        <div class="col-md-3 mt-md-5">
            <label class="textFormularioVoluntario">Nº de gatas por castrar</label><br>
            <input class="linea lineahazteVoluntario fondocaja" type="text" name="numGatasNoCastradas" id="numGatasNoCastradas" placeholder="Nún gatas no castradas" onfocus="cambiarFondoUsuario(this)">
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="cajaBoton mt-md-5 mb-md-5">
                <a href="hazteVoluntario.php" class="btn btn-primary boton1" role="button">Anterior</a>
            </div>
            <div class=" cajaBoton mt-md-5 offset-md-2 mb-md-5">
                <div class="btn btn-primary boton1" role="button">Enviar</div>
            </div>
        </div>
    </div>
</form>





<script type="text/javascript" src="jsValidar/validar.js"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>