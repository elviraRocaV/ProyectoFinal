<?php
require_once "./database/connection.php";
$dbh = Connection::make();
include("./views/partials/cabecera.part.php");

$stmt = $dbh->prepare("select * from eventos where fecha > current_date ");   //base de datos regalos
$stmt->execute();

//$basepath = preg_replace('/(.*\/).*$/m','\\1', $_SERVER['REQUEST_URI']);
$basepath=".";
$eventos = $stmt->fetchAll(PDO:: FETCH_ASSOC);
?>

<div class="container sinPadding">

    <div class="row">
        <div class="col-12 mt-md-5 d-flex justify-content-center titInicio mb-md-4">
            <p class="subtitulo">Eventos Asociación</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="gatosadopcion/entrada.jpg" width="850px">
        </div>
    </div>

    <div class="row mt-md-5">
        <?php for($i=0;$i<count($eventos);$i++)
        {
            $fecha=new DateTime($eventos[$i]['fecha'])
            ?>
        <div class="col-md-4 mt-md-5">
            <img style="width: 70%;" src=<?php echo $basepath.$eventos[$i]['ruta']?>>

            <h4><?php echo $eventos[$i]['nombre']?></h4>
            <h5>Fecha:<?php echo $fecha->format('d-m-Y')?></h5>
            <h5>Hora:<?php echo $fecha->format('H:i:s')?></h5>

            <h5>Descripción:<?php echo $eventos[$i]['descripcion']?></h5>
        </div>

       <?php }?>

    </div>
</div>

<?php
include("./views/partials/footer.part.php");  ?>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>
