<?php session_start();
$hasError=false;
$errorTitle="";
$errorText="";

require "./views/partials/cabecera.part.php";
require_once "./database/connection.php";
require_once "./entities/socio.php";
$conexion = Connection::make();
$socio=new socio();

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($_SESSION && isset($_SESSION["socio"])) {
        if ($_SESSION["socio"] !== "") { // NUEVO
        } else { //EDITAR --> Cargo Datos
            $stmt = $dbh->prepare("SELECT * FROM socios where dni=:dni limit 1");
            $stmt->execute([":dni" => $_SESSION["socio"]["dni"]]);
            $resultados = $stmt->fetch(PDo::FETCH_OBJ);
            $socio=new socio($resultados);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    if (isset($_POST["socio"]))
    {
        $tmp = $_POST["socio"];
        if ( $tmp["aportacionotros"] ) { $tmp["aportacion"] = $tmp["aportacionotros"]; }
        $socio = new socio($tmp["nombre"],$tmp["apellidos"],$tmp["dni"],$tmp["fechaNacimiento"],$tmp["direccion"],$tmp["numero"],
            $tmp["portal"],$tmp["piso"],$tmp["letra"],$tmp["poblacion"],$tmp["codigoPostal"],$tmp["provincia"],$tmp["mail"],
            $tmp["telef1"],$tmp["telef2"],$tmp["password"],$tmp["aportacion"],$tmp["iban"],$tmp["banco"],$tmp["oficina"],$tmp["dc"],$tmp["cuenta"]);
    }
    $stmt = $conexion->prepare("select count(*) from socios where dni=:dni");
    $stmt->execute([":dni" => $socio->getDni()]);
    if ($stmt->fetchColumn() > 0) {
        $hasError=true;
        $errorTitle="Usuario Duplicado";
        $errorText="El DNI ya existe en la base de datos.";
    }
    else {
        $churropassword = password_hash($socio->getPassword(), PASSWORD_DEFAULT, ["cost" => 15]);
        $stmt = $conexion->prepare("INSERT INTO `socios` VALUES (:nombre, :apellido, :dni, :fechanacimiento, 
          :direccion, :numero, :portal, :piso, :letra, :poblacion, :cp, :provincia, :email, :telefono1, :telefono2, 
          :password, :cantidad, :iban, :entidad, :oficina, :dc, :cuenta)");
        $stmt->execute([":nombre" => $socio->getNombre(), ":apellido" => $socio->getApellidos(), ":dni" => $socio->getDni(),
            ":fechanacimiento" => $socio->getFechaNacimiento(),":direccion" => $socio->getDireccion(), ":numero" => $socio->getN(),
            ":portal" => $socio->getPortal(), ":piso" => $socio->getPiso(), "letra" => $socio->getLetra(),":poblacion" => $socio->getPoblacion(),
            ":cp" => $socio->getCodigoPostal(), ":provincia" => $socio->getProvincia(), ":email" => $socio->getMail(),
            ":telefono1" => $socio->getTelef1(), ":telefono2" => $socio->getTelef2(), ":password" => $churropassword,
            ":cantidad" => $socio->getAportacion(), ":iban" => $socio->getIban(), ":entidad" => $socio->getBanco(),
            ":oficina" => $socio->getOficina(), ":dc" => $socio->getDc(), ":cuenta" => $socio->getCuenta()]);

        $stmt = $conexion->prepare("select * from socios where dni=:dni");
        $stmt->execute([":dni" => $socio->getDni()]);
        $resultados = $stmt->fetch(PDo::FETCH_OBJ);
    }
    $_SESSION["dniSocio"]="".$dni;

    header("Location:hojaSocio.php");

    echo "El archivo ha sido cargado correctamente";
}

?>


<div class="container-fluid sinPadding" id="formAyudanos">
    <div class="fondoGatoSocio">
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
                            name="socio[nombre]" id="nombre" value="<?php echo $socio->getNombre();?>"
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
                             type="text" name="socio[apellidos]" id="apellidoSocio" value="<?php echo $socio->getApellidos();?>"
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
                            <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="socio[dni]"
                            id="dniSocio" value="<?php echo $socio->getDni()?>"placeholder="00000000X" required
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
                            name="socio[fechaNacimiento]" id="fechaSocio" value="<?php echo $socio->getFechaNacimiento();?>"
                            required onfocus="ponerFondoGris(this)" onblur="ValidarBorde(this)">
                        </div>
                    </div>
                </div>

                <hr class="lineaH mt-5">

                <div class="row d-flex justify-content-md-between desplazarDcha">
                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-3">
                        <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="socio[direccion]"
                            id="direccionSocio" placeholder="Dirección" value="<?php echo $socio->getDireccion();?>"
                            required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                        </div>
                    </div>

                    <div class="col-md-4"></div>

                    <div class="col-md-4 col-12">
                        <div class="row">
                            <div class="anchoCajas d-flex justify-content-md-between">
                                <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                    <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                                    <input class="lineahazteVoluntarioDirec1" type="text" name="socio[numero]"
                                           id="numeroSocio" value="<?php echo $socio->getN();?>" onfocus="ponerFondoGris(this)" onblur="ValidarBorde(this)">
                                </div>

                                <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                    <label class="textFormularioVoluntario">Portal</label>
                                    <input class="lineahazteVoluntarioDirec2" type="text" name="socio[portal]"
                                           id="portalSocio" onfocus="ponerFondoGris(this)" onblur="ValidarBorde(this)">
                                </div>

                                <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                    <label class="textFormularioVoluntario">Piso</label>
                                    <input class="lineahazteVoluntarioDirec3" type="text" name="socio[piso]" id="pisoSocio"
                                           onfocus="ponerFondoGris(this)" onblur="ValidarBorde(this)">
                                </div>

                                <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                    <label class="textFormularioVoluntario">Letra</label>
                                    <input class="lineahazteVoluntarioDirec4" type="text" name="socio[letra]" id="letraSocio"
                                           onfocus="cambiarFondoSocio(this)" onblur="ValidarBorde(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row d-flex justify-content-between desplazarDcha">

                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                        <label class="textFormularioVoluntario">Población<span class="asterisco">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="lineaPoblacionSocio fondocaja colorLineaCaja " type="text" name="socio[poblacion]"
                            id="poblacionSocio" placeholder="Población" value="<?php echo $socio->getPoblacion();?>"
                            required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                        <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="lineahazteSocioCP colorLineaCaja" type="text" name="socio[codigoPostal]"
                            id="CPSocio" placeholder="C.P" value="<?php echo $socio->getCodigoPostal();?>"
                            required onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{5}$/)" data-mask="99999">
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                        <label class="textFormularioVoluntario">Provincia<span class="asterisco">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                            <select class="colorLineaCaja lineahazteVoluntarioProvincia" id="provincias"
                                    name="socio[provincia]" required >
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
                            <input class="mailSocio fondocaja colorLineaCaja" type="text" name="socio[mail]"
                            id="correoSocio" value="<?php echo $socio->getMail();?>" placeholder="xxxxx@xxx.xxx" required
                            onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-z0-9]+\@[a-z]+\.[a-z]+$/)">
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                        <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="socio[telef1]"
                                   id="telefono1Socio" placeholder="Telefono 1" value="<?php echo $socio->getTelef1();?>"
                                   required onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{9}$/)"data-mask="000000000">
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                        <label class="textFormularioVoluntario">Telefono 2</label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input class="telf2Socio fondocaja colorLineaCaja" type="text" name="socio[telef2]"
                             id="telefono2Socio" placeholder="Telefono 2" value="<?php echo $socio->getTelef2();?>"
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
                            <input class="passwordSocio1 fondocaja colorLineaCaja" type="password" name="socio[password]"
                                   id="passwordSocio" placeholder="Contraseña" required onfocus="ponerFondoGris(this)">
                        </div>
                    </div>

                    <div class="col-md-3"></div>

                    <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                        <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name="password2"
                                   id="password2Socio" placeholder="contraseña" required
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
                            <label><input type="radio" id="aporta5" name="socio[aportacion]" onclick="activarOtros(false)" value="5"      <?php if ($socio->getAportacion() == 5 ) { ?> checked="checked" <?php } ?>> <b>5€</b></label>
                        </div>
                        <div class="col-sm-3 mt-4 col-12">
                            <label><input type="radio" id="aporta10" name="socio[aportacion]" onclick="activarOtros(false)" value="10"    <?php if ($socio->getAportacion() == 10 ) { ?> checked="checked" <?php } ?>> <b>10€</b></label>
                        </div>
                        <div class="col-sm-3 mt-4 col-12">
                            <label><input type="radio" id="aporta15" name="socio[aportacion]" onclick="activarOtros(false)" value="15"    <?php if ($socio->getAportacion() == 15 ) { ?> checked="checked" <?php } ?>> <b>15€</b></label>
                        </div>
                        <div class="col-sm-3 mt-4 col-12">
                            <label><input type="radio" id="aportaotros" name="socio[aportacion]" id="cantidadotros" onclick="activarOtros(true)"
                                <?php if ($socio->getAportacion() != "" && $socio->getAportacion() != 5 && $socio->getAportacion() != 10 && $socio->getAportacion() != 15 ) {?> checked="checked"<?php } ?>>
                                <b>Otros</b>
                            </label>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="col-sm-3"></div>

                    <div class="col-md-4 col-12 mt-4" id="cantidadTexto" style="visibility: hidden">
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-usd"></i></span>
                            <input class="lineaAportarSocio colorLineaCaja circulo" type="text" name="socio[aportacionotros]"
                            value="<?php echo $socio->getAportacion();?>"
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
                            <label class="textFormularioVoluntario textoBanco">&nbsp;</label>
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="socio[iban]" id="ibaSocio"
                            value="<?php echo $socio->getIban();?>" placeholder="ES00" required onfocus="ponerFondoGris(this)"
                            onblur="validar(this,/^\w{2}\d{2}$/)" data-mask="SS00">
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-12 col-md-2 mt-5 desplazarDcha">
                        <label class="textFormularioVoluntario textoBanco">Entidad</label>
                        <div>
                            <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="socio[banco]"
                            id="bancoSocio" placeholder="0000" value="<?php echo $socio->getBanco();?>" required
                            onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{4}$/)" data-mask="0000">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 mt-5 desplazarDcha">
                        <label class="textFormularioVoluntario textoBanco">Oficina</label>
                        <div>
                            <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="socio[oficina]"
                            id="oficinaSocio" placeholder="0000" value="<?php echo $socio->getOficina();?>" required
                            onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{4}$/)" data-mask="0000">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 mt-5 desplazarDcha">
                        <label class="textFormularioVoluntario textoBanco">DC</label>
                        <div>
                            <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="socio[dc]" id="DCSocio"
                            placeholder="00" value="<?php echo $socio->getDc();?>" required onfocus="ponerFondoGris(this)"
                            onblur="validar(this,/^\d{2}$/)" data-mask="00">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 mt-5 desplazarDcha">
                        <label class="textFormularioVoluntario textoBanco">Cuenta</label>
                        <div>
                            <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="socio[cuenta]"
                                   id="cuentaSocio" placeholder="0000000000" value="<?php echo $socio->getCuenta();?>" required
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

<!-- Modal Error Usuario Duplicado-->
<div class="modal" id="duplicatedUserError" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle"><?php echo $errorTitle?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $errorText ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
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
            $('#provincias').val(46);
            <?php if ($hasError){ ?> $('#duplicatedUserError').modal('show'); <?php } ?>
            let otros=document.getElementById("aportaotros")
            if ( otros.checked ) { otros.click()} });

    });
</script>

<?php include("./views/partials/footer.part.php"); ?>
<script type="text/javascript" src="./jsValidar/validardatossociovoluntario.js"></script>
