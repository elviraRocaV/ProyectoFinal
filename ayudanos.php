<?php
if (session_status() == PHP_SESSION_NONE ) { session_start(); }
$hasError=false;
$Title="";
$Text="";
$editing=false;
$exists=false;
$added=false;
$updated=false;

require_once "./views/partials/cabecera.part.php";
require_once "./database/connection.php";
require_once "./entities/socio.php";
$conexion = Connection::make();
$socio=[];

if ($_SERVER['REQUEST_METHOD']=="GET") {
    session_destroy();
    session_start();
}

//print_r ($_SESSION);
if ($_SERVER['REQUEST_METHOD']=="POST") {
    //Si tengo datos en el post miro si existe
    if (isset($_POST["datosSocio"])) {
        $query = $conexion->prepare("select count(dni) from socios where dni=:dni");
        $query->execute([":dni" => $_POST["datosSocio"]["dni"]]);
        $query->execute();
        $exists = $query->fetch(PDO:: FETCH_NUM)[0] == 1; // Si existe lo edito
    }

    $editing = isset($_SESSION["dniSocio"]) && $_SESSION["dniSocio"] != "";
    //Si existe Muestro un error
    if ($exists && !$editing) {
        $socio = $_POST["datosSocio"];
        $Title="Error";
        $Text="El usuario ya existe";
    }

    //Si no existe lo inserto o edito
    if (!$exists || $editing) {
        if (!$exists) {
            $query = $conexion->prepare("INSERT INTO socios VALUES (
            :nombre, :apellidos, :dni, :fechanacimiento, :direccion, :numero, :portal, :piso, :letra, 
            :poblacion, :cp, :provincia, :correo, :telefono1, :telefono2, :password, :aportacion,
            :iban, :entidad, :oficina, :dc, :cuenta)");
        }
        if ($editing) {
            $query = $conexion->prepare("UPDATE socios SET
            nombre=:nombre, apellidos=:apellidos, fechanacimiento=:fechanacimiento, direccion=:direccion, numero=:numero,
            portal=:portal, piso=:piso, letra=:letra, poblacion=:poblacion, cp=:cp, provincia=:provincia, correo=:correo,
            telefono1=:telefono1, telefono2=:telefono2, password=:password, aportacion=:aportacion,
            iban=:iban, entidad=:entidad, oficina=:oficina, dc=:dc, cuenta=:cuenta where dni=:dni");
        }
        $socio = $_POST["datosSocio"];

        $nombre = isset($socio["nombre"]) ? strtoupper($socio["nombre"]) : "";
        $query->bindParam(':nombre',$nombre);
        $apellidos= isset($socio["apellidos"]) ? strtoupper($socio["apellidos"]) : "";
        $query->bindParam(':apellidos', $apellidos);
        $dni= isset($socio["dni"]) ? strtoupper($socio["dni"]) : "";
        $query->bindParam(':dni', $dni);
        $date= isset($socio["fechanacimiento"]) ? $socio["fechanacimiento"] : null;
        $query->bindParam(':fechanacimiento', $date);

        $direccion= isset($socio["direccion"]) ? strtoupper($socio["direccion"]) : "";
        $query->bindParam(':direccion', $direccion);
        $numero= isset($socio["numero"]) ? strtoupper($socio["numero"]) : "";
        $query->bindParam(':numero', $numero);
        $portal= isset($socio["portal"]) ? strtoupper($socio["portal"]) : "";
        $query->bindParam(':portal', $portal);
        $piso = isset($socio["piso"]) ? strtoupper($socio["piso"]) : "";
        $query->bindParam(':piso', $piso);
        $letra = isset($socio["letra"]) ? strtoupper($socio["letra"]) : "";
        $query->bindParam(':letra', $letra);

        $poblacion= isset($socio["poblacion"]) ? strtoupper($socio["poblacion"]) : "";
        $query->bindParam(':poblacion', $poblacion);
        $cp = isset($socio["cp"]) ? strtoupper($socio["cp"]) : "";
        $query->bindParam(':cp', $cp);
        $provincia= isset($socio["provincia"]) ? strtoupper($socio["provincia"]) : "";
        $query->bindParam(':provincia', $provincia);

        $correo= isset($socio["correo"]) ? strtoupper($socio["correo"]) : "";
        $query->bindParam(':correo', $correo);
        $telefono1= isset($socio["telefono1"]) ? strtoupper($socio["telefono1"]) : "";
        $query->bindParam(':telefono1', $telefono1);
        $telefono2= isset($socio["telefono2"]) ? strtoupper($socio["telefono2"]) : "";
        $query->bindParam(':telefono2', $telefono2);

        $pass = isset($socio["password"]) ? $socio["password"] : "";
        //$hash = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 15]);
        $hash = sha1($pass);
        $query->bindParam(':password', $hash);

        $aportacion= isset($socio["aportacion"]) ? strtoupper($socio["aportacion"]) : "";
        $query->bindParam(':aportacion', $aportacion);

        $iban= isset($socio["iban"]) ? strtoupper($socio["iban"]) : "";
        $query->bindParam(':iban', $iban);
        $entidad= isset($socio["entidad"]) ? strtoupper($socio["entidad"]) : "";
        $query->bindParam(':entidad', $entidad);
        $oficina= isset($socio["oficina"]) ? strtoupper($socio["oficina"]) : "";
        $query->bindParam(':oficina', $oficina);
        $dc= isset($socio["dc"]) ? strtoupper($socio["dc"]) : "";
        $query->bindParam(':dc', $dc);
        $cuenta= isset($socio["cuenta"]) ? strtoupper($socio["cuenta"]) : "";
        $query->bindParam(':cuenta', $cuenta);
        $query->execute();
        if (!$exists) {
            $added = true;
            $Title="Registro Correcto";
            $Text="El usuario se ha registrado Correctamente";
        }
        if ($editing) {
            $updated = true;
            $Title="Actualización Correcta";
            $Text="El usuario se ha actualizado Correctamente";
        }
        $_SESSION["dniSocio"] = "" . $dni;
    }

}

?>


<div class="container-fluid sinPadding" id="formAyudanos">
    <div class="fondoGatoSocio">
        <div class="container-fluid">
            <form action="ayudanos.php" method="post">
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

                    <div class="row d-flex justify-content-md-between">

                        <div class="col-md-4 col-12 mt-md-5 mt-4">
                            <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text"
                                name="datosSocio[nombre]" id="nombre" value="<?php if (isset($socio['nombre'])) { echo $socio['nombre']; } ?>"
                                placeholder="Nombre" required onfocus="ponerFondoGris(this)"
                                onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja"
                                 type="text" name="datosSocio[apellidos]" id="apellidoSocio" value="<?php if (isset($socio['apellidos'])){ echo $socio['apellidos'];}?>"
                                  placeholder="Apellido1 Apellido2" required onfocus="ponerFondoGris(this)"
                                  onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)">
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-md-between">

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="datosSocio[dni]"
                                id="dniSocio" value="<?php if(isset($socio['dni'])) { echo $socio['dni'];} ?>"placeholder="00000000X" required
                                onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{8}[a-zA-Z]$/)" data-mask="00000000S">
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Fecha nacimiento <span
                                        class="asterisco">*</span></label><br>
                            <div class="input-group date anchoFecha" data-provide="datepicker">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                <input class="form-control lineahazteVoluntarioFechaNa colorLineaCaja" type="text"
                                name="datosSocio[fechanacimiento]" id="fechanacimiento" value="<?php if(isset($socio['fechanacimiento'])) { echo $socio['fechanacimiento'];};?>"
                                required onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{2}\/\d{2}\/\d{4}$/)">
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-3">
                            <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="datosSocio[direccion]"
                                id="direccionSocio" placeholder="Dirección" value="<?php if(isset($socio['direccion'])) { echo $socio['direccion'];}?>"
                                required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12">
                            <div class="row">
                                <div class="anchoCajas d-flex justify-content-md-between">
                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                                        <input class="lineahazteVoluntarioDirec1" type="text" name="datosSocio[numero]"
                                               id="numeroSocio" value="<?php if(isset($socio['numero'])) { echo $socio['numero'];}?>" onfocus="ponerFondoGris(this)" onblur="validar(this,/(^$)|(^\d{1,3}$)/)">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Portal</label>
                                        <input class="lineahazteVoluntarioDirec2" type="text" name="datosSocio[portal]"
                                               id="portalSocio" onfocus="ponerFondoGris(this)" onblur="validar(this,/^(^$)|(^\w$)/)" value="<?php if(isset($socio['portal'])) { echo $socio['portal'];}?>">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Piso</label>
                                        <input class="lineahazteVoluntarioDirec3" type="text" name="datosSocio[piso]" id="pisoSocio"
                                               onfocus="ponerFondoGris(this)" onblur="validar(this,/(^$)|(^\d{1,2}$)/)" value="<?php if(isset($socio['piso'])) { echo $socio['piso'];}?>">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Letra</label>
                                        <input class="lineahazteVoluntarioDirec4" type="text" name="datosSocio[letra]" id="letraSocio"
                                               onfocus="ponerFondoGris(this)" onblur="validar(this,/(^$)|(^\w$)/)" value="<?php if(isset($socio['letra'])) { echo $socio['letra'];}?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Población<span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineaPoblacionSocio fondocaja colorLineaCaja " type="text" name="datosSocio[poblacion]"
                                id="poblacionSocio" placeholder="Población" value="<?php if(isset($socio['poblacion'])) { echo $socio['poblacion'];}?>"
                                required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteSocioCP colorLineaCaja" type="text" name="datosSocio[cp]"
                                id="CPSocio" placeholder="C.P" value="<?php if(isset($socio['cp'])) { echo $socio['cp'];}?>"
                                required onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{5}$/); setProvincia(this)" data-mask="99999">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Provincia<span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <select class="colorLineaCaja lineahazteVoluntarioProvincia" id="provincias"
                                        name="datosSocio[provincia]" required value="<?php if(isset($socio['provincia'])) { echo $socio['provincia'];}?>">
                                    <option selected disabled value="0">Selecciona tu provincia</option>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $.getJSON('data/provincias.json', function (datos) {
                                                for (index in datos.provincias) {
                                                    $('#provincias').append('<option ' + 'value=' + datos.provincias[index].id + '>'
                                                        + datos.provincias[index].nm + '</option>');
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
                                <input class="mailSocio fondocaja colorLineaCaja" type="text" name="datosSocio[correo]"
                                id="correoSocio" value="<?php if(isset($socio['correo'])) { echo $socio['correo'];}?>" placeholder="xxxxx@xxx.xxx" required
                                onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-z0-9]+\@[a-z]+\.[a-z]+$/)">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="datosSocio[telefono1]"
                                       id="telefono1" placeholder="Telefono 1" value="<?php if(isset($socio['telefono1'])) { echo $socio['telefono1'];}?>"
                                       required onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{9}$/)"data-mask="000000000">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Telefono 2</label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf2Socio fondocaja colorLineaCaja" type="text" name="datosSocio[telefono2]"
                                 id="telefono2" placeholder="Telefono 2" value="<?php if(isset($socio['telefono2'])) { echo $socio['telefono2'];}?>"
                                 onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{9}$/)"data-mask="000000000">
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-md-5">

                    <div class="row d-flex justify-content-md-between">

                        <div class="col-md-4 col-12 mt-md-3 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Contraseña <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="passwordSocio1 fondocaja colorLineaCaja" type="password" name="datosSocio[password]"
                                       id="password" placeholder="Contraseña" required onfocus="ponerFondoGris(this)">
                            </div>
                        </div>

                        <div class="col-md-3"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name="datosSocio[password2]"
                                       id="password2" placeholder="contraseña" required
                                       onfocus="ponerFondoGris(this)" onblur="validarPassword()">
                            </div>
                        </div>
                        <div class="vistoPassword" id="visto1"></div>
                    </div>

                    <hr class="lineaH mt-md-5">

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="subtitle">Cantidad mensual a aportar</p>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-md-between mt-md-5 anchoCantidad">
                        <div class="col-sm-3"></div>

                        <div class="col-md-5 col-9 d-flex justify-content-sm-center">
                            <div class="col-sm-3 col-12 mt-4">
                                <label><input type="radio" id="aporta5" name="dummy" onclick="activarOtros(this,false)" value="5"      <?php if (isset($socio['aportacion']) && $socio['aportacion'] == 5 ) { ?> checked="checked" <?php } ?>> <b>5€</b></label>
                            </div>
                            <div class="col-sm-3 mt-4 col-12">
                                <label><input type="radio" id="aporta10" name="dummy" onclick="activarOtros(this,false)" value="10"    <?php if (isset($socio['aportacion']) && $socio['aportacion'] == 10 ) { ?> checked="checked" <?php } ?>> <b>10€</b></label>
                            </div>
                            <div class="col-sm-3 mt-4 col-12">
                                <label><input type="radio" id="aporta15" name="dummy" onclick="activarOtros(this,false)" value="15"    <?php if (isset($socio['aportacion']) && $socio['aportacion'] == 15 ) { ?> checked="checked" <?php } ?>> <b>15€</b></label>
                            </div>
                            <div class="col-sm-3 mt-4 col-12">
                                <label><input type="radio" id="aportaotros" name="dummy"  id="cantidadotros" onclick="activarOtros(this,true)"
                                    <?php if (isset($socio['aportacion']) && ( ($socio['aportacion'] != "" && $socio['aportacion'] != 5 && $socio['aportacion'] != 10 && $socio['aportacion'] != 15 ))) {?> checked="checked"<?php } ?>>
                                    <b>Otros</b>
                                </label>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="col-sm-3"></div>

                        <div class="col-md-4 col-12 mt-4" style="visibility: hidden">
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-usd"></i></span>
                                <input id="aportacion" class="lineaAportarSocio colorLineaCaja circulo" type="text" name="datosSocio[aportacion]"
                                 value="<?php if(isset($socio['aportacion'])) { echo $socio['aportacion'];}?>"
                                placeholder="Otras cantidades" onfocus="ponerFondoGris(this)"
                                onblur="validar(this,/^\d{1,5}$/)" data-mask="#.##0" data-mask-reverse="true">
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
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="datosSocio[iban]" id="ibaSocio"
                                value="<?php if(isset($socio['iban'])) { echo $socio['iban'];}?>" placeholder="ES00" required onfocus="ponerFondoGris(this)"
                                onblur="validar(this,/^\w{2}\d{2}$/)" data-mask="SS00">
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-12 col-md-2 mt-5 desplazarDcha">
                            <label class="textFormularioVoluntario textoBanco">Entidad</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="datosSocio[entidad]"
                                id="bancoSocio" placeholder="0000" value="<?php if(isset($socio['entidad'])) { echo sprintf("%04d",$socio['entidad']);}?>" required
                                onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{4}$/)" data-mask="0000">
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mt-5 desplazarDcha">
                            <label class="textFormularioVoluntario textoBanco">Oficina</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="datosSocio[oficina]"
                                id="oficinaSocio" placeholder="0000" value="<?php if(isset($socio['oficina'])) { echo sprintf("%04d", $socio['oficina']);}?>" required
                                onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{4}$/)" data-mask="0000">
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mt-5 desplazarDcha">
                            <label class="textFormularioVoluntario textoBanco">DC</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="datosSocio[dc]" id="dc"
                                placeholder="00" value="<?php if(isset($socio['dc'])) { echo sprintf("%02d", $socio['dc']);}?>" required onfocus="ponerFondoGris(this)"
                                onblur="validar(this,/^\d{2}$/)" data-mask="00">
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mt-5 desplazarDcha">
                            <label class="textFormularioVoluntario textoBanco">Cuenta</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="datosSocio[cuenta]"
                                       id="cuentaSocio" placeholder="0000000000" value="<?php if(isset($socio['cuenta'])) { echo sprintf("%010d", $socio['cuenta']);}?>" required
                                       onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{10}$/)" data-mask="0000000000" reverse="true">
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
    </div>
