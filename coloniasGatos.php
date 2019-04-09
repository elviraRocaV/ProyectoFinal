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
</head>
<body>

<div class="container-fluid">
    <header class="row mt-3 justify-content-md-around">

        <div class="col-md-2 col-sm-6 col-6 mt-md-4 mt-sm-1 text-sm-left ml-md-2 posLogo1">
            <img class="imagenlogo" src="imagenes/logoAyunt.png">
        </div>

        <div class="col-md-7 col-sm-12 col-12 ml-5 textoPlan text-md-center text-sm-center text-center">
            <h1 class="pt-md-4"><em><strong>Plan Esterilización Felina</strong></em></h1>
        </div>

        <div class="col-md-2 col-sm-6 col-6 mt-md-3 mt-sm-1 ml-md-4 mr-md-1 text-sm-right text-right posLogo2">
            <img class="imagenlogo" src="imagenes/logoCEU.png">
        </div>
    </header>
</div>

<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler botonMenu" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse menuPrincipal" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="texto">
                <a class="textMenuPrinci" href="index.html">Inicio</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="queHacemos.html">Qué hacemos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="hazteVoluntario.php">Hazte Voluntario</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="ayudanos.html">Ayudanos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="eventos.html">Eventos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="adopcion.html">Adopción</a>
            </li>
        </ul>
    </div>
</nav>

<div class="row mt-3">
    <div class="col-md-12 text-md-center acceso">
        <h3>Datos Colonia</h3>
    </div>
</div>

<form action="">
    <div class="row justify-content-between">
        <div class="col-md-3 mt-3">
            <label class="textFormularioVoluntario">Calle de referencia</label><br>
            <div class="input-group">
                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                <input class="linea lineahazteVoluntario fondocaja" type="text" name="gatoCalle" id="gatoCalle" placeholder="Calle referencia" onfocus="cambiarFondoUsuario(this)">
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <label class="textFormularioVoluntario">Nº total de gatos</label><br>
            <div class="input-group">
                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                <input class="linea lineahazteVoluntario fondocaja" type="text" name="numTotalGatos" id="numTotalGatos" placeholder="apellido" onfocus="cambiarFondoApellido(this)">
            </div>
        </div>
    </div>






</form>





<script type="text/javascript" src="jsValidar/validar.js"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>