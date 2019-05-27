<?php
require_once "./database/connection.php";
$dbh = Connection::make();
include("./views/partials/cabecera.part.php");

$adoptado=false;

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["idgato"])) {
    $stmt = $dbh->prepare("update gatosadopcion set adoptado = true where ref=".$_POST["idgato"] );
    $stmt->execute();
    $adoptado = true;
}

$stmt = $dbh->prepare("select * from gatosadopcion where adoptado=false");   //base de datos regalos
$stmt->execute();
//$basepath = preg_replace('/(.*\/).*$/m','\\1', $_SERVER['REQUEST_URI']);
$basepath = ".";
$gatos = $stmt->fetchAll(PDO:: FETCH_ASSOC);

?>

<div class="container sinPadding">

    <div class="row">
        <div class="col-12 mt-md-5 d-flex justify-content-center titInicio">
            <p class="subtitulo">Gatos en Adopción</p>
        </div>
    </div>

    <form method="post" action="mostrarGatosEnAdopcion.php" id="formularioGatos">
        <?php
            for($i=0;$i<count($gatos);$i++){ ?>
            <div class="row d-flex justify-content-md-center mt-md-5">
                <img class="col-md-5" src=<?php echo $basepath.$gatos[$i]['ruta']?> >
                <div class="col-md-3" id="<?php echo $gatos[$i]?>" name="<?php echo $gatos[$i]?>">
                    <h4>Nombre: <?php echo $gatos[$i]['nombre']?></h4>
                    <h4>Raza: <?php echo $gatos[$i]['raza']?></h4>
                    <h4>Edad: <?php echo $gatos[$i]['edad']?></h4>
                    <h4>Descripción:</h4>
                    <p><?php echo $gatos[$i]['descripcion']?></p>

                </div>
                <div class="col-md-4 mt-md-5 mb-md-5 mt-sm-5 mb-sm-5 mt-5 mb-5">
                    <button class="btn btn-primary boton1" type="submit" name="idgato" role="button" value="<?php echo $gatos[$i]['ref']?>" id="btnadoptar" >Adoptar</button>
                </div>
            </div>
            <hr class="lineaH mt-md-5">
        <?php } ?>

    </form>
</div>





<?php include("./views/partials/footer.part.php");  ?>