</div>

<!-- Mensaje Modal-->
<div class="modal" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="modaltype" class="modal-content alert">
            <div id="modaltype2" class="modal-header alert" >
                <h2 class="modal-title" id="exampleModalLongTitle"><?php echo $Title?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $Text ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $.getJSON('data/provincias.json', function (datos) {
            for (index in datos.provincias) {
                $('#provincias').append('<option ' + 'value=' + datos.provincias[index].id + '>' + datos.provincias[index].nm + '</option>');
            }
        });
        $('#provincias').val(46);
        $.fn.datepicker.defaults.language ='es';
        $.fn.datepicker.defaults.todayHighlight = true;
        $('.datepicker').datepicker();

        <?php if ($added || $updated){ ?> $('#modalMessage').modal('show'); $('#modaltype').addClass("alert-success"); $('#modaltype2').addClass("alert-success"); <?php } ?>
        <?php if ($exists && !$updated){ ?> $('#modalMessage').modal('show'); $('#modaltype').addClass("alert-danger"); $('#modaltype2').addClass("alert-danger"); <?php } ?>

        let otros=document.getElementById("aportaotros")
        if ( otros.checked ) { otros.click()}
    });
</script>

<?php include("./views/partials/footer.part.php"); ?>
<script type="text/javascript" src="./js/validardatos.js"></script>
<script type="text/javascript" src="./js/validardatos.js"></script>