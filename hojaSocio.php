<?php
session_start();
require_once "Database/Connection.php";
require_once "Entities/Socio.php";
$conexion = Connection::make();

$dni = $_SESSION["dniSocio"];  //es un nombre de variable

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $nom = "";
    $apellidos = "";
    $dni = "";
    if (isset($_POST["nombre"]))        { $nom = strtoupper($_POST["nombre"]); }
    if (isset($_POST["apellidos"]))     { $apellidos = strtoupper($_POST["apellidos"]); }
    if (isset($_POST["dni"]))           { $dni = strtoupper($_POST["dni"]); }

    $stmt = $conexion->prepare("UPDATE SOCIOS SET nombre=:nombre, apellido=:apellido WHERE dni=:dni");
    $stmt->execute([":nombre" => $nom, ":apellido" => $apellidos, ":dni" => $dni]);
}

$stmt = $conexion->prepare("select * from socios where dni=:dni");
$stmt->execute([":dni" => $dni]);
$resultados = $stmt->fetchAll(PDo::FETCH_OBJ);

?>
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
    <link rel="stylesheet" href="iconmoon/style.css">
</head>

<script src="js/jquery-3.3.1.min.js"></script>
<div class="container-fluid sinPadding">
    <header class="row mt-3 justify-content-md-around">

        <div class="col-md-2 col-sm-6 col-6 mt-md-4 mt-sm-1 text-sm-left ml-md-2 posLogo1">
            <img class="imagenlogo" src="imagenes/logoAyunt.png">
        </div>

        <div class="col-md-7  ml-5 textoPlan text-md-center text-sm-center text-center">
            <h1 class="pt-md-4 textoTitle"><em><strong>Plan Esterilización Felina</strong></em></h1>
        </div>

        <div class="col-md-2 col-sm-6 col-6 mt-md-3 mt-sm-1 ml-md-4 mr-md-1 text-sm-right text-right posLogo2">
            <img class="imagenlogo" src="imagenes/logoCEU.png">
        </div>
    </header>
</div>

<div class="container-fluid sinPadding">
    <div class="row justify-content-md-end justify-content-sm-start sinMargenes">
        <div class="col-md-2 col-sm-4 col-4 mt-2 accesoVoluntarios">
            <a class="textoAcceso" href="accesoVoluntarios.php">Acceso voluntarios<span
                        class="icon-enter icono ml-2"></span></a>
        </div>
    </div>
</div>

<nav class=" navbar navbar-expand-lg navbar-light bg-light justify-content-sm-start sinPadding b">
    <button class="navbar-toggler botonMenu" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse menuPrincipal" id="navbarNavDropdown">

        <a class="navbar-brand mb-md-4 ml-md-5 gato" href="index.php">
            <img src="imagenes/gatoBlanco.png" style="width: 45px">
        </a>
        <ul class="navbar-nav">

            <li class="texto mt-md-4 ml-md-3">
                <a class="textMenuPrinci" href="ayudanos.php">Hazte Voluntario</a>
            </li>
            <li class="texto mt-md-4 ml-md-3">
                <a class="textMenuPrinci" href="ayudanos.php">Eventos</a>
            </li>
            <li class="texto mt-md-4 ml-md-3">
                <a class="textMenuPrinci" href="eventos.php">Adopción</a>
            </li>
        </ul>
    </div>
