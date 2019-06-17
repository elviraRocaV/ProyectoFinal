<?php
session_start();
require_once "./database/connection.php";
include("./views/partials/cabecera.part.php");
$conexion = Connection::make();
$mostrarMensaje=false;

$dni = $_SESSION["dniSocio"];  //es un nombre de variable

$stmt=$conexion->prepare("select * from socios where dni='$dni'");
$stmt->execute();

$socios =$stmt->fetchAll(PDO:: FETCH_ASSOC);




?>
<div class="container-fluid sinPadding">
    <div class="col-md-12 fondoGatoSocio sinPadding sinMargin">
        <div class="row">
            <div class="container sinPadding">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-5">
                        <h1 class="subtitulo">Datos Socio</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h3>Sus datos son:</h3>
                    </div>
                </div>

                <form id="socioform" action="_hojaSocio.php" method="post">
                    <div class="row d-flex justify-content-md-between">

                        <?php
                        foreach ($socios as $socio)
                        {?>

                        <div class="col-md-4 col-12 mt-md-5 mt-4">
                            <label class="textFormularioVoluntario">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text"
                                 value="<?php echo $socio['nombre']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja"
                                type="text" value="<?php echo $socio['apellido']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-md-between">

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">DNI</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text"
                                value="<?php echo $socio['dni']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Fecha nacimiento </label>
                            <div class="input-group date anchoFecha" data-provide="datepicker">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                <input class="form-control lineahazteVoluntarioFechaNa colorLineaCaja" type="text"
                                value="<?php echo $socio['fechanacimiento']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-3">
                            <label class="textFormularioVoluntario">Dirección </label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text"
                                value="<?php echo $socio['direccion']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12">
                            <div class="row">
                                <div class="anchoCajas d-flex justify-content-md-between">
                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Nº</label>
                                        <input class="lineahazteVoluntarioDirec1" type="text"
                                        value="<?php echo $socio['numero']?>">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Portal</label>
                                        <input class="lineahazteVoluntarioDirec2" type="text"
                                        value="<?php echo $socio['portal']?>" readonly>
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Piso</label>
                                        <input class="lineahazteVoluntarioDirec3" type="text"
                                        value="<?php echo $socio['piso']?>" readonly>
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                        <label class="textFormularioVoluntario">Letra</label>
                                        <input class="lineahazteVoluntarioDirec4" type="text"
                                        value="<?php echo $socio['letra']?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between desplazarDcha">

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Población</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineaPoblacionSocio fondocaja colorLineaCaja " type="text"
                                value="<?php echo $socio['poblacion']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Código Postal</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteSocioCP colorLineaCaja" type="text"
                                value="<?php echo $socio['cp']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Provincia</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja"
                                type="text" value="<?php echo $socio['provincia']?>" readonly>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Mail</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="mailSocio fondocaja colorLineaCaja" type="text"
                                value="<?php echo $socio['email']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Telefono 1</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf1Socio fondocaja colorLineaCaja" type="text"
                                value="<?php echo $socio['telefono1']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Telefono 2</label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf2Socio fondocaja colorLineaCaja" type="text"
                                value="<?php echo $socio['telefono2']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                            <label class="textFormularioVoluntario">Cantidad a aportar</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja"
                                       type="text" value="<?php echo $socio['cantidad']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4"></div>

                    <hr class="lineaH mt-md-5">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p class="subtitle">Cuenta Bancaria</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-md-between mt-md-2">
                        <div class="col-12 col-md-2 mt-5">
                            <label class="textFormularioVoluntario textoBanco">IBAN</label>
                            <div class="input-group">
                                <label class="textFormularioVoluntario textoBanco">&nbsp;</label>
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text"
                                value="<?php echo $socio['iban']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-12 col-md-2 mt-5">
                            <label class="textFormularioVoluntario textoBanco">Entidad</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text"
                                value="<?php echo $socio['entidad']?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mt-5">
                            <label class="textFormularioVoluntario textoBanco">Oficina</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text"
                                value="<?php echo $socio['oficina']?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mt-5">
                            <label class="textFormularioVoluntario textoBanco">DC</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text"
                                value="<?php echo $socio['dc']?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mt-5">
                            <label class="textFormularioVoluntario textoBanco">Cuenta</label>
                            <div>
                                <input class="colorLineaCaja lineahazteSocioCuenta" type="text"
                                value="<?php echo $socio['cuenta']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="row justify-content-md-center mb-md-5 mt-md-5">
                        <div class="mt-md-5 col-md-4 centerText" id="divEdit">
                            <button type="button" class="btn btn-primary botonSocEdit" onclick="setEditing(true)">
                                Editar Perfil
                            </button>
                        </div>

                        <div class="mt-md-5 col-md-4 centerText" id="divSave">
                            <button type="button" class="btn btn-primary botonSocEdit" onclick="save()">
                                Guardar Cambios
                            </button>
                        </div>

                        <div class="mt-md-5 col-md-4 centerText" id="divDelete">
                             <button type="button" class="btn btn-primary botonSocElim" id="botonEliminar">Darse de Baja</button>
                        </div>
                    </div>
                        <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php include("./views/partials/footer.part.php"); ?>
<script type="text/javascript" src="./jsValidar/validarhojasocio.js"></script>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>
