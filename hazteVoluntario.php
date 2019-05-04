<?php
require_once "Database/Connection.php";
require_once "Entities/Voluntario.php";
$conexion=Connection::make();

require __DIR__."/views/partials/cabecera.part.php";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name=$_POST["usuario"];
    $apellidos=$_POST["apellido"];
    $dni=$_POST["dni"];
    $dia=$_POST["diaFecha"];
    $mes=$_POST["mesFecha"];
    $anyo=$_POST["anyoFecha"];
    $fechaNacimiento=$dia."/".$mes."/".$anyo;
    $direccion=$_POST["direccion"];
    $num=$_POST["numero"];
    $portal=$_POST["portal"];
    $piso=$_POST["piso"];
    $letra=$_POST["letra"];
    $zonaReside=$_POST["zona"];  //????????????? no sé si lo cogerá
    $mail=$_POST["correo"];
    $telf1=$_POST["telefono1"];
    $telf2=$_POST["telefono2"];
    $pass1=$_POST["password1"];
    $pass2=$_POST["password2"];

    $churropassword=password_hash($pass1, PASSWORD_DEFAULT, ["cost"=>15]);

    $stmt1=$conexion->prepare("INSERT INTO voluntariado(usuario, apellido, dni, fechaNacimiento, direccion, numero, portal, piso, letra, zona,correo, telefono1, telefono2, password1)VALUES (:usuarioA, :apellidoA, :dniA, :fechaNacimientoA, :direccionA, :numeroA, :portalA, :pisoA, :letraA, :zonaA,:correoA, :telefono1A, :telefono2A, :password1A)");


    $stmt1->bindParam(':usuarioA',$name);
    $stmt1->bindParam(':apellidoA', $apellidos);
    $stmt1->bindParam(':dniA',   $dni);
    $stmt1->bindParam(':fechaNacimientoA', $fechaNacimiento);
    $stmt1->bindParam(':direccionA',  $direccion);
    $stmt1->bindParam(':numeroA', $num);
    $stmt1->bindParam(':portalA', $portal);
    $stmt1->bindParam(':pisoA',   $piso);
    $stmt1->bindParam(':letraA',   $letra);
    $stmt1->bindParam(':zonaA',    $zonaReside);
    $stmt1->bindParam(':correoA', $mail);
    $stmt1->bindParam(':telefono1A',    $telf1);
    $stmt1->bindParam(':telefono2A',   $telf2);
    $stmt1->bindParam(':password1A',   $pass1);

    $stmt1->execute();
}

?>

