<?php session_start();

require __DIR__ . "/views/partials/cabecera.part.php";
require_once "Database/Connection.php";
$dbh = Connection::make();

$nom = "";
$apellidos = "";
$dni = "";
$diaNacimiento = "";
$mesNacimiento = "";
$anyNacimiento = "";
$fechaNacimiento = "";
$direccion = "";
$num = "";
$portal = "";
$piso = "";
$letra = "";
$poblacion = "";
$codPost = "";
$provincia = "";
$mail = "";
$telf1 = "";
$telf2 = "";
$aportacion = "";
$iban = "";
$banco = "";
$oficina = "";
$dc = "";
$cuenta = "";
$churropassword = "";
$passwordSocio = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["usuarioSocio"])) {
        $nom = strtoupper($_POST["usuarioSocio"]);
    }

    if (isset($_POST["apellidoSocio"])) {
        $apellidos = strtoupper($_POST["apellidoSocio"]);
    }

    if (isset($_POST["dniSocio"])) {
        $dni = strtoupper($_POST["dniSocio"]);
    }

    if (isset($_POST["fechaSocio"])) {
        $fechaNacimiento=$_POST["fechaSocio"];
        $fechaNacimiento=strtoupper($fechaNacimiento);
    }

    if (isset($_POST["direccionSocio"])) {
        $direccion = strtoupper($_POST["direccionSocio"]);
    }

    if (isset($_POST["numeroSocio"])) {
        $num = $_POST["numeroSocio"];
    }

    if (isset($_POST["portalSocio"])) {
        $portal = $_POST["portalSocio"];
    }

    if (isset($_POST["pisoSocio"])) {
        $piso = $_POST["pisoSocio"];
    }

    if (isset($_POST["letraSocio"])) {
        $letra = strtoupper($_POST["letraSocio"]);
    }

    if (isset($_POST["poblacionSocio"])) {
        $poblacion = strtoupper($_POST["poblacionSocio"]);
    }

    if (isset($_POST["CPSocio"])) {
        $codPost = $_POST["CPSocio"];
    }

    if (isset($_POST["provinciaSocio"])) {
        $provincia = strtoupper($_POST["provinciaSocio"]);
    }

    if (isset($_POST["correoSocio"])) {
        $mail = strtoupper($_POST["correoSocio"]);
    }

    if (isset($_POST["telefono1Socio"])) {
        $telf1 = $_POST["telefono1Socio"];
    }

    if (isset($_POST["telefono2Socio"])) {
        $telf2 = $_POST["telefono2Socio"];
    }

    if (isset($_POST["passwordSocio"])) {
        $passwordSocio = strtoupper($_POST["passwordSocio"]);
    }

    if (isset($_POST["cantidad"])) {
        $aportacion = $_POST["cantidad"];
    }

    if (isset($_POST["ibaSocio"])) {
        $iban = $_POST["ibaSocio"];
    }

    if (isset($_POST["bancoSocio"])) {
        $banco = $_POST["bancoSocio"];
    }

    if (isset($_POST["oficinaSocio"])) {
        $oficina = $_POST["oficinaSocio"];
    }

    if (isset($_POST["DCSocio"])) {
        $dc = $_POST["DCSocio"];
    }

    if (isset($_POST["cuentaSocio"])) {
        $cuenta = $_POST["cuentaSocio"];
    }

    $churropassword = password_hash($passwordSocio, PASSWORD_DEFAULT, ["cost" => 15]);

    $stmt = $dbh->prepare("INSERT INTO `socios` VALUES (:nombre, :apellido, :dni, :fechanacimiento, :direccion, :numero, :portal, :piso, :letra, :poblacion, :cp, :provincia, :email, :telefono1, :telefono2, :password, :cantidad, :iban, :entidad, :oficina, :dc, :cuenta)");
    $stmt->execute([":nombre" => $nom, ":apellido" => $apellidos, ":dni" => $dni, ":fechanacimiento" =>$fechaNacimiento, ":direccion"=> $direccion, ":numero" => $num, ":portal" => $portal, ":piso" =>$piso, "letra"=> $letra,
        ":poblacion" =>$poblacion, ":cp" => $codPost, ":provincia" =>$provincia, ":email" =>$mail, ":telefono1" =>$telf1, ":telefono2" => $telf2, ":password" => $churropassword, ":cantidad" =>$aportacion, ":iban" =>$iban, ":entidad" =>$banco, ":oficina" =>$oficina, ":dc" =>$dc, ":cuenta" =>$cuenta]);


    /*$stmt=$dbh->prepare("select dniSocio from socio where UsuarioSocio='$nom' && apellidoSocio=$apellidos && dniSocio='$dni' && diaFecha=$diaNacimiento");
//        $stmt->execute();
        $dniSocio=$stmt->fetch(PDO::FETCH_NUM);*/

    $_SESSION["dniSocio"] = "" . $dni;

    header("Location:hojaSocio.php");

    echo "El archivo ha sido cargado correctamente";
}
?>


