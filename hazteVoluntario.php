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


<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12 text-md-center acceso">
            <h2>Hazte Voluntario</h2>
        </div>
    </div>

    <form action="">
        <div class="row justify-content-between">
            <div class="col-md-3 mt-3">
                <label class="textFormularioVoluntario">Nombre</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="usuario" id="usuario" placeholder="Nombre" onfocus="cambiarFondoUsuario(this)">
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <label class="textFormularioVoluntario">Apellidos</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="apellido" id="apellido" placeholder="apellido" onfocus="cambiarFondoApellido(this)">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-5 offset-2">
                <label class="textFormularioVoluntario">DNI</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="dni" id="dni" placeholder="DNI" onfocus="cambiarFondoDNI(this)">
                </div>
            </div>
            <div class="col-md-5 mt-5 offset-md-2">
                <label class="textFormularioVoluntario">Fecha nacimiento</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                    <select class="lineahazteVoluntarioFecha linea" name="diaFecha" id="diaFecha">
                        <option value="">Día</option>
                        <?php
                            for($i=1;$i<=31;$i++):
                               ?> <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
                        <?php
                            endfor;
                            ?>
                    </select>

                    <select class="lineahazteVoluntarioFechaMes linea" name="mesFecha" id="mesFecha">
                        <option value="">Mes</option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>

                    <select class="lineahazteVoluntarioFecha linea" name="anyoFecha" id="anyoFecha">
                        <option value="">Año</option>
                        <?php

                        $anyoActual=date("Y",time());
                        $anyoMin=$anyoActual-18;

                        for($j=$anyoMin;$j>=diaAnyo;$j--):

                        ?> <option value="<?php echo $j ?> "> <?php echo $j ?> </option>
                        <?php
                        endfor;
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="col-md-3 mt-3 offset-md-2 mr-md-5">
                <label class="textFormularioVoluntario">Dirección</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="linea lineahazteVoluntarioDirecion" type="text" name="direccion" id="direccion" placeholder="Dirección" onfocus="cambiarFondoDireccion(this)">
                </div>
            </div>

            <div class="col-md-1 mt-3 offset-md-1">
                <label class="textFormularioVoluntario">Nº</label><br>
                <input class="linea lineahazteVoluntarioDirec" type="text" name="numero" id="numero" placeholder="" onfocus="cambiarFondoNumero(this)">
            </div>
            <div class="col-md-1 mt-3">
                <label class="textFormularioVoluntario">Portal</label><br>
                <input class="linea lineahazteVoluntarioDirec" type="text" name="portal" id="portal" placeholder="" onfocus="cambiarFondoPortal(this)">
            </div>
            <div class="col-md-1 mt-3">
                <label class="textFormularioVoluntario">Piso</label><br>
                <input class="linea lineahazteVoluntarioDirec" type="text" name="piso" id="piso" placeholder="" onfocus="cambiarFondoPiso(this)">
            </div>
            <div class="col-md-1 mt-3">
                <label class="textFormularioVoluntario">Letra</label><br>
                <input class="linea lineahazteVoluntarioDirec" type="text" name="letra" id="letra" placeholder="" onfocus="cambiarFondoLetra(this)">
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 mt-md-5 offset-md-2">
                <label class="textFormularioVoluntario">Zona donde reside</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                     <select class="lineahazteVoluntarioZona linea" name="zona" id="zona">
                         <option value="">Zona a Elegir</option>
                         <option value="">Moncada</option>
                         <option value="">Barrio</option>
                         <option value="">Barrio de los Dolores</option>
                         <option value="">Masías</option>
                         <option value="">San Antonio de Benagueber</option>
                     </select>
                 </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="col-md-3 mt-3 offset-md-2">
                <label class="textFormularioVoluntario">Correo Electrónico</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="linea lineahazteVoluntarioCorreo fondocaja" type="text" name="correo" id="correo" placeholder="Correo Electrónico" onfocus="cambiarFondoUsuario(this)">
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <label class="textFormularioVoluntario">Telefono 1</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="linea lineahazteVoluntarioTelef fondocaja" type="text" name="telefono1" id="telefono1" placeholder="Telefono 1" onfocus="cambiarFondoApellido(this)">
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <label class="textFormularioVoluntario">Telefono 2</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="linea lineahazteVoluntarioTelef fondocaja" type="text" name="telefono2" id="telefono2" placeholder="Telefono 2" onfocus="cambiarFondoApellido(this)">
                </div>
            </div>
        </div>

            <hr class="lineaH mt-md-5">


        <div class="row mt-3">
            <div class="col-12 text-md-center acceso">
                <h3>Datos Colonia</h3>
            </div>
        </div>













        <!--     <div class="row justify-content-around">
                 <div class="caixa1 col-md-12">
                     <label>Nombre</label><br>
                     <div class="input-group">
                         <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                         <input class="linea lineaVoluntario fondocaja" type="text" name="nombre" id="nombre" placeholder="Nombre" onfocus="cambiarFondoUsuario(this)">
                     </div>
                     <label>Apellidos</label><br>
                     <div class="input-group">
                         <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                         <input class="linea lineaVoluntario fondocaja" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" onfocus="cambiarFondoUsuario(this)">
                     </div>
                 </div>
             </div>

    <!-- </form>-->


<!--<div class="form-group caixa mt-5 mb-5">
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

<!--<div class="row">
    <div class="col-12 col-sm-12 col-md-2 ml-5 cajaBoton">
        <button class="btn btn-primary boton" type="submit">Enviar </button>
    </div>
    <div class="col-12 col-sm-12 col-md-3 cajaBoton">
        <button class="btn btn-primary boton1" type="submit">Limpiar </button>
    </div>
</div>-->
</form>
</div>
</div>
</div>

<script type="text/javascript" src="jsValidar/validar.js"></script>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>