<div class="container-fluid">
    <div class="row mt-3 mb-md-5">
        <div class="col-md-12 text-md-center acceso">
            <h2>Hazte Voluntario</h2>
        </div>
    </div>

    <form action="hazteVoluntario.php" method="post">
        <div class="row">
            <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 offset-sm-1">
                <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="usuario" id="usuario" placeholder="Nombre" required onclick="cambiarFondoUsuario()" onblur="cambiarFondoUsuarios(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto1"></div>
            </div>

            <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

            <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-1 offset-sm-1">
                <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="apellido" id="apellido" placeholder="Apellido1 Apellido2" required onclick="cambiarFondoApellido()" onblur="cambiarFondoApellidos(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto2"></div>
            </div>
        </div>

        <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

        <div class="row">
            <div class="col-md-3 col-sm-6 mt-md-5 mt-sm-4 offset-md-2 offset-sm-1">
                <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input class="linea lineahazteVoluntario fondocaja" type="text" name="dni" id="dni" placeholder="00000000-X" required onclick="cambiarFondoDNI()" onblur="cambiarFondoDNIs(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-5">
                <label class="textFormularioVoluntario">&nbsp<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto3"></div>
            </div>

            <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>



            <div class="col-md-3 mt-md-5 mt-sm-4 offset-md-1 offset-sm-1">
                <div class="row">
                    <div class="col-md-12">
                        <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                            <select class="lineahazteVoluntarioFecha linea" name="diaFecha" id="diaFecha" required onblur="cambiarFondoDia(this)">
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

                            <select class="lineahazteVoluntarioFecha linea" name="anyoFecha" id="anyoFecha" onblur="cambiarFondoAnyo(this)">
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
            <div class="col-md-1 col-sm-1 mt-md-5">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto4"></div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="col-md-4 mt-md-4 offset-md-2 offset-sm-1">
                <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="linea lineahazteVoluntarioDirecion" type="text" name="direccion" id="direccion" placeholder="Dirección" required onclick="cambiarFondoDireccion(this)">
                </div>
            </div>

           <div class="col-md-3 offset-md-1 offset-sm-1">
                <div class="row">
                    <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-1">
                        <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                        <input class="linea lineahazteVoluntarioDirec1" type="text" name="numero" id="numero" placeholder="" required onclick="cambiarFondoNumero(this)">
                    </div>
                   <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-5">
                        <label class="textFormularioVoluntario">Portal</label><br>
                        <input class="linea lineahazteVoluntarioDirec2" type="text" name="portal" id="portal" placeholder="" onclick="cambiarFondoPortal()">
                    </div>
                    <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-5">
                        <label class="textFormularioVoluntario">Piso</label><br>
                        <input class="linea lineahazteVoluntarioDirec3" type="text" name="piso" id="piso" placeholder="" onclick="cambiarFondoPiso()">
                    </div>
                    <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-5">
                        <label class="textFormularioVoluntario">Letra</label><br>
                        <input class="linea lineahazteVoluntarioDirec4" type="text" name="letra" id="letra" placeholder="" onclick="cambiarFondoLetra()">
                    </div>
                </div>
           </div>
            <div class="col-md-1 col-sm-1 mt-md-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-md-5 offset-md-2 offset-sm-1">
                <label class="textFormularioVoluntario">Zona donde reside <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                     <select class="lineahazteVoluntarioZona linea" name="zona" id="zona" required onchange="cambiarFondoResides(this)">
                         <option class="textFormularioVoluntario" value="">Zona a Elegir</option>
                         <option value="Moncada">Moncada</option>
                         <option value="Barrio">Barrio</option>
                         <option value="Barrio de los Dolores">Barrio de los Dolores</option>
                         <option value="Masías">Masías</option>
                         <option value="San Antonio de Benagueber">San Antonio de Benagueber</option>
                     </select>
                 </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-5">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto6"></div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

    </div>

    <div class="container">
            <div class="col-md-2 mt-md-3 mt-sm-3 offset-md-1">
                <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="linea lineahazteVoluntarioCorreo fondocaja" type="text" name="correo" id="correo" placeholder="xxxxx@xxx.xxx" required onclick="cambiarFondoCorreo()" onblur="cambiarFondoCorreos(this)" >
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto7"></div>
            </div>
            <div class="col-md-2 mt-md-3 offset-sm-1">
                <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="linea lineahazteVoluntarioTelef fondocaja" type="text" name="telefono1" id="telefono1" placeholder="Telefono 1" required onclick="cambiarFondoTelf1()" onblur="cambiarFondoTelf1s(this)">
                </div>
            </div>
            <div class="col-md-1 col-sm-1 mt-md-3">
                <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                <div class="input-group" id="visto8"></div>
            </div>
            <div class="col-md-2 mt-md-3 offset-sm-1 ml-md-3">
                <label class="textFormularioVoluntario">Telefono 2</label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input class="linea lineahazteVoluntarioTelef2 fondocaja" type="text" name="telefono2" id="telefono2" placeholder="Telefono 2" required onclick="cambiarFondoTelf2()" onblur="cambiarFondoTelf2s(this)">
                </div>
            </div>
            <div class="col-md-2 mt-md-3 offset-sm-1">
            </div>
        </div>

        <hr class="lineaH mt-md-5">

    <div class="container">
            <div class="row">
                <div class="col-md-3 offset-md-1 mt-md-5 mb-md-3 mt-sm-4 offset-sm-1 mr-md-5">
                    <label class="textFormularioVoluntario">Contraseña Usuario <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="linea lineahazteVoluntario fondocaja" type="password" name="password1" id="password1" placeholder="contraseña" required onclick="cambiarFondoPassword1()" onblur="cambiarFondoPassword1s(this)">
                        </div>
                </div>
                <div class="col-md-1 col-sm-1 mt-md-5">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto9"></div>
                </div>

                <div class="col-md-3 offset-md-2 mt-md-5 mb-md-3 cajaContrasenyas">
                    <label class="textFormularioVoluntario">Contraseña Usuario <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="linea lineahazteVoluntario fondocaja" type="password" name="password2" id="password2" placeholder="contraseña" required onclick="cambiarFondoPassword2()" onblur="cambiarFondoPassword2s(this)">
                    </div>
                    </div>
                    <div class="col-md-1 col-sm-1 mt-md-5">
                        <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                        <div class="input-group" id="visto10"></div>
                    </div>
            </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="mt-md-5 mb-md-5">
                <div class="btn btn-primary boton1" role="button" id="button1">Enviar</div>
            </div>

            <div class="mt-md-5 mb-md-5">
                <div class="btn btn-primary boton1" role="button" id="button1">Siguiente</div>
            </div>

            <!--<div class="offset-md-2 mt-md-5 mb-md-5">
                <a href="coloniasGatos.php" class="btn btn-primary boton1" id="boton2" style="display:inline" role="button">Siguiente </a>
            </div>-->
        </div>
    </div>
    </form>


<?php
include("views/partials/footer.part.php");
?>

<script type="text/javascript" src="jsValidar/validar.js"></script>

