<?php
ob_start();
session_start();
require_once "./views/partials/cabecera.part.php";
$mostrarMensaje=false;

require_once "./database/connection.php";
$conexion=Connection::make();

$pass="";
$password="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $dniUsuario=strtoupper($_POST["dniUsuario"]);
    $password=$_POST["passwordUsuario"];

    $stmt=$conexion->prepare("select password from voluntariado where dni=:dni");
    $stmt->bindParam(':dni',$dniUsuario);
    $stmt->execute();

    //echo "DNI: $dniUsuario <br>";
    //echo "PASS: $password <br>";

    $hash=$stmt->fetch(PDO::FETCH_ASSOC)["password"];
    //echo "PASSCIFRADA: $hash <br>";
    //echo "NEW CYPHER :". sha1(trim($password));

    //if (password_verify($password, $hash))
    if ( sha1($password) == $hash)
    {
        $stmt=$conexion->prepare("select administrador from voluntariado where dni='$dniUsuario'");
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);  //devuelve 1 'o 0;
        $_SESSION["dniVoluntario"]=$dniUsuario;
        if($usuario['administrador']==0)
            {
            $_SESSION["mostrarColonias"]=true;
            header("Location:hazteVoluntario.php");
        }else
            {
                $_SESSION["Administrator"] = true;
                header("Location:administrador.php");
            }
    } else
        {
            $mostrarMensaje = true;
        }
}

?>

<div class="container-fluid">
    <div class="row mt-md-5">
        <div class="col-md-12 d-flex justify-content-center">
            <h2 class="accesoTexto">Acceso Voluntarios</h2>
        </div>
    </div>

    <div class="row mt-md-5">
        <div class="col-md-12 d-flex justify-content-center">
            <h4 class="">Identificación Usuario</h4>
        </div>
    </div>

    <div class="container sinPadding">

        <form action="accesoVoluntarios.php" method="post">
            <?php
            if($mostrarMensaje)
            {?>

            <div class="alert alert-danger alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 El DNI del voluntario o contraseña no son correctos
            </div>
         <?php   }  ?>


            <div class="row d-flex justify-content-md-center">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="dniUsuario" id="dni"
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
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="password" name="passwordUsuario" id="dni"
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



<?php include("./views/partials/footer.part.php");  ob_end_flush(); ?>

<script type="text/javascript" src="jsvalidar/validardatos.js"></script>
<script type="text/javascript" src="jsvalidar/validardatos.js"></script>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>

