<?php
session_start();
require_once "Database/Connection.php";
require_once "Entities/Voluntario.php";
$conexion=Connection::make();
?>

<!DOCTYPE html>
<html>
<head>
    <title>gatos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Kanit|Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="icono/fonts/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="iconmoon/style.css">
</head>
<body>

<div class="container-fluid">
    <header class="row mt-3 justify-content-md-around">

        <div class="col-md-2 col-sm-6 col-6 mt-md-4 mt-sm-1 text-sm-left ml-md-2 posLogo1">
            <img class="imagenlogo" src="imagenes/logoAyunt.png">
        </div>

        <div class="col-md-7  ml-5 textoPlan text-md-center text-sm-center text-center">
            <h1 class="pt-md-4 textoTitle"><em><strong>Plan Esterilización Felina</strong></em></h1>
        </div>

        <div class="col-md-2 col-sm-6 col-6 mt-md-3 mt-sm-1 ml-md-4 mr-md-1 text-sm-right text-right posLogo2">
            <img class="imagenlogo" src="imagenes/logoCEU.png">
        </div>
    </header>
</div>


<div class="container-fluid">
    <div class="row justify-content-md-end justify-content-sm-start">
        <div class="col-md-2 col-sm-4 col-4 mt-2 accesoVoluntarios">
            <a class="textoAcceso" href="accesoVoluntarios.php">Acceso voluntarios<span class="icon-enter icono ml-2"></span></a>
        </div>
    </div>
</div>

<nav class=" navbar navbar-expand-lg navbar-light bg-light justify-content-sm-start">
    <button class="navbar-toggler botonMenu" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse menuPrincipal" id="navbarNavDropdown">

        <a class="navbar-brand mb-md-4 ml-md-5 gato" href="index.php">
            <img src="imagenes/gatoBlanco.png" style="width: 45px">
        </a>
        <ul class="navbar-nav">
            <li class="texto mt-md-2 ml-md-3 ">
                <a class="textMenuPrinci anchoCeldaMenu" href="hazteVoluntario.php">Hazte Voluntario</a>
            </li>
            <li class="texto mt-md-2 ml-md-3">
                <a class="textMenuPrinci" href="ayudanos.php">Hazte Sócio</a>
            </li>
            <li class="texto mt-md-2 ml-md-3">
                <a class="textMenuPrinci" href="eventos.php">Eventos</a>
            </li>
            <li class="texto mt-md-2 ml-md-3">
                <a class="textMenuPrinci" href="adopcion.php">Adopción</a>
            </li>
        </ul>
    </div>
</nav>

<?php


$dni=$_SESSION["dniVoluntario"];

$stmt=$conexion->prepare("select * from voluntariado where dni=:dni");
$stmt->execute([':dni'=>$dni]);

$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Voluntario");   //nombre de la base de datos.
$voluntari=$stmt->fetch();

?>

<div class="container-fluid sinPadding">
    <div class="row">
        <div class="container sinPadding">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="subtitulo">Datos Voluntario</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h3>Sus datos son:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <label>Nombre</label>
                    <input type="text" value="<?php echo $voluntari->getNombre();?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <label>Apellidos</label>
                    <input type="text" value="<?php echo $voluntari->getApellidos()?>">
                </div>
            </div>








        </div>
    </div>
</div>





