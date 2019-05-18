<?php
include("views/partials/cabecera.part.php");

require_once "Database/Connection.php";
$conexion=Connection::make();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $dniUsuario=$_POST["usuario"];
    $password=$POST["usuario"];

    $stm=$conexion->prepare("select password1 from socio where dni=$dniUsuario");
    $stm->execute();
    $passwordEncriptado=$stmt->fetch(PDO::FETCH_ASSOC);
    $pass=$passwordEncriptado["password"];

    if(password_verify($password, $pass))
    {
        header("Location: hojaSocio.php");
    }else
    {
        echo "la contraseña o DNI no son válidos";
    }
}

?>


<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12 col-12 text-md-center text-sm-center text-center acceso">
            <h2 class="accesoTexto">Acceso Socios</h2>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12 col-sm-12 col-12 text-md-center text-sm-center text-center mb-4">
            <h4 class="">Identificación Usuario</h4>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto mb-5">
            <label>DNI:</label><br>
            <div class="input-group">
                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                <input class="linea lineaVoluntario fondocaja" type="text" name="usuario" id="usuario" placeholder="Nombre Usuario" onfocus="cambiarFondoUsuario(this)">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto mb-5">
            <label>Contraseña:</label><br>
            <div class="input-group">
                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="linea lineaVoluntario fondocaja" type="text" name="password" id="password" placeholder="contraseña" onfocus="cambiarFondoPassword(this)">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 text-md-center text-sm-center text-center mb-md-5">
            <button type="button" class="btn botonGrande">Enviar</button>
        </div>
    </div>
</div>



<?php include("views/partials/footer.part.php");  ?>

<script type="text/javascript" src="jsValidar/validar.js"></script>

