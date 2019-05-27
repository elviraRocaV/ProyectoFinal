<?php
require_once "DataBase/Connection.php";
$dbh = Connection::make();
include("views/partials/cabecera.part.php");


$stmt = $dbh->prepare("select * from gatosadopcion");   //base de datos regalos
$stmt->execute();
$basepath = preg_replace('/(.*\/).*$/m','\\1', $_SERVER['REQUEST_URI']);
$gatos = $stmt->fetchAll(PDO:: FETCH_ASSOC);
?>

<div class="container sinPadding">

    <div class="row">
        <div class="col-12 mt-md-5 d-flex justify-content-center titInicio">
            <p class="subtitulo">Gatos en Adopción</p>
        </div>
    </div>

    <?php

    foreach ($gatos as $gato):
        ?>

        <div class="row d-flex justify-content-md-center mt-md-5">
            <img class="col-md-5" src=<?php echo $basepath.$gato['ruta']?> >
            <div class="col-md-3">
                <h4>Nombre: <?php echo $gato['nombre']?></h4>
                <h4>Raza: <?php echo $gato['raza']?></h4>
                <h4>Edad: <?php echo $gato['edad']?></h4>
                <h4>Descripción:</h4>
                <p><?php echo $gato['descripcion']?></p>
            </div>
            <div class="col-md-4 mt-md-5 mb-md-5 mt-sm-5 mb-sm-5 mt-5 mb-5">
                <button class="btn btn-primary boton1" type="submit" role="button" id="button1">Adoptar</button>
            </div>
        </div>

              <hr class="lineaH mt-md-5">
    <?php endforeach; ?>

</div>

<?php include("views/partials/footer.part.php");  ?>




