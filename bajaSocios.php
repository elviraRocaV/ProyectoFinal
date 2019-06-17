<?php
ob_start();
include("./views/partials/cabecera.part.php");
$mostrarMensaje=false;
$mensajeOk=false;
$mensajeFaltanDatos=false;
$usuarioInexistente=false;

require_once "./database/connection.php";
$conexion=Connection::make();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["dni"]) && isset($_POST["password"]))
    {
        $dniSocio=strtoupper($_POST["dni"]);
        $passwordSocio=$_POST["password"];
        $stmt=$conexion->prepare("select password from socios where dni=:dni");
        $stmt->bindParam(':dni',$dniSocio);
        $stmt->execute();
        $hash=$stmt->fetch(PDO::FETCH_ASSOC)["password"];
        if($hash==sha1($passwordSocio)) {
            $stmt = $conexion->prepare("delete from socios where dni='$dniSocio'");
            $stmt->execute();
            $mensajeOk = true;
        } else {
            $usuarioInexistente = true;
        }
    }

}

?>

<div class="container-fluid">
    <div class="row mt-md-5">
        <div class="col-md-12 d-flex justify-content-center">
            <h2 class="accesoTexto">Darse de Baja Socios</h2>
        </div>
    </div>

    <div class="row mt-md-5">
        <div class="col-md-12 d-flex justify-content-center">
            <h4 class="">Identificación Socio</h4>
        </div>
    </div>

    <div class="container sinPadding">

        <form action="bajaSocios.php" method="post">

            <?php
            if($usuarioInexistente)
            {?>

                <div class="alert alert-danger alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    DNI o contraseña no son correctos
                </div>
            <?php   }  ?>

            <?php
            if($mensajeOk)
            {?>
                <div class="alert alert-info">
                    <strong>Eliminado!!</strong> El Socio se ha eliminado correctamente.
                </div>
            <?php   }  ?>


            <div class="row d-flex justify-content-md-center">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="dni" id="dni"
                        placeholder="00000000X" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{8}[a-zA-Z]$/)"
                        data-mask="00000000S">
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Password <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="password" name="password" id="dni"
                        placeholder="password" required onfocus="ponerFondoGris(this)">
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row justify-content-md-center">
                <div class="mt-md-5 mb-md-5">
                    <button class="btn btn-primary boton1" type="submit" role="button" id="button1">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include("./views/partials/footer.part.php");  ob_end_flush();?>

<script type="text/javascript" src="jsvalidar/validardatos.js"></script>
<script type="text/javascript" src="jsvalidar/validardatos.js"></script>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>
