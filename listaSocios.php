<?php
require_once "./database/connection.php";
require_once "Entities/Socio.php";
$conexion=Connection::make();
include("./views/partials/cabeceraAdministrador.php");

$DniSocioEliminar="";

if(isset($_POST["socioEliminar"]))
{
    $DniSocioEliminar=$_POST["socioEliminar"];
    $DniSocioEliminar=strtoupper($DniSocioEliminar);
    $stmt = $conexion->prepare("DELETE  FROM socios WHERE dni=\"$DniSocioEliminar\"");
    $stmt->execute();
}
?>

<div class="container sinPadding">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-md-3 mt-md-5">
            <p class="subtitulo">Lista Socios</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center" style="height: 100%">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Fecha Nacimiento</th>
                    <th>Dirección</th>
                    <th>Núm</th>
                    <th>Portal</th>
                    <th>Piso</th>
                    <th>Letra</th>
                    <th>Población</th>
                    <th>CP</th>
                    <th>Provincia</th>
                    <th>Email</th>
                    <th>Telf1</th>
                    <th>Telf2</th>
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
    $socios =$stmt->fetchAll(PDO:: FETCH_ASSOC);

        foreach ($socios as $socio)
        {?>
            <tr>
            <td><?php echo $socio['nombre'];?></td>
            <td><?php echo $socio['apellido'];?></td>
            <td><?php echo $socio['dni'];?></td>
            <td><?php echo $socio['fechanacimiento'];?></td>
            <td><?php echo $socio['direccion'];?></td>
            <td><?php echo $socio['numero'];?></td>
            <td><?php echo $socio['portal'];?></td>
            <td><?php echo $socio['piso'];?></td>
            <td><?php echo $socio['letra'];?></td>
            <td><?php echo $socio['poblacion'];?></td>
            <td><?php echo $socio['cp'];?></td>
            <td><?php echo $socio['provincia'];?></td>
            <td><?php echo $socio['email'];?></td>
            <td><?php echo $socio['telefono1'];?></td>
            <td><?php echo $socio['telefono2'];?></td>
            <td><?php echo $socio['cantidad'];?></td>
            <td><?php echo $socio['iban'];?></td>
            <td><?php echo $socio['entidad'];?></td>
            <td><?php echo $socio['oficina'];?></td>
            <td><?php echo $socio['dc'];?></td>
            <td><?php echo $socio['cuenta'];?></td>
            </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
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
            <button class="btn btn-primary boton1" type="submit" role="button" id="btnEliminarSocio" name="btnEliminarSocio">Eliminar Socio</button>
        </div>
    </form>

</div>

<?php include("./views/partials/footer.part.php");  ?>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>

