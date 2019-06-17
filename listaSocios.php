<?php
require_once "./database/connection.php";
require_once "entities/socio.php";
$conexion = Connection::make();
include ("./views/partials/cabeceraadministrador.php");

$DniSocioEliminar = "";
$existe = false;
$NOelimnado = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["socioEliminar"])) {
        $DniSocioEliminar = $_POST["socioEliminar"];

        $stmt = $conexion->prepare("select nombre from socios where dni=:dni");
        $stmt->bindParam(':dni', $DniSocioEliminar);
        $stmt->execute();
        $nombreSocio = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($nombreSocio == Array()) {
            $NOelimnado = true;
        } else {
            $DniSocioEliminar = strtoupper($DniSocioEliminar);
            $stmt = $conexion->prepare("DELETE  FROM socios WHERE dni=:dni");
            $stmt->bindParam(':dni', $DniSocioEliminar);
            $stmt->execute();
            $existe = true;
        }
    }
}

?>

<div class="container-fluid sinPadding">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-md-3 mt-md-5">
            <p class="subtitulo">Lista Socios</p>
        </div>
    </div>

    <?php
    if ($NOelimnado) {
        ?>

        <div class="alert alert-danger alert-dismissible show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            El socio con ese DNI no existe
        </div>
    <?php } ?>

    <?php
    if ($existe) {
        ?>
        <div class="alert alert-info">
            <strong>Eliminado!!</strong> El Socio se ha eliminado correctamente.
        </div>
    <?php } ?>

    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Núm</th>
                    <th>Portal</th>
                    <th>Población</th>
                    <th>CP</th>
                    <th>Provincia</th>
                    <th>Email</th>
                    <th>Telf1</th>
                    <th>Cuota</th>
                    <th>Iban</th>
                    <th>Entidad</th>
                    <th>Oficina</th>
                    <th>DC</th>
                    <th>Cuenta</th>
                </tr>

                </thead>

                <tbody>

                <?php

                $stmt = $conexion->prepare("SELECT * FROM socios");
                $stmt->execute();
                $socios = $stmt->fetchAll(PDO:: FETCH_ASSOC);

                foreach ($socios as $socio) {
                    ?>
                    <tr>
                        <td><?php echo $socio['nombre']; ?></td>
                        <td><?php echo $socio['apellidos']; ?></td>
                        <td><?php echo $socio['dni']; ?></td>
                        <td><?php echo $socio['direccion']; ?></td>
                        <td><?php echo $socio['numero']; ?></td>
                        <td><?php echo $socio['portal']; ?></td>
                        <td><?php echo $socio['poblacion']; ?></td>
                        <td><?php echo $socio['cp']; ?></td>
                        <td><?php echo $socio['provincia']; ?></td>
                        <td><?php echo $socio['correo']; ?></td>
                        <td><?php echo $socio['telefono1']; ?></td>
                        <td><?php echo $socio['aportacion']; ?></td>
                        <td><?php echo $socio['iban']; ?></td>
                        <td><?php echo sprintf("%04d", $socio['entidad']); ?></td>
                        <td><?php echo sprintf("%04d", $socio['oficina']); ?></td>
                        <td><?php echo sprintf("%02d", $socio['dc']); ?></td>
                        <td><?php echo sprintf("%010d", $socio['cuenta']); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <h3>Eliminar Socios</h3>
            <div class="col-md-10"></div>
        </div>
        <form method="post" action="listaSocios.php">
            <div class="row">
                <div class="col-md-1"></div>
                <p class="pr-md-3">Introduce el DNI del Socio a eliminar</p>
                <input type="text" name="socioEliminar" value="">
            </div>
            <div class="row mb-md-5">
                <div class="col-md-1"></div>
                <button class="btn btn-primary boton1" type="submit" role="button" id="btnEliminarSocio"
                        name="btnEliminarSocio">Eliminar Socio
                </button>
            </div>
        </form>
    </div>
    <?php include("./views/partials/footer.part.php"); ?>
</div>

<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>

