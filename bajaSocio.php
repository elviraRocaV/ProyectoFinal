<?php
include("./views/partials/cabecera.part.php");

require_once "./database/connection.php";
$conexion=Connection::make();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $dniSocio=$_POST["usuarioSocioBaja"];
    $dniSocio.strtoupper($dniSocio);

    $passwordSocio=$_POST["passwordSocioBaja"];
    $passwordSocio.strtoupper($passwordSocio);

    $stm=$conexion->prepare('delete from socios where dniSocio= :dni');
    $stm->execute([':dni'=>$dniSocio]);

    /*$passwordEncriptado=$stm->fetch(PDO::FETCH_ASSOC);
    $pass=$passwordEncriptado["passwordSocioBaja"];

    if(password_verify($passwordSocio, $pass))
    {
        echo "Usted se ha dado de baja, gracias por haber colaborado con nosotros";
    }else
    {
        echo "la contraseña o DNI no son válidos";
    }*/
}

?>


<div class="container-fluid sinPadding">
    <div class="imagenFondoBajaSocios">
        <div class="container sinPadding">
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="subtitulo">Darse de Baja Socios</h1>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 d-flex justify-content-center mb-4">
                    <h3 class="">Identificación Socio</h3>
                </div>
            </div>

            <form action="bajaSocio.php" method="post">

                <div class="row justify-content-center mb-md-3">
                    <div class="col-3 mb-5">
                        <label class="textFormularioVoluntario">DNI:</label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="usuarioSocioBaja" id="usuarioSocioBaja" placeholder="Nombre Socio" onclick="cambiarFondoUsuarioSocioBaja()">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mb-md-3">
                    <div class="col-3 mb-5">
                        <label class="textFormularioVoluntario">Contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="passwordSocioBaja" id="passwordSocioBaja" placeholder="contraseña" onclick="cambiarFondoPasswordSocioBaja()">
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center mb-5">
                    <div class="mb-md-5">
                        <button type="submit" class="btn btn-primary boton1">Darse de Baja</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("./views/partials/footer.part.php");  ?>

<script type="text/javascript" src="./jsvalidar/validardatossociovoluntario.js"></script>
