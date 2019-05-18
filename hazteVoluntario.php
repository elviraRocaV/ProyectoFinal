<?php
session_start();
require_once "Database/Connection.php";
$conexion=Connection::make();

require __DIR__."/views/partials/cabecera.part.php";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST["usuario"]))
    {
        $name=strtoupper($_POST["usuario"]);
    }

    if(isset($_POST["apellido"]))
    {
        $apellidos=strtoupper($_POST["apellido"]);
    }

    if(isset($_POST["dni"]))
    {
        $dni=strtoupper($_POST["dni"]);
    }

    if(isset($_POST["diaFecha"]))
    {
        $dia=$_POST["diaFecha"];
    }

    if(isset($_POST["mesFecha"]))
    {
        $mes=$_POST["mesFecha"];
    }

    if(isset($_POST["anyoFecha"]))
    {
        $anyo=$_POST["anyoFecha"];
    }

    if(isset($_POST["direccion"]))
    {
        $direccion=strtoupper($_POST["direccion"]);
    }

    if(isset($_POST["numero"]))
    {
        $num=$_POST["numero"];
    }

    if(isset($_POST["portal"]))
    {
        $portal=$_POST["portal"];
    }

    if(isset($_POST["piso"]))
    {
        $piso=$_POST["piso"];
    }

    if(isset($_POST["letra"]))
    {
        $letra=strtoupper($_POST["letra"]);
    }

    if(isset($_POST["zona"]))
    {
        $zonaReside=strtoupper($_POST["zona"]);  //????????????? no sé si lo cogerá
    }

    if(isset($_POST["correo"]))
    {
        $mail=strtoupper($_POST["correo"]);
    }

    if(isset($_POST["telefono1"]))
    {
        $telf1=$_POST["telefono1"];
    }

    if(isset($_POST["telefono2"]))
    {
        $telf2=$_POST["telefono2"];
    }

    if(isset($_POST["password1"]))
    {
        $pass1=strtoupper($_POST["password1"]);
    }

    $administrador="SI";

    $churropassword=password_hash($pass1, PASSWORD_DEFAULT, ["cost"=>15]);

    $stmt1=$conexion->prepare("INSERT INTO voluntariado(usuario, apellidos, dni, fechaNacimiento, direccion, numero, portal, piso, letra, zona,correo, telefono1, telefono2, password1, administrador)VALUES 
(:usuarioV, :apellidoV, :dniV, :fechaNacim, :direccionV, :numeroV, :portalV, :pisoV, :letraV, :zonaV, :correoV, :telefono1V, :telefono2V, :password1V, :adminV)");

    $stmt1->bindParam(':usuarioV',$name);
    $stmt1->bindParam(':apellidoV', $apellidos);
    $stmt1->bindParam(':dniV',   $dni);

    $fechaNacim=$dia."/".$mes."/".$anyo;

    $stmt1->bindParam(":fechaNacim" , $fechaNacim);
    $stmt1->bindParam(':direccionV',  $direccion);
    $stmt1->bindParam(':numeroV', $num);
    $stmt1->bindParam(':portalV', $portal);
    $stmt1->bindParam(':pisoV',   $piso);
    $stmt1->bindParam(':letraV',   $letra);
    $stmt1->bindParam(':zonaV',    $zonaReside);
    $stmt1->bindParam(':correoV', $mail);
    $stmt1->bindParam(':telefono1V',    $telf1);
    $stmt1->bindParam(':telefono2V',   $telf2);
    $stmt1->bindParam(':password1V',   $churropassword);
    $stmt1->bindParam(':adminV',   $administrador);  //CAMBIAR ADMINISTRADOR

    $stmt1->execute();

    /*$stmt1=$conexion->prepare("select dni from voluntariado where usuario=$name && apellidos=$apellidos && dni=$dni && fechaNacimiento=$fechaNacim && direccion=$direccion && numero=$num && portal=$portal && piso=$piso && letra =$letra && zona=$zonaReside && correo=$mail && telefono1=$telef1 && telefono2=$telef2 && password1=$churropassword && administrador=$administrador");
    $stmt1->execute();*/

    $_SESSION["dniVoluntario"]="".$dni;   //dniVoluntario es el nombre de la variable

    header("Location:hojaVoluntario.php");

    echo "El archivo ha sido cargado correctamente";
   
}

?>


