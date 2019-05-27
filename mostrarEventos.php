<?php
require_once "DataBase/Connection.php";
$dbh = Connection::make();
include("views/partials/cabecera.part.php");

$basepath = preg_replace('/(.*\/).*$/m','\\1', $_SERVER['REQUEST_URI']);

$stmt = $dbh->prepare("select * from eventos where fecha > current_date ");   //base de datos regalos
$stmt->execute();
$basepath = preg_replace('/(.*\/).*$/m','\\1', $_SERVER['REQUEST_URI']);
$eventos = $stmt->fetchAll(PDO:: FETCH_ASSOC);
?>

<div class="container sinPadding">

    <div class="row">
        <div class="col-12 mt-md-5 d-flex justify-content-center titInicio">
            <p class="subtitulo">Eventos Asociación</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="gatosAdopcion/entrada.jpg" width="900px">
        </div>
    </div>

    <div class="row mt-md-5">
        <?php for($i=0;$i<count($eventos);$i++)
        {
            $fecha=new DateTime($eventos[$i]['fecha'])
            ?>
        <div class="col-md-4 mt-md-5">
            <img class="col-md-5" src=<?php echo $basepath.$eventos[$i]['ruta']?>>
            <h4>Fecha:<?php echo $fecha->format('d-m-Y')?></h4>
            <h4>Hora:<?php echo $fecha->format('H:i:s')?></h4>
            <h2><?php echo $eventos[$i]['nombre']?></h2>
            <h4>Descripción:<?php echo $eventos[$i]['descripcion']?></h4>
        </div>

       <?php }?>

    </div>
</div>

<?php include("views/partials/footer.part.php");  ?>
