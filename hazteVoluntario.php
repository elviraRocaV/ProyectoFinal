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
        <div class="col-md-12 text-md-center acceso">
            <h2>Hazte Voluntario</h2>
        </div>
    </div>

    <form action="">
        <div class="row">
            <div class="col-md-3 col-sm-6 mt-md-3 offset-md-2">
                <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="usuario" id="usuario" placeholder="Nombre" onclick="cambiarFondoUsuario()" onblur="cambiarFondoUsuarios(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-5 mt-sm-5">
                <div id="visto1"></div>
            </div>

            <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

            <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-1">
                <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="apellido" id="apellido" placeholder="Apellido1 Apellido2" onclick="cambiarFondoApellido()" onblur="cambiarFondoApellidos(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-5 mt-sm-5">
                <div id="visto2"></div>
            </div>
        </div>

        <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

        <div class="row">
            <div class="col-md-3 col-sm-6 mt-md-5 mt-sm-4 offset-md-2">
                <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="dni" id="dni" placeholder="00000000-X" onclick="cambiarFondoDNI()" onblur="cambiarFondoDNIs(this)">
                </div>
            </div>
           <div class="col-md-1 col-sm-1 mt-md-5 mt-sm-5 ubicarVisto">
                <div id="visto3"></div>
            </div>

            <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

            <div class="col-md-3 mt-md-5 offset-md-1">
                <div class="row">
                    <div class="col-md-12">
                        <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                            <select class="lineahazteVoluntarioFecha linea" name="diaFecha" id="diaFecha" onblur="cambiarFondoDia(this)">
                                <option value="">Día</option>
                                <?php
                                for($i=1;$i<=31;$i++):
                                    ?> <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
                                <?php
                                endfor;
                                ?>
                            </select>

                            <select class="lineahazteVoluntarioFechaMes linea" name="mesFecha" id="mesFecha" onblur="cambiarFondoMes(this)">
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

                            <select class="lineahazteVoluntarioFecha linea" name="anyoFecha" id="anyoFecha" onclick="cambiarFondoAnyo()" onblur="cambiarFondoAnyos(this, diafecha, mesFecha)">
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
            </div>
            <div class="col-md-1 mt-md-5">
                <div id="visto4"></div>
            </div>
        </div>


        <hr class="lineaH mt-md-5">


        <div class="row">
            <div class="col-md-4 mt-3 offset-md-2">
                <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="linea lineahazteVoluntarioDirecion" type="text" name="direccion" id="direccion" placeholder="Dirección" onclick="cambiarFondoDireccion(this)">
                </div>
            </div>

           <div class="col-md-3 mt-md-3 offset-md-1">
                <div class="row justify-content-md-around">
                    <div class="col-md-3">
                        <label class="textFormularioVoluntario">Nº<span class="asterisco"> *</span></label><br>
                        <input class="linea lineahazteVoluntarioDirec1" type="text" name="numero" id="numero" placeholder="" onclick="cambiarFondoNumero(this)">
                    </div>
                   <div class="col-md-3">
                        <label class="textFormularioVoluntario">Portal</label><br>
                        <input class="linea lineahazteVoluntarioDirec2" type="text" name="portal" id="portal" placeholder="" onclick="cambiarFondoPortal()">
                    </div>
                    <div class="col-md-3">
                        <label class="textFormularioVoluntario">Piso</label><br>
                        <input class="linea lineahazteVoluntarioDirec3" type="text" name="piso" id="piso" placeholder="" onclick="cambiarFondoPiso()">
                    </div>
                    <div class="col-md-3">
                        <label class="textFormularioVoluntario">Letra</label><br>
                        <input class="linea lineahazteVoluntarioDirec4" type="text" name="letra" id="letra" placeholder="" onclick="cambiarFondoLetra()">
                    </div>
                </div>
           </div>
            <div class="col-md-1 mt-md-5">
                <div id="visto5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 mt-md-5 offset-md-2">
                <label class="textFormularioVoluntario">Zona donde reside <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                     <select class="lineahazteVoluntarioZona linea" name="zona" id="zona" onblur="cambiarFondoResides(this)">
                         <option class="textFormularioVoluntario" value="">Zona a Elegir</option>
                         <option value="Moncada">Moncada</option>
                         <option value="Barrio">Barrio</option>
                         <option value="Barrio de los Dolores">Barrio de los Dolores</option>
                         <option value="Masías">Masías</option>
                         <option value="San Antonio de Benagueber">San Antonio de Benagueber</option>
                     </select>
                 </div>
            </div>
            <div class="col-md-1 mt-md-5 mr-md-5">
                <div id="visto6"></div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">


        <div class="row mb-md-5">
            <div class="col-md-2 mt-md-3 offset-md-2">
                <label class="textFormularioVoluntario">Correo Electrónico <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="linea lineahazteVoluntarioCorreo fondocaja" type="text" name="correo" id="correo" placeholder="xxxxx@xxx.xxx" onclick="cambiarFondoCorreo()" onblur="cambiarFondoCorreos(this)" >
                </div>
            </div>
            <div class="col-md-1 mt-md-5">
                <div id="visto7"></div>
            </div>
            <div class="col-md-2 mt-md-3">
                <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="linea lineahazteVoluntarioTelef fondocaja" type="text" name="telefono1" id="telefono1" placeholder="Telefono 1" onclick="cambiarFondoTelf1()" onblur="cambiarFondoTelf1s(this)">
                </div>
            </div>
            <div class="col-md-1 mt-md-5">
                <div id="visto8"></div>
            </div>
            <div class="col-md-2 mt-md-3">
                <label class="textFormularioVoluntario">Telefono 2</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="linea lineahazteVoluntarioTelef2 fondocaja" type="text" name="telefono2" id="telefono2" placeholder="Telefono 2" onclick="cambiarFondoTelf2()" onblur="cambiarFondoTelf2s(this)">
                </div>
            </div>
        </div>


        <hr class="lineaH mt-md-5">


        <div class="row">
            <div class="col-md-3 mt-md-3 offset-md-2 mt-md-5">
                <label class="textFormularioVoluntario">Contraseña Usuario <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="password" name="password1" id="password1" placeholder="contraseña" onclick="cambiarFondoPassword1()" onblur="cambiarFondoPassword1s(this)">
                </div>
            </div>
            <div class="col-md-1 mt-md-5">
                <div id="visto1"></div>
            </div>
            <div class="col-md-3 mt-md-3 offset-md-1 mt-md-5">
                <label class="textFormularioVoluntario">Vuelva a introducir la contraseña <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="password" name="password2" id="password2" placeholder="contraseña" onclick="cambiarFondoPassword2()" onblur="cambiarFondoPassword2s(this)">
                </div>
            </div>
            <div class="col-md-1 mt-md-5">
                <div id="visto10"></div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class=" cajaBoton mt-md-5">
                    <a href="coloniasGatos.php" class="btn btn-primary boton1" role="button">Enviar</a>
                </div>

                <div class=" cajaBoton mt-md-5 ml-md-5">
                    <a href="coloniasGatos.php" class="btn btn-primary boton1" role="button">Siguiente </a>
                </div>
            </div>
        </div>















    </form>


    <div class="container">

    </div>

</div>


<script type="text/javascript" src="jsValidar/validar.js"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>