</nav>

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

            <form id="socioform" action="hojaSocio.php" method="post">
                <div class="row mt-5">

                    <?php
                    foreach ($resultados
                    as $resultado)
                    {
                    ?>
                    <div class="col-md-4 mt-2 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Nombre:</label>
                        <input name="nombre" type="text" class="cajaResultadoSocio sinBorde" value="<?php echo $resultado->nombre; ?>"
                               readonly>
                    </div>
                    <div class="col-md-4 mt-5 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Apellidos:</label>
                        <input name="apellidos" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->apellido; ?>" readonly>
                    </div>
                    <div class="col-md-4 mt-5 mt-md-2 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">DNI:</label>
                        <input name="dni" id="dni" type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->dni; ?>"
                               readonly>
                    </div>
                </div>

                <div class="row mt-5 d-flex justify-content-center mb-sm-5">
                    <label class="etiquetas col-12 mt-5 d-flex justify-content-center ">Fecha Nacimiento:</label>

                    <div class="alinearFecha centrarTexto">
                        <div class="mt-4 mt-sm-5 mt-md-5 col-12 col-sm-4">
                            <p class="textoFecha">dia</p>
                            <input type="text" class="cajaFechaSocio sinBorde ml-3"
                                   value="<?php $resultado->diaFecha; ?>" readonly>
                        </div>

                        <div class="mt-5 col-12 col-sm-4">
                            <p class="textoFecha">mes</p>
                            <input type="text" class="cajaFechaSocio sinBorde ml-3"
                                   value="<?php $resultado->mesFecha; ?>" readonly>
                        </div>

                        <div class="mt-5 col-12 col-sm-4">
                            <p class="textoFecha">año</p>
                            <input type="text" class="cajaFechaSocio sinBorde ml-3"
                                   value="<?php $resultado->anyoFecha; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-12 etiquetas mt-5 d-flex justify-content-center">Dirección:</label>
                    <div class="centrarTexto">
                        <div class="col-12 mb-md-3 mt-5">
                            <p class="textoFecha">Calle</p>
                            <input type="text" class="cajaNombreCalleSocio sinBorde ml-3"
                                   value="<?php echo $resultado->direccion; ?>" readonly>
                        </div>
                    </div>

                    <div class="centrarTextoDireccion col-md-12">
                        <div class="col-12 col-sm-3 mt-5 mt-md-2">
                            <p class="textoFecha">Nº</p>
                            <input type="text" class="cajaNumeroSocio sinBorde"
                                   value="<?php echo $resultado->numero; ?>" readonly>
                        </div>

                        <div class="col-12 col-sm-3 mt-5 mt-md-2">
                            <p class="textoFecha">Portal</p>
                            <input type="text" class="cajaPortalSocio sinBorde"
                                   value="<?php echo $resultado->portal; ?>" readonly>
                        </div>

                        <div class="col-12 col-sm-3 mt-5 mt-md-2">
                            <p class="textoFecha">Piso</p>
                            <input type="text" class="cajaPisoSocio sinBorde" value="<?php echo $resultado->piso; ?>"
                                   readonly>
                        </div>

                        <div class="col-12 col-sm-3 mt-5 mt-md-2">
                            <p class="textoFecha">Letra</p>
                            <input type="text" class="cajaPisoSocio sinBorde" value="<?php echo $resultado->letra; ?>"
                                   readonly>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Población:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->poblacion; ?>" readonly>
                    </div>

                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Código Postal:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde" value="<?php echo $resultado->cp; ?>"
                               readonly>
                    </div>
                    <!--
                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Provincia:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde" value="<?php echo $resultado->provincia; ?>" readonly>
                    </div>
-->
                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Código Postal:</label>
                        <select class="browser-default custom-select fondocaja colorLineaCaja" id="provincias"
                                name="provinciaSocio" style="width:90%">
                            <option selected disabled value="0">Selecciona tu provincia</option>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $.getJSON('data/provincias.json', function (datos) {
                                        for (index in datos.provincias) {
                                            $('#provincias').append('<option ' + 'value=' + datos.provincias[index].id + '>' + datos.provincias[index].nm + '</option>');
                                        }
                                        $('#provincias').val(<?php echo $resultado->provincia; ?>);
                                    });
                                });
                            </script>
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Correo Electrónico:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde" value="<?php echo $resultado->email; ?>"
                               readonly>
                    </div>

                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Teléfono 1:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->telefono1; ?>" readonly>
                    </div>

                    <div class="col-md-4 mt-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Teléfono 2:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->telefono2; ?>" readonly>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 mt-md-5 centrarTextoCajas">
                        <label class="etiquetas d-flex justify-content-center">Cantidad a aportar:</label>
                        <input type="text" class="cajaResultadoSocio sinBorde"
                               value="<?php echo $resultado->cantidad; ?>" readonly>
                    </div>
                </div>

                <div class="row d-flex justify-content-center   mt-md-5 mb-5">
                    <div class="mt-5">
                        <label class="etiquetas d-flex justify-content-md-center">Datos Bancarios:</label>

                        <div class="mt-5 mt-md-0 centrarTextoBanco">

                            <div class="ml-md-5 col-12 mt-md-5 col-md-2">
                                <p class="textoFecha">IBAN</p>
                                <input type="text" class="cajaDatoIbanSocio sinBorde ml-3"
                                       value="<?php echo $resultado->iban; ?>" readonly>
                            </div>

                            <div class="ml-md-5 col-12 mt-5 col-md-2">
                                <p class="textoFecha">Banco</p>
                                <input type="text" class="cajaDatoBancoSocio sinBorde ml-3"
                                       value="<?php echo $resultado->entidad; ?>" readonly>
                            </div>

                            <div class="ml-md-5 col-12 mt-5 col-md-2">
                                <p class="textoFecha">Oficina</p>
                                <input type="text" class="cajaDatoOficinaSocio sinBorde ml-3"
                                       value="<?php echo $resultado->oficina; ?>" readonly>
                            </div>

                            <div class="ml-md-5 col-12 mt-5 col-md-2">
                                <p class="textoFecha">DC</p>
                                <input type="text" class="cajaDatoDCSocio sinBorde ml-3"
                                       value="<?php echo $resultado->dc; ?>" readonly>
                            </div>

                            <div class="ml-md-5 col-12 mt-5 col-md-2">
                                <p class="textoFecha">Cuenta</p>
                                <input type="text" class="cajaDatoCuentaSocio sinBorde ml-3"
                                       value="<?php echo $resultado->cuenta; ?>" readonly>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="mt-md-5 col-md-4 centerText" id="divEdit">
                        <p class="textoFecha">Editar Perfil</p>
                        <button type="button" class="btn btn-primary botonSocEdit" onclick="setEditing(true)">
                            Editar
                        </button>
                    </div>

                    <div class="mt-md-5 col-md-4 centerText" id="divSave">
                        <p class="textoFecha">Guardar Cambios</p>
                        <button type="button" class="btn btn-primary botonSocEdit" onclick="save()">
                            Guardar
                        </button>
                    </div>

                    <div class="mt-md-5 col-md-4 centerText" id="divCancel">
                        <p class="textoFecha">Cancelar</p>
                        <button type="button" class="btn btn-primary botonSocEdit" onclick="cancel()">
                            Cancelar
                        </button>
                    </div>

                    <div class="mt-md-5 col-md-4 centerText" id="divDelete">
                        <p class="textoFecha">Darse de Baja</p>
                        <a href="bajaSocio.php">
                            <button type="button" class="btn btn-primary botonSocElim" onclick="erase()">Eliminar
                            </button>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </form>
        </div>
        </div>
    </div>
</div>
</div>

<?php include("views/partials/footer.part.php"); ?>
<script type="text/javascript" src="jsValidar/validarDatosSocioVoluntario.js"></script>
<script type="text/javascript">
    setEditing(false)
</script>
</html>