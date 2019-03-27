<!DOCTYPE html>
<html>
<head>
    <title>Ayudanos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Kanit|Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container-fluid">
    <header class="row mt-1 cabeza">
        <div class="col-2 mt-4 imagenlogo">
            <img width="100%"  src="imagenes/logoAyunt.png">
        </div>
        <h1 class="col-7 text-sm-center text-md-center text-xs-center ml-5"><em><strong>Plan Esterilización Felina</strong></em></h1>
        <div class="col-2 mt-3 ml-4 imagenlogo">
            <img width="100%" src="imagenes/logoCEU.png">
        </div>
    </header>
</div>

<nav class=" navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse menuPrincipal" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="texto">
                <a class="textMenuPrinci" href="index.html">Inicio</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="queHacemos.html">Qué hacemos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="voluntariado.php">Hazte Voluntario</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="ayudanos.php">Ayudanos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="eventos.html">Eventos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="Adopcion.html">Adopción</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <div class="row mb-5">
        <div class="col">
            <form action="">
                <div class="form-group caixa mt-5">
                    <div class="row justify-content-around">
                        <div class="caixa1 col-md-3">
                            <label>Nombre</label><br>
                            <input class="linea fondocaja" type="text" name="nombre" id="nombre" placeholder="Nombre">
                        </div>

                        <div class="caixa2 col-md-7">
                            <label>Apellidos</label><br>
                            <input class="linea fondocaja" type="text" name="apellidos" id="nombre" placeholder="Apellidos">
                        </div>
                    </div>
                </div>

                <div class="form-group caixa mt-5 mb-5">
                    <div class="row justify-content-around">
                        <div class="caixa1 col-md-3">
                            <label>DNI/NIE</label><br>
                            <input class="linea fondocaja" type="text" name="dni" id="dni" placeholder="DNI/NIE">
                        </div>
                        <div class="caixa2 col-md-7">
                            <label>Fecha de nacimiento</label><br>
                            <input class="linea fondocaja" type="text" name="nacimiento" id="nacimiento" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                </div>

                <div class="caixa2 col-md-3 ml-4">
                    <div class="from-check ">
                        <label>Sexo</label><br>
                        <label class="form-check-label">
                            <input class="linea from-check-input mr-2" type="radio" name="sexo" id="hombre">Hombre
                        </label>
                    </div>
                    <div class="from-check">
                        <label class="form-check-label">
                            <input class="linea from-check-input mr-2" type="radio" name="sexo" id="hombre">Mujer
                        </label>
                    </div>
                </div>

                <hr class="linea">

                <div class="form-group caixa mt-5 mb-5">
                    <div class="row justify-content-around">
                        <div class="caixa1 col-md-3">
                            <label>Dirección</label><br>
                            <input class="linea fondocaja" type="text" name="direccion" id="direccion" placeholder="Direccion">
                        </div>
                        <div class="caixa2 col-md-1">
                            <label>Nº</label><br>
                            <input class="direc linea fondocaja" type="text" name="numero" id="numero">
                        </div>
                        <div class="caixa2 col-md-1">
                            <label>Portal</label><br>
                            <input class="direc linea fondocaja" type="text" name="portal" id="portal">
                        </div>
                        <div class="caixa2 col-md-1">
                            <label>Piso</label><br>
                            <input class="direc linea fondocaja" type="text" name="piso" id="piso">
                        </div>
                        <div class="caixa2 col-md-1">
                            <label>Letra</label><br>
                            <input class="direc linea fondocaja" type="text" name="letra" id="letra">
                        </div>
                    </div>
                </div>

                <hr class="linea">

                <div class="form-group caixa mt-5 mb-5">
                    <div class="row justify-content-around">
                        <div class="caixa1 col-md-3">
                            <label>Población</label><br>
                            <input class="linea fondocaja" type="text" name="poblacion" id="poblacion" placeholder="Población">
                        </div>
                        <div class="caixa1 col-md-3">
                            <label>Código postal</label><br>
                            <input class="linea fondocaja" type="text" name="cp" id="cp" placeholder="Código postal">
                        </div>
                        <div class="caixa1 col-md-3">
                            <label>Provincia</label><br>
                            <input class="linea fondocaja" type="text" name="provincia" id="provincia" placeholder="Provincia">
                        </div>
                    </div>
                </div>

                <hr class="linea">

                <div class="form-group caixa mt-5 mb-5">
                    <div class="row justify-content-around">
                        <div class="caixa1 col-md-3">
                            <label>Correo electrónico</label><br>
                            <input class="linea fondocaja" type="text" name="mail" id="mail" placeholder="Correo electrónico">
                        </div>
                        <div class="caixa2 col-md-7">
                            <label>Teléfono</label><br>
                            <input class="linea fondocaja" type="text" name="telefono" id="telefono" placeholder="Teléfono">
                        </div>
                    </div>
                </div>

                <hr class="linea">

                <div class="form-group caixa mt-5 mb-5">
                    <div class="row justify-content-around">
                        <div class="caixa1 col-md-3">
                            <label>Calle ubicación colonia</label><br>
                            <input class="linea fondocaja" type="text" name="calleColonia" id="calleColonia" placeholder="calle ubicación colonia">
                        </div>
                        <div class="caixa2 col-md-3">
                            <label>Número total de felinos</label><br>
                            <input class="linea fondocaja" type="text" name="numGatos" id="numGatos" placeholder="Número aprox gatos">
                        </div>
                        <div class="caixa2 col-md-3">
                            <label>Número de gatas</label><br>
                            <input class="linea fondocaja" type="text" name="numGatas" id="numGatas" placeholder="Número aprox gatas">
                        </div>
                    </div>
                </div>

             <!--   <div class="from-check col-md-12">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="terminos" id="terminos">Acepto Terminos y Condiciones
                    </label>
                </div>-->

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 ml-5 cajaBoton">
                        <button class="btn btn-primary boton" type="submit">Enviar </button>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 cajaBoton">
                        <button class="btn btn-primary boton1" type="submit">Limpiar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php









?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>