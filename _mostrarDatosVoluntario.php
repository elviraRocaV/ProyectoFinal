<?php
session_start();
require_once "./database/connection.php";
require_once "Entities/Voluntario.php";
$conexion=Connection::make();

require "./views/partials/cabecera.part.php";

$dnis=$_SESSION["dniVoluntario"];

$stmt=$conexion->prepare("select * from voluntariado where dni='$dnis'");
$stmt->execute();
$voluntarios =$stmt->fetchAll(PDO:: FETCH_ASSOC);

?>

<div class="container-fluid sinPadding">
    <div class="fondoGatoSocio">

        <div class="row ">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="subtitulo">Datos Voluntario</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h3 class="subtitle">Sus datos son:</h3>
            </div>
        </div>

        <div class="container sinPadding">
            <form action="_mostrarDatosVoluntario.php" method="post">
                <div class="row d-flex justify-content-md-between">

                    <?php
                    foreach ($voluntarios as $voluntario)
                    {?>

                    <div class="col-md-4 mt-2 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Nombre:</label>
                        <input name="nombre" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $voluntario['nombre']?>" readonly></input>
                    </div>

                    <div class="col-md-4 mt-5 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Apellidos:</label>
                        <input name="apellidos" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $voluntario['apellido']?>" readonly>
                    </div>

                    <div class="col-md-4 mt-5 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">DNI:</label>
                        <input name="dni" id="dni" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $voluntario['dni'] ?>" readonly>
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                    <label class="textFormularioVoluntario">Fecha nacimiento</label>
                        <input name="fechaNacimiento" id="fechaSocio"
                        value="<?php echo $voluntario['fechanacimiento']?>" readonly>
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



























































                <?php } ?>
            </form>
        </div>
    </div>
</div>


<?php include("./views/partials/footer.part.php"); ?>