<div class="container-fluid sinPadding">

    <form action="ayudanos.php" method="post" class="fondoGatoSocio">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-md-2 mt-5">
                <p class="subtitulo">Hazte Socio</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <p class="subtitle">Datos Personales</p>
            </div>
        </div>

        <div class="container sinPadding anchoContenedor">

            <div class="row d-flex justify-content-md-between desplazarDcha">

                <div class="col-md-4 col-12 mt-md-5 mt-4">
                    <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text"
                               name="usuarioSocio" id="usuarioSocio" placeholder="Nombre" required
                               onclick="cambiarFondoCajaUsuarioSocio()" onblur="cambiarFondoUsuariosSocios(this)">
                    </div>
                </div>

                <div class="col-md-4"></div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja"
                               type="text" name="apellidoSocio" id="apellidoSocio" placeholder="Apellido1 Apellido2"
                               required onclick="cambiarFondoCajaApellidos()"
                               onblur="cambiarFondoApellidosSocios(this)">
                    </div>
                </div>

            </div>


            <div class="row d-flex justify-content-md-between desplazarDcha">

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="dniSocio"
                               id="dniSocio" placeholder="00000000X" required onclick="cambiarFondoDNISocio()"
                               onblur="cambiarFondoDNIsSocio(this)" data-mask="00000000S">
                    </div>
                </div>

                <div class="col-md-4"></div>

                <!--
                <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-3 offset-1">
                    <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                        <div class="alinearDiaMesAnyo">
                            <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="diaFecha" id="diaFecha" required onblur="cambiarFondoDiaSocio(this)">
                                <option value="">Día</option>
                                <?php
                for ($i = 1; $i <= 31; $i++):
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
                $anyoActual = date("Y", time());
                $anyoMin = $anyoActual - 18;

                for ($j = $anyoMin; $j >= diaAnyo; $j--):

                    ?> <option value="<?php echo $j ?> "> <?php echo $j ?> </option>
                                <?php
                endfor;
                ?>
                            </select>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Fecha nacimiento <span
                                class="asterisco">*</span></label><br>
                    <div class="input-group date" data-provide="datepicker">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        <input class="form-control lineahazteVoluntarioFechaNa colorLineaCaja" type="text"
                               name="fechaSocio" id="fechaSocio" required onclick="cambiarFondoFechaSocio()"
                               onblur="cambiarFondoFechassSocio(this)">
                    </div>
                </div>
            </div>

            <hr class="lineaH mt-5">


            <div class="row d-flex justify-content-md-between desplazarDcha">

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-3">
                    <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="direccionSocio"
                               id="direccionSocio" placeholder="Dirección" required
                               onclick="cambiarFondoDireccionSocio()" onblur="cambiarFondoDireccionesSocio(this)">
                    </div>
                </div>

                <div class="col-md-4"></div>

                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="anchoCajas d-flex justify-content-md-between">
                            <div class="col-md-2 mt-1 col-3 mt-md-5 mt-sm-5 mt-4">
                                <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                                <input class="lineahazteVoluntarioDirec1" type="text" name="numeroSocio"
                                       id="numeroSocio" required onclick="cambiarFondoNumeroSocio()"
                                       onblur="cambiarFondoNumerosSocios(this)">
                            </div>

                            <div class="col-md-2 col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                <label class="textFormularioVoluntario">Portal</label>
                                <input class="lineahazteVoluntarioDirec2" type="text" name="portalSocio"
                                       id="portalSocio" onclick="cambiarFondoPortalSocio()">
                            </div>

                            <div class="col-md-2 col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                <label class="textFormularioVoluntario">Piso</label>
                                <input class="lineahazteVoluntarioDirec3" type="text" name="pisoSocio" id="pisoSocio"
                                       onclick="cambiarFondoPisoSocio()">
                            </div>

                            <div class="col-md-2 col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                <label class="textFormularioVoluntario">Letra</label>
                                <input class="lineahazteVoluntarioDirec4" type="text" name="letraSocio" id="letraSocio"
                                       onclick="cambiarFondoLetraSocio()">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row d-flex justify-content-between desplazarDcha">

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Población<span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineaPoblacionSocio fondocaja colorLineaCaja " type="text" name="poblacionSocio"
                               id="poblacionSocio" placeholder="Población" required
                               onclick="cambiarFondoPoblacionSocio()" onblur="cambiarFondoPoblacionsSocio(this)">
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteSocioCP fondocaja colorLineaCaja" type="text" name="CPSocio"
                               id="CPSocio" placeholder="C.P" required onclick="cambiarFondoCPSocio()"
                               onblur="cambiarFondoCPsSocio(this)" data-mask="99999">
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <select class="browser-default custom-select fondocaja colorLineaCaja" id="provincias" name="provinciaSocio" style="width:90%">
                            <option selected disabled value="0">Selecciona tu provincia</option>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $.getJSON('data/provincias.json', function (datos) {
                                        for (index in datos.provincias) {
                                            $('#provincias').append('<option ' + 'value=' + datos.provincias[index].id + '>' + datos.provincias[index].nm + '</option>');
                                        }
                                        $('#provincias').val(46);
                                    });
                                });
                            </script>
                        </select>
                    </div>
                </div>
            </div>


            <hr class="lineaH mt-5">

            <div class="row d-flex justify-content-md-between desplazarDcha">
                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="mailSocio fondocaja colorLineaCaja" type="text" name="correoSocio"
                               id="correoSocio" placeholder="xxxxx@xxx.xxx" required onclick="cambiarFondoCorreoSocio()"
                               onblur="cambiarFondoCorreosSocio(this)">
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="telefono1Socio"
                               id="telefono1Socio" placeholder="Telefono 1" required onclick="cambiarFondoTelf1Socio()"
                               data-mask="000000000">
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Telefono 2</label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="telf2Socio fondocaja colorLineaCaja" type="text" name="telefono2Socio"
                               id="telefono2Socio" placeholder="Telefono 2" onclick="cambiarFondoTelf2Socio()"
                               data-mask="000000000">
                    </div>
                </div>
            </div>

            <hr class="lineaH mt-md-5">

            <div class="row desplazarDcha">
                <div class="col-md-4 col-12 mt-md-3 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Contraseña <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="passwordSocio1 fondocaja colorLineaCaja" type="password" name="passwordSocio"
                               id="passwordSocio" placeholder="Contraseña" required
                               onclick="cambiarFondoCajaSocioPassword()" onblur="cambiarFondoCajaSociosPassword()">
                    </div>
                </div>

                <div class="col-md-4"></div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name="password2Socio"
                               id="password2Socio" placeholder="contraseña" required
                               onclick="cambiarFondoCajaSocioPassword2()" onblur="cambiarFondoCajaSociosPassword2()">
                    </div>
                </div>

            </div>

            <hr class="lineaH mt-md-5">


            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p class="subtitle">Cantidad a aportar</p>
                </div>
            </div>

            <div class="row d-flex justify-content-md-between mt-md-5 desplazarDcha">

                <div class="col-md-4">
                    <div class="col-md-3 col-12 mt-4">
                        <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value="5"><b>
                                5€</b></label>
                    </div>
                    <div class="col-md-3 mt-4 col-12">
                        <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value="10"><b>
                                10€</b></label>
                    </div>
                    <div class="col-md-3 mt-4 col-12">
                        <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value="15"><b>
                                15€</b></label>
                    </div>
                    <div class="col-md-3 mt-4 col-12">
                        <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value="0"><b>
                                Otros</b></label>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="col-md-4" style="visibility: visible">
                    <button type="button" class="btn btn-primary mt-4 boton1" id="botonCantidades">Otras Cantidades
                    </button>
                </div>

                <div class="col-md-4 col-12 mt-4" id="cantidadTexto" style="visibility: hidden">
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-usd"></i></span>
                        <input class="lineaAportarSocio colorLineaCaja circulo" type="text" name="cantidad"
                               placeholder="Otras cantidades" onclick="cambiarFondoCantidadesSocio()"
                               onblur="cambiarFondoCantidadessSocio(this)" data-mask="#.##0" data-mask-reverse="true">
                    </div>
                </div>
            </div>

            <hr class="lineaH mt-md-5">

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p class="subtitle">Cuenta Bancaria</p>
                </div>
            </div>

            <div class="row d-flex justify-content-md-between mt-md-2 desplazarDcha">

                <div class="col-12 col-md-2 mt-5">
                    <label class="textFormularioVoluntario textoBanco">IBAN</label>
                    <div class="input-group">
                        <label class="textFormularioVoluntario textoBanco">&nbsp;</label>
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="ibaSocio" id="ibaSocio"
                               placeholder="ES00" required onclick="cambiarFondoIBANSocio()"
                               onblur="cambiarFondoIBANsSocio(this)" data-mask="SS00">
                    </div>
                </div>
                <div class="col-md-1"></div>

                <div class="col-12 col-md-2 mt-5 desplazarDcha">
                    <label class="textFormularioVoluntario textoBanco">Entidad</label>
                    <div>
                        <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="bancoSocio"
                               id="bancoSocio" placeholder="0000" required onclick="cambiarFondoBancoSocio()"
                               onblur="cambiarFondoBancosSocio(this)" data-mask="0000">
                    </div>
                </div>

                <div class="col-12 col-md-2 mt-5 desplazarDcha">
                    <label class="textFormularioVoluntario textoBanco">Oficina</label>
                    <div>
                        <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="oficinaSocio"
                               id="oficinaSocio" placeholder="0000" required onclick="cambiarFondoOficinaSocio()"
                               onblur="cambiarFondoOficinasSocio(this)" data-mask="0000">
                    </div>
                </div>

                <div class="col-12 col-md-2 mt-5 desplazarDcha">
                    <label class="textFormularioVoluntario textoBanco">DC</label>
                    <div>
                        <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="DCSocio" id="DCSocio"
                               placeholder="00" required onclick="cambiarFondoOficinaSocio()"
                               onblur="cambiarFondoDCsSocio(this)" data-mask="00">
                    </div>
                </div>

                <div class="col-12 col-md-2 mt-5 desplazarDcha">
                    <label class="textFormularioVoluntario textoBanco">Cuenta</label>
                    <div>
                        <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="cuentaSocio"
                               id="cuentaSocio" placeholder="0000000000" required onclick="cambiarFondocuentaSocio()"
                               onblur="cambiarFondocuentasSocio(this)" data-mask="0000000000" reverse="true">
                    </div>
                </div>

                <div class="col-md-1"></div>

            </div>

            <div class="row justify-content-center">
                <div class="mt-md-5 mb-md-5 mt-sm-5 mb-sm-5 mt-5 mb-5">
                    <button class="btn btn-primary boton1" type="submit" role="button" id="button1">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include("views/partials/footer.part.php"); ?>
<script type="text/javascript" src="jsValidar/validarGatosAdopcion.js"></script>
<script src="js/jquery.mask.js"</script>
<script src="locales/bootstrap-datepicker.es.min.js"</script>