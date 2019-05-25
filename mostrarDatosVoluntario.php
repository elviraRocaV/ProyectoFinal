<?php
session_start();
require_once "Database/Connection.php";
require_once "Entities/Voluntario.php";
$conexion=Connection::make();

require __DIR__."/views/partials/cabecera.part.php";

$dnis=$_SESSION["dniVoluntario"];

/*$stmt=$conexion->prepare("select * from voluntariado where dni=:dni");
$stmt->execute([':dni'=>$dnis]);
$voluntari = $stmt->fetchAll(PDo::FETCH_OBJ);*/

$stmt=$conexion->prepare("select * from voluntariado where dni='$dnis'");
$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Voluntario");
$stmt->execute();
$voluntari=$stmt->fetch();

?>

<div class="container-fluid sinPadding">
    <div class="fondoGatoSocio">

        <div class="row ">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="subtitulo">Datos Voluntario</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h3 class="subtitle">Sus datos son:</h3>
            </div>
        </div>

        <div class="container sinPadding">
            <form action="mostrarDatosVoluntario.php" method="post">
                <div class="row d-flex justify-content-md-between">

                    <div class="col-md-4 mt-2 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Nombre:</label>
                        <div class="tiptext"><?php echo $voluntari["nombre"];?></div>

                    </div>



                    <div class="col-md-4 mt-5 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Apellidos:</label>
                        <input name="apellidos" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->apellido()?>" readonly>
                    </div>

                    <div class="col-md-4 mt-5 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">DNI:</label>
                        <input name="dni" id="dni" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->dni; ?>"
                               readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include("views/partials/footer.part.php"); ?>







