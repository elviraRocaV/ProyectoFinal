<?php
if (!isset($_SESSION)) {session_start();}
require_once "./database/connection.php";
$conexion=Connection::make();
require "./views/partials/cabecera.part.php";


if($_SERVER['REQUEST_METHOD']=="POST")
{
    if (isset($_POST["ubicacion"]))         {$ubicacion = strtoupper($_POST["ubicacion"]);}
    if (isset($_POST["numTotalGatos"]))     {$nunTotalGatos =$_POST["numTotalGatos"]; }
    if (isset($_POST["numGatasTotales"]))   {$numTotalGatas = $_POST["numGatasTotales"];}
    if (isset($_POST["numGatasCastradas"])) {$numGatasCastradas =$_POST["numGatasCastradas"];}

    $dni = $_SESSION["voluntario"]->dni;  //es un nombre de variable

    $stmt = $conexion->prepare(
    "INSERT INTO `colonia` (ubicacion, numgatostotal, numgatastotal, numgatascastradas, idVoluntario)
      VALUES (:ubicacion, :numgatostotal, :numgatastotal, :numgatascastradas, :idVoluntario)");
    $stmt->execute([":ubicacion"=>$ubicacion, ":numgatostotal"=>$nunTotalGatos,"numgatastotal"=>$numTotalGatas,
        ":numgatascastradas"=>$numGatasCastradas, ":idVoluntario"=>$dni]);

    $_SESSION["dniVoluntario"] = $dni;
    $_SESSION["mostrarColonias"] = true;
    header("Location:haztevoluntario.php");
}

?>


<div class="container-fluid sinPadding">
    <div class="row d-flex justify-content-md-center">

    <form action="coloniasGatos.php" method="post" class="fondoGatoSocio">

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-md-2 mt-5">
                <p class="subtitulo">Datos Colonia</p>
            </div>
        </div>

        <div class="container sinPadding anchoContenedor">
            <div class="row d-flex justify-content-md-between">
                <div class="col-md-4 col-12 mt-md-5 mt-4">
                    <label class="textFormularioVoluntario">Ubicación Colonia <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text" name="ubicacion"
                        id="ubicacionColonia" placeholder="Calle referencia" required onfocus="cambiarFondoColonia(this)"
                        onblur="validarNombreColonia(this)">
                    </div>
                </div>

                <div class="col-md-4"></div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Nº total gat@s de la colonia <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                        <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text"
                        name="numTotalGatos" id="numTotalGatos" placeholder="num total gatos colonia" required onfocus="cambiarFondoColonia(this)"
                        onblur="validarnumCantGatosColonia(this)">
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-md-between separacionHorizontal">
                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Cantidad Gatas (Hembras) <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="numGatasTotales" id="numTotalGatas"
                        placeholder="Número total gatas" required onfocus="cambiarFondoColonia(this)" onblur="validarnumCantTotalGatas(this)">
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Nº gatas Castradas <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="numGatasCastradas"
                        id="numGatasCastradas" placeholder="Número gatas castradas" required onfocus="cambiarFondoColonia(this)"
                        onblur="validarnumGatasCastradas(this)">
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 mb-md-5">
                    <label class="textFormularioVoluntario">Nº gatas NO Castradas<span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-edit"></i></span>
                        <input readonly class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="numGatasNoCastradas"
                        id="numGatasNoCastradas">
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-5"></div>
                <div class="col-md-2 mt-md-5 mb-md-5">
                    <button class="btn btn-primary boton1" role="button" id="button1">Enviar</button>
                </div>
                <div class="col-md-5"></div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-5"></div>
                <div class="cajaBoton mt-md-5 mb-md-3">
                    <label class="textFormularioVoluntario">Añadir colonia</label>
                    <div class="btn btn-primary boton1" data-toggle="toggle" id="anyadir" role="button" onclick="anyadirColonias()">+</div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </form>
</div>
</div>


<?php
include("./views/partials/footer.part.php");
?>

<script type="text/javascript" src="./jsvalidar/validarDatosColonia.js"></script>













