<?php
require_once "./database/connection.php";
$conexion=Connection::make();
$showMessage=false;
$message="";
include("./views/partials/cabeceraadministrador.php");

if(isset($_POST["voluntarioEliminar"])) {
    $DniVoluntarioEliminar = $_POST["voluntarioEliminar"];
    $DniVoluntarioEliminar = strtoupper($DniVoluntarioEliminar);

    $stmtEliminarColonias = $conexion->prepare ("DELETE FROM colonia WHERE idVoluntario=\"$DniVoluntarioEliminar\"");
    $stmt = $conexion->prepare("DELETE FROM voluntariado WHERE dni=\"$DniVoluntarioEliminar\"");
    $showMessage = true;
    try {
        $stmtEliminarColonias->execute();
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $message = "Se ha borrado el volutario con DNI $DniVoluntarioEliminar.";
            } else {
                $message = "El Voluntario con DNI $DniVoluntarioEliminar no existe!!.";
            }
        }
    }
    catch (exception $e)
    {
        $message = "El voluntario con DNI $DniVoluntarioEliminar no se puede eliminar mientras tenga una colonia asociada.";
    }
}

?>

<div class="container-fluid sinPadding">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-md-3">
            <p class="subtitulo">Lista Voluntarios</p>
        </div>
    </div>

    <div class="container">
        <?php
        if ($showMessage) {
            echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"text-align: center\">
            $message
            </div>";
        }
        ?>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center" style="height: 100%">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Fecha Nacimiento</th>
                        <th>Zona Reside</th>
                        <th>Núm</th>
                        <th>Portal</th>
                        <th>Piso</th>
                        <th>Letra</th>
                        <th>CP</th>
                        <th>Provincia</th>
                        <th>Email</th>
                        <th>Telf1</th>
                        <th>Telf2</th>
                        <th>Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $stmt = $conexion->prepare("SELECT * FROM voluntariado");
                    $stmt->execute();
                    $voluntarios =$stmt->fetchAll(PDO:: FETCH_ASSOC);

                    foreach ($voluntarios as $voluntario)
                    {?>
                        <tr>
                            <td><?php echo $voluntario['nombre'];?></td>
                            <td><?php echo $voluntario['apellidos'];?></td>
                            <td><?php echo $voluntario['dni'];?></td>
                            <td><?php echo $voluntario['fechanacimiento'];?></td>
                            <td><?php echo $voluntario['zona'];?></td>
                            <td><?php echo $voluntario['numero'];?></td>
                            <td><?php echo $voluntario['portal'];?></td>
                            <td><?php echo $voluntario['piso'];?></td>
                            <td><?php echo $voluntario['letra'];?></td>
                            <td><?php echo $voluntario['cp'];?></td>
                            <td><?php echo $voluntario['provincia'];?></td>
                            <td><?php echo $voluntario['correo'];?></td>
                            <td><?php echo $voluntario['telefono1'];?></td>
                            <td><?php echo $voluntario['telefono2'];?></td>
                            <td><?php echo $voluntario['administrador'];?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-md-3">
                <p class="subtitulo">Voluntarios con sus colonias</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Número Colonia</th>
                        <th>Ubicación</th>
                        <th>Núm total de Gatos </th>
                        <th>Núm Total gatas</th>
                        <th>Núm gatas castradas</th>
                        <th>Núm gatas por castrar</th>
                        <th>DNI Voluntario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $stmt = $conexion->prepare("SELECT * FROM colonia INNER JOIN voluntariado on voluntariado.dni=colonia.idVoluntario");
                    $stmt->execute();
                    $colonias =$stmt->fetchAll(PDO:: FETCH_ASSOC);

                    foreach ($colonias as $colonia)
                    {?>
                        <tr>
                            <td><?php echo $colonia['idcolonia'];?></td>
                            <td><?php echo $colonia['ubicacion'];?></td>
                            <td><?php echo $colonia['numgatostotal'];?></td>
                            <td><?php echo $colonia['numgatastotal'];?></td>
                            <td><?php echo $colonia['numgatascastradas'];?></td>
                            <td><?php echo $colonia['numgatastotal']- $colonia['numgatascastradas'];?></td>
                            <td><?php echo $colonia['idVoluntario'];?></td>
                            <td><?php echo $colonia['nombre'];?></td>
                            <td><?php echo $colonia['apellidos'];?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <form action="listaVoluntarios.php" method="post">

            <div class="row">
                <div class="col-md-1"></div>
                <h3>Eliminar Voluntario</h3>
                <div class="col-md-10"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <p class="pr-md-3">Introduce el DNI del Voluntario a eliminar</p>
                <input type="text" name="voluntarioEliminar" value="">
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <button class="btn btn-primary boton1" type="submit" role="button" id="btnEliminarVoluntario">Eliminar Voluntario</button>
            </div>
        </form>
    </div>
</div>
<?php include("./views/partials/footer.part.php");  ?>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>
