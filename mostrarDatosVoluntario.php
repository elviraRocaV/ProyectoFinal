<?php
session_start();
require_once "./database/connection.php";
$conexion=Connection::make();

require "./views/partials/cabecera.part.php";

$dni=$_SESSION['dniVoluntario'];
$datosInsertados=false;

$stmt=$conexion->prepare("SELECT * from voluntariado where dni='$dni'");
$stmt->execute();
$voluntarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD']=="POST")
{
    echo "pasa";
    $enviar = $_REQUEST['actualizarDatos'];
    print_r($_REQUEST['actualizarDatos']);

    if ($enviar) {

        $name = strtoupper($_POST["usuario"]);
        $apellidos = strtoupper($_POST["apellido"]);
        $dni = strtoupper($_POST["dniVoluntario"]);
        $date = $_POST["fecha"];
        $zonaReside = strtoupper($_POST["zona"]);
        $num = $_POST["numero"];
        $portal = $_POST["portal"];
        $piso = $_POST["piso"];
        $letra = strtoupper($_POST["letra"]);
        $cp = $_POST["CP"];
        $provincia = strtoupper($_POST["provincia"]);
        $mail = strtoupper($_POST["correo"]);
        $telf1 = $_POST["telefono1"];
        $telf2 = $_POST["telefono2"];

        $stmt = $conexion->prepare("UPDATE voluntariado SET nombre=$name, apellido=$apellidos, dni=$dni, fechanacimiento=$date, zona=$zonaReside,
        numero=$num, portal=$portal, piso=$piso, letra=$letra,cp=$cp, provincia=$provincia, mail=$mail, telefono1=$telef1, telefono2=$telef2
        where dni=$dni");
        $stmt->execute();

        $datosInsertados=true;

    }
}





?>


<div class="container-fluid sinPadding">
    <div class="fondoGatoSocio">
        <div class="container-fluid">
            <form action="mostrarDatosVoluntario.php" method="post">

                <div class="row">
                    <div class="col-12 mt-md-5 d-flex justify-content-center">
                        <p class="subtitle">SUS DATOS SON:</p>
                    </div>
                </div>

                <div class="container sinPadding">
                    <div class="row d-flex justify-content-md-between">
                        <?php
                        foreach ($voluntarios as $voluntario)
                        {?>

                        <div class="col-md-4 col-12 mt-md-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text" name="usuario"
                                       value="<?php echo $voluntario['nombre']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text"
                                       value="<?php echo $voluntario['apellido']?>" name="apellido" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">DNI</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="dniVoluntario"
                                       value="<?php echo $voluntario['dni'] ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Fecha nacimiento</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text"
                                       value="<?php echo $voluntario['fechanacimiento']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">ona donde reside</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text"
                                       value="<?php echo $voluntario['zona'] ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12">
                            <div class="row">
                                <div class="anchoCajas d-flex justify-content-md-between">
                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Nº</label><br>
                                        <input class="lineahazteVoluntarioDirec1" type="text" name="numero"
                                               value="<?php echo $voluntario['numero']?>" readonly>
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Portal</label>
                                        <input class="lineahazteVoluntarioDirec2" type="text" name="portal"
                                               value="<?php echo $voluntario['portal']?>" readonly>
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Piso</label>
                                        <input class="lineahazteVoluntarioDirec3" type="text" name="piso" id="pisoSocio"
                                               value="<?php echo $voluntario['piso']?>" readonly>
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Letra</label>
                                        <input class="lineahazteVoluntarioDirec4" type="text" name="letra" id="letraSocio"
                                               value="<?php echo $voluntario['letra']?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-between">

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Código Postal</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteSocioCP fondocaja colorLineaCaja" type="text" name="CP"
                                       value="<?php echo $voluntario['cp']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Provincia</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text"
                                       value="<?php echo $voluntario['provincia']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Mail</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="mailSocio fondocaja colorLineaCaja" type="text" name="correo"
                                       value="<?php echo $voluntario['mail']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Telefono 1</label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="telefono1"
                                       value="<?php echo $voluntario['telefono1']?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Telefono 2</label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="telefono2"
                                       value="<?php echo $voluntario['telefono2']?>" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-md-5">

                    <div class="row">
                        <div class="col-12 mt-md-5 d-flex justify-content-center">
                            <p class="subtitle">Datos Colonia:</p>
                        </div>
                    </div>

                    <div class="row justify-content-md-center mt-md-4" style="visibility:"
                        <?php
                        $stmt=$conexion->prepare("SELECT * FROM colonia WHERE idVoluntario='$dni'");
                        $stmt->execute();
                        $colonias =$stmt->fetchAll(PDO:: FETCH_ASSOC);
                            }?>>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center" style="height: 100%">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Núm Colonia</th>
                                        <th></th>
                                        <th>Ubicación</th>
                                        <th></th>
                                        <th>Núm Total de Gatos</th>
                                        <th></th>
                                        <th>Núm de Gatas</th>
                                        <th></th>
                                        <th>Núm Gatas Castradas</th>
                                        <th></th>
                                        <th>Núm Gatas por Castrar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($colonias as $colonia)
                                     {?>
                                        <tr>
                                            <td style="text-align: center"><?php echo $colonia['idcolonia']?></td>
                                            <td></td>
                                            <td class="colonia" style="text-align: center"><?php echo $colonia['ubicacion']?></td>
                                            <td></td>
                                            <td class="colonia" style="text-align: center"><?php echo $colonia['numgatostotal']?></td>
                                            <td></td>
                                            <td class="colonia" style="text-align: center"><?php echo $colonia['numgatastotal']?></td>
                                            <td></td>
                                            <td class="colonia" style="text-align: center"><?php echo $colonia['numgatascastradas']?></td>
                                            <td></td>
                                            <td class="colonia" style="text-align: center"><?php echo $colonia['numgatascastradas']?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

        <?php
            if($datosInsertados)
            {?>
                <div class="alert alert-info">
                    <strong>Info!!</strong> Los datos se han modificado correctamente.
                </div>
            <?php   }  ?>

        <div class="row justify-content-md-center mt-md-4">
            <div class="col-md-3"></div>
            <div class="col-md-1 mt-md-5 mb-md-5">
                <a href="index.php" class="btn btn-primary boton1" type="submit" role="button" id="button1">Salir</a>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-1 mt-md-5 mb-md-5">
                <button class="btn btn-primary boton1" type="submit" role="button" id="buttonEditar">Editar</button>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-2 mt-md-5 mb-md-5">
                <button class="btn btn-primary boton1" role="button" id="buttonGuardarCambios" name="actualizarDatos" type="submit">Guardar Cambios</button>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>
    <?php include("./views/partials/footer.part.php"); ?>
</div>

<script type="text/javascript" src="./jsvalidar/mostrarDatosVoluntario.js"></script>