<div class="container sinPadding">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-md-2">
            <p class="subtitulo">Hazte Voluntario</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3 col-12 d-flex justify-content-center">
            <p class="subtitle">Datos Personales</p>
        </div>
        <div class="col-md-8"></div>
    </div>

    <form action="hazteVoluntario.php" method="post">

        <div class="row">
            <div class="col-md-3 mt-md-5 mt-4 offset-md-1 offset-1">
                <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="usuario" id="usuarioSocio" placeholder="Nombre" required onclick="cambiarFondoCajaUsuarioSocio()" onblur="cambiarFondoUsuariosSocios(this)">
                </div>
            </div>


            <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-3 offset-1">
                <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text" name="apellido" id="apellidoSocio" placeholder="Apellido1 Apellido2" required onclick="cambiarFondoCajaApellidos()" onblur="cambiarFondoApellidosSocios(this)">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-1 offset-1">
                <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="dni" id="dniSocio" placeholder="00000000-X" required onclick="cambiarFondoDNISocio()" onblur="cambiarFondoDNIsSocio(this)">
                </div>
            </div>

            <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-3 offset-1">
                <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                    <div class="alinearDiaMesAnyo">
                        <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="diaFecha" id="diaFecha" required onblur="cambiarFondoDiaSocio(this)">
                            <option value="">Día</option>
                            <?php
                            for($i=1;$i<=31;$i++):
                                ?>
                                <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
                            <?php
                            endfor;
                            ?>
                        </select>

                        <select class="lineahazteVoluntarioFechaMes lineaMesSocio colorLineaCaja" name="mesFecha" id="mesFecha" required onblur="cambiarFondoMesSocio(this)">
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

                        <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="anyoFecha" id="anyoFecha" required onblur="cambiarFondoAnyoSocio(this)">
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

        <hr class="lineaH mt-5">


        <div class="row">
            <div class="col-md-3 col-12 mt-md-5 mt-3 offset-md-1 offset-1">
                <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="direccion" id="direccionSocio" placeholder="Dirección" required onclick="cambiarFondoDireccionSocio()" onblur="cambiarFondoDireccionesSocio(this)">
                </div>
            </div>

            <div class="col-md-3 offset-sm-1 offset-md-2">
                <div class="row">
                    <div class="alinearCajasDireccionSocio offset-1 offset-md-2 offset-sm-0 d-flex justify-content-md-between">

                        <div class="col-md-2 mt-1 col-sm-12 mt-md-5 mt-5 desplazarDerecha">
                            <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                            <input class="lineahazteVoluntarioDirec1" type="text" name="numero" id="numeroSocio" required onclick="cambiarFondoNumeroSocio()" onblur="cambiarFondoNumerosSocios(this)">
                        </div>

                        <div class="col-md-2 col-sm-12 mt-1 desplazarDerecha mt-md-5 mt-5">
                            <label class="textFormularioVoluntario">Portal</label><br>
                            <input class="lineahazteVoluntarioDirec2" type="text" name="portal" id="portalSocio" onclick="cambiarFondoPortalSocio()">
                        </div>

                        <div class="col-md-2 col-sm-12 mt-1 desplazarDerecha mt-md-5 mt-5">
                            <label class="textFormularioVoluntario">Piso</label><br>
                            <input class="lineahazteVoluntarioDirec3" type="text" name="piso" id="pisoSocio" onclick="cambiarFondoPisoSocio()">
                        </div>

                        <div class="col-md-2 col-sm-12 mt-1 desplazarDerecha mt-md-5 mt-5">
                            <label class="textFormularioVoluntario">Letra</label><br>
                            <input class="lineahazteVoluntarioDirec4" type="text" name="letra" id="letraSocio" onclick="cambiarFondoLetraSocio()">
                        </div>

                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-md-5 mt-3 offset-1">
                <label class="textFormularioVoluntario">Zona donde reside <span class="asterisco">*</span></label>
                <div class="input-group zonaReside">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                    <select class="lineahazteVoluntarioZona linea" name="zona" id="zona" required onchange="cambiarFondoResides(this)">
                        <option class="textFormularioVoluntario" value="">Zona a Elegir</option>
                        <option value="Moncada">Moncada</option>
                        <option value="Barrio">Barrio</option>
                        <option value="Barrio de los Dolores">Barrio de los Dolores</option>
                        <option value="Masías">Masías</option>
                        <option value="San Antonio de Benageber">San Isidro de Benageber</option>
                    </select>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="centrarDatosSocio">
                <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-1 offset-2 mr-md-5">
                    <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="mailSocio fondocaja colorLineaCaja" type="text" name="correo" id="correoSocio" placeholder="xxxxx@xxx.xxx" required onclick="cambiarFondoCorreoSocio()" onblur="cambiarFondoCorreosSocio(this)" >
                    </div>
                </div>

                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 offset-md-1 mr-md-2">
                    <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="telefono1" id="telefono1Socio" placeholder="Telefono 1" required onclick="cambiarFondoTelf1Socio()" onblur="cambiarFondoTelf1sSocio(this)">
                    </div>
                </div>

                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 offset-md-1">
                    <label class="textFormularioVoluntario">Telefono 2</label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="telf2Socio fondocaja colorLineaCaja" type="text" name="telefono2" id="telefono2Socio" placeholder="Telefono 2" onclick="cambiarFondoTelf2Socio()" onblur="cambiarFondoTelf2sSocio(this)">
                    </div>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="centrarCajaPassword">
                <div class="col-md-12">
                    <div class="col-md-3 col-12 mt-md-3 mt-md-5 mt-4 offset-2 desplazarPassord1">
                        <label class="textFormularioVoluntario">Contraseña <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="passwordSocio1 fondocaja colorLineaCaja" type="password" name="password1" id="passwordSocio" placeholder="Contraseña" required onclick="cambiarFondoCajaSocioPassword()" onblur="cambiarFondoCajaSociosPassword()">
                        </div>
                    </div>

                    <div class="col-md-3 col-12 mt-md-5 mt-5 offset-md-3 offset-2 desplazarPassord2">
                        <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name="password2" id="password2Socio" placeholder="contraseña" required onclick="cambiarFondoCajaSocioPassword2()" onblur="cambiarFondoCajaSociosPassword2()">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="mt-md-5 mb-md-5">
                    <button class="btn btn-primary boton1" type="submit" role="button" id="button1">Enviar</button>
                </div>

                <div class="offset-md-2 mt-md-5 mb-md-5">
                    <a href="coloniasGatos.php" class="btn btn-primary boton1" id="boton2" style="display:inline" role="button">Siguiente </a>
                </div>
            </div>
        </div>
    </form>
</div>



<?php
include("views/partials/footer.part.php");
?>
<script type="text/javascript" src="jsValidar/validarGatosAdopcion.js"></script>

