<!--<!DOCTYPE html>
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
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse menuPrincipal" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="texto">
                <a class="textMenuPrinci" href="index.php">Inicio</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="queHacemos.php">Qué hacemos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="hazteVoluntario.php">Hazte Voluntario</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="ayudanos.php">Ayudanos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="eventos.html">Eventos</a>
            </li>
            <li class="texto">
                <a class="textMenuPrinci" href="adopcion.html">Adopción</a>
            </li>
        </ul>
    </div>
</nav>-->

<?php require __DIR__."/views/partials/cabecera.part.php";?>


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

                <div class="from-check col-md-12">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="terminos" id="terminos">Acepto Terminos y Condiciones
                    </label>
                </div>

                <div class="row justify-content-around">
                    <div class="col-12 col-sm-12 col-md-5 cajaBoton">
                        <button class="btn btn-primary boton" type="submit">Enviar </button>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 cajaBoton">
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