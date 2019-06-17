<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>gatos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="icono/fonts/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="iconmoon/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Kanit|Lobster" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>

<?php
$error = false;

if (isset($_SESSION["dniVoluntario"]) && isset($_SESSION["Administrator"])) {
    $dni = $_SESSION["dniVoluntario"];  //es un nombre de variable
} else {
    $error=true;
    $Title = "Error";
    $Text = "Sesión no Iniciada. Debe Iniciar Sesión";
}
?>

<div class="container-fluid">
    <div class="row mt-3 justify-content-md-around">

        <div class="col-md-2 col-sm-6 col-6 mt-md-4 mt-sm-1 text-sm-left ml-md-2 posLogo1">
            <a href="http://www.moncada.es/"><img class="imagenlogo" src="imagenes/logoAyunt.png"></a>
        </div>

        <div class="col-md-7 col-sm-12 col-12 ml-5 textoPlan text-md-center text-sm-center text-center">
            <h1 class="pt-md-4"><em><strong>Plan Esterilización Felina</strong></em></h1>
        </div>

        <div class="col-md-2 col-sm-6 col-6 mt-md-3 mt-sm-1 ml-md-4 mr-md-1 text-sm-right text-right posLogo2">
            <a href="http://www.colegioceuvalencia.es/"><img class="imagenlogo" src="imagenes/logoCEU.png"></a>
        </div>
    </div>
</div>

<nav class=" navbar navbar-expand-lg navbar-light bg-light sinPadding">
    <button class="navbar-toggler botonMenu" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse menuPrincipal" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="texto">
                <a class="textMenuPrinci" href="index.php">Inicio</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="listaVoluntarios.php">Lista Voluntarios</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="listaSocios.php">Lista Sócios</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="introducirEventos.php">Crear Eventos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="introducirGatosEnAdopcion.php">Añadir Adopciones</a>
            </li>
        </ul>
    </div>
</nav>

<script src="js/bootstrap.min.js"></script>

<!-- Mensaje Modal-->
<div class="modal alert-light" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered alert " role="document">
        <div id="modaltype" class="modal-content alert">
            <div id="modaltype2" class="modal-header alert">
                <h2 class="modal-title" id="exampleModalLongTitle"><?php echo $Title ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $Text ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#modalMessage").click(function () {
        window.location = "accesoVoluntarios.php";
    });

    <?php if ($error) { ?>
        $(document).ready(function () {
            $('#modalMessage').modal('show'); $('#modaltype').addClass("alert-danger"); $('#modaltype2').addClass("alert-danger");
        });
    <?php } ?>

</script>