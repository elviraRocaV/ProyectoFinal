<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$hasError = false;
$Title = "";
$Text = "";
$exists = false;
$added = false;
$updated = false;
$viewing = false;

require_once "./views/partials/cabecera.part.php";
require_once "./database/connection.php";
require_once "./entities/voluntario.php";
$conexion = Connection::make();
$voluntario = [];

$editing = (isset($_SESSION["dniVoluntario"]) && $_SESSION["dniVoluntario"] != "") || (isset($_POST) && isset($_POST["datosVoluntario"]));

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ( !isset($_SESSION) || ! isset($_SESSION["dniVoluntario"]) ) {
        session_destroy();
        session_start();
    } else { //VENGO CON DATOS DEL DNI EN LA SESSION
        if (isset($_SESSION["dniVoluntario"])) {
            $query = $conexion->prepare("select * from voluntariado where dni=:dni");
            $query->execute([":dni" => $_SESSION["dniVoluntario"]]);
            $query->execute();
            $voluntario = $query->fetch(PDO:: FETCH_ASSOC); // Si existe lo cargo
            $editing = true;
        }

    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Si tengo datos en el post miro si existe
    if (isset($_POST["datosVoluntario"])) {
        $query = $conexion->prepare("select count(dni) from voluntariado where dni=:dni");
        $query->execute([":dni" => $_POST["datosVoluntario"]["dni"]]);
        $query->execute();
        $exists = $query->fetch(PDO:: FETCH_NUM)[0] == 1; // Si existe lo edito
    }

    //Si existe Muestro un error
    if ($exists && !$editing) {
        $voluntario = $_POST["datosVoluntario"];
        $Title = "Error";
        $Text = "El usuario ya existe";
    }

    //Si no existe lo inserto o edito
    if (!$exists || $editing) {
        if (!$exists) {
            $query = $conexion->prepare("INSERT INTO voluntariado (nombre, apellidos, dni, fechanacimiento, zona,
            direccion, numero, portal, piso, letra, cp, provincia, correo, telefono1, telefono2, password) VALUES (
            :nombre, :apellidos, :dni, :fechanacimiento, :zona, :direccion,:numero, :portal, :piso, :letra, 
            :cp, :provincia, :correo, :telefono1, :telefono2, :password)");
        } elseif ($editing) {
            $query = $conexion->prepare("UPDATE voluntariado SET
            nombre=:nombre, apellidos=:apellidos, fechanacimiento=:fechanacimiento, zona=:zona, direccion=:direccion, numero=:numero,
            portal=:portal, piso=:piso, letra=:letra, cp=:cp, provincia=:provincia, correo=:correo,
            telefono1=:telefono1, telefono2=:telefono2, password=:password where dni=:dni");
        }
        $voluntario = $_POST["datosVoluntario"];

        $nombre = isset($voluntario["nombre"]) ? strtoupper($voluntario["nombre"]) : "";
        $query->bindParam(':nombre', $nombre);
        $apellidos = isset($voluntario["apellidos"]) ? strtoupper($voluntario["apellidos"]) : "";
        $query->bindParam(':apellidos', $apellidos);
        $dni = isset($voluntario["dni"]) ? strtoupper($voluntario["dni"]) : "";
        $query->bindParam(':dni', $dni);
        $date = isset($voluntario["fechanacimiento"]) ? $voluntario["fechanacimiento"] : null;
        $query->bindParam(':fechanacimiento', $date);

        $zona = isset($voluntario["zona"]) ? strtoupper($voluntario["zona"]) : "";
        $query->bindParam(':zona', $zona);
        $direccion = isset($voluntario["direccion"]) ? strtoupper($voluntario["direccion"]) : "";
        $query->bindParam(':direccion', $direccion);
        $numero = isset($voluntario["numero"]) ? strtoupper($voluntario["numero"]) : "";
        $query->bindParam(':numero', $numero);
        $portal = isset($voluntario["portal"]) ? strtoupper($voluntario["portal"]) : "";
        $query->bindParam(':portal', $portal);
        $piso = isset($voluntario["piso"]) ? strtoupper($voluntario["piso"]) : "";
        $query->bindParam(':piso', $piso);
        $letra = isset($voluntario["letra"]) ? strtoupper($voluntario["letra"]) : "";
        $query->bindParam(':letra', $letra);

        $cp = isset($voluntario["cp"]) ? strtoupper($voluntario["cp"]) : "";
        $query->bindParam(':cp', $cp);
        $provincia = isset($voluntario["provincia"]) ? strtoupper($voluntario["provincia"]) : "";
        $query->bindParam(':provincia', $provincia);

        $correo = isset($voluntario["correo"]) ? strtoupper($voluntario["correo"]) : "";
        $query->bindParam(':correo', $correo);
        $telefono1 = isset($voluntario["telefono1"]) ? strtoupper($voluntario["telefono1"]) : "";
        $query->bindParam(':telefono1', $telefono1);
        $telefono2 = isset($voluntario["telefono2"]) ? strtoupper($voluntario["telefono2"]) : "";
        $query->bindParam(':telefono2', $telefono2);

        $pass = isset($voluntario["password"]) ? $voluntario["password"] : "";
        //$hash = password_hash($pass, PASSWORD_DEFAULT, ["cost" => 15]);
        $hash=sha1(trim($pass));
        $query->bindParam(':password', $hash);
        $query->execute();
        if (!$exists) {
            $added = true;
            $Title = "Registro Correcto";
            $Text = "El usuario se ha registrado Correctamente";
        } elseif ($editing) {
            $updated = true;
            $Title = "Actualización Correcta";
            $Text = "El usuario se ha actualizado Correctamente";
        }
        $_SESSION["dniVoluntario"] = "" . $dni;
    }

}

?>

<div class="container-fluid sinPadding">
    <div class="col-md-12 fondoGatoSocio">
        <div class="container-fluid">
            <form action="hazteVoluntario.php" method="post">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mb-md-2 mt-5">
                        <p class="subtitulo">Hazte Voluntario</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <p class="subtitle">Datos Personales</p>
                    </div>
                </div>

                <div class="container sinPadding">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text"
                                       name="datosVoluntario[nombre]" id="nombre"
                                       value="<?php if (isset($voluntario['nombre'])) {
                                           echo $voluntario['nombre'];
                                       } ?>" placeholder="Nombre" required
                                       onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja"
                                       type="text"
                                       value="<?php if (isset($voluntario['apellidos'])) {
                                           echo $voluntario['apellidos'];
                                       } ?>" name="datosVoluntario[apellidos]" id="apellidos"
                                       placeholder="Apellido1 Apellido2" required onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)">
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i
                                            class="glyphicon glyphicon-list-alt"></i></span>
                                <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text"
                                       name="datosVoluntario[dni]" id="dni"
                                       value="<?php if (isset($voluntario['dni'])) {
                                           echo $voluntario['dni'];
                                       } ?>" placeholder="00000000X" required onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^\d{8}[a-zA-Z]$/)" data-mask="00000000S">
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label>Fecha nacimiento <span class="asterisco">*</span></label>
                            <div class="input-group date anchoFecha" data-provide="datepicker">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                <input class="form-control lineahazteVoluntarioFechaNa colorLineaCaja" type="text"
                                       value="<?php if (isset($voluntario['fechanacimiento'])) {
                                           echo $voluntario['fechanacimiento'];
                                       } ?>"
                                       name="datosVoluntario[fechanacimiento]" id="fecha" required
                                       onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^\d{2}\/\d{2}\/\d{4}$/)">
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-3">
                            <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="datosVoluntario[direccion]"
                                       id="direccionSocio" placeholder="Dirección" value="<?php if(isset($voluntario['direccion'])) { echo $voluntario['direccion'];}?>"
                                       required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s?[a-zA-Z])*$/)">
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4 col-12">
                            <div class="row">
                                <div class="anchoCajas d-flex justify-content-md-between">
                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Nº<span
                                                    class="asterisco">*</span></label><br>
                                        <input class="lineahazteVoluntarioDirec1" type="text"
                                               name="datosVoluntario[numero]"
                                               value="<?php if (isset($voluntario['numero'])) {
                                                   echo $voluntario['numero'];
                                               } ?>"
                                               id="numero" required onfocus="ponerFondoGris(this)"
                                               onblur="validar(this,/^\d{1,3}$/)">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Portal</label>
                                        <input class="lineahazteVoluntarioDirec2" type="text"
                                               name="datosVoluntario[portal]"
                                               value="<?php if (isset($voluntario['portal'])) {
                                                   echo $voluntario['portal'];
                                               } ?>"
                                               id="portal" onfocus="ponerFondoGris(this)"
                                               onblur="validar(this,/^\d{1,3}$/)">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Piso</label>
                                        <input class="lineahazteVoluntarioDirec3" type="text"
                                               name="datosVoluntario[piso]" id="piso"
                                               value="<?php if (isset($voluntario['piso'])) {
                                                   echo $voluntario['piso'];
                                               } ?>"
                                               onfocus="ponerFondoGris(this)" onblur="validar(this,/^\d{1,2}$/)">
                                    </div>

                                    <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-5 ml-5 ml-md-0">
                                        <label class="textFormularioVoluntario">Letra</label>
                                        <input class="lineahazteVoluntarioDirec4" type="text"
                                               name="datosVoluntario[letra]" id="letra"
                                               value="<?php if (isset($voluntario['letra'])) {
                                                   echo $voluntario['letra'];
                                               } ?>"
                                               onfocus="ponerFondoGris(this)" onblur="validar(this,/^\w{1}$/)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Zona donde reside <span
                                        class="asterisco">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <select class="lineahazteVoluntarioZona linea" name="datosVoluntario[zona]" id="zona"
                                        required onfocus="ponerFondoGris(this)">
                                    <option class="textFormularioVoluntario"
                                            value="" <?php if (!isset($voluntario['zona']) || $voluntario['zona'] == "") echo 'selected="selected"' ?>>
                                        Zona a Elegir
                                    </option>
                                    <option class="textFormularioVoluntario"
                                    <?php $valor = "MONCADA";
                                    echo "value=\"$valor\"";
                                    if (isset($voluntario['zona']) && $voluntario['zona'] == $valor) {
                                        echo 'selected="selected"';
                                    };
                                    echo ">$valor" ?></option>
                                    <option class="textFormularioVoluntario"
                                    <?php $valor = "BARRIO";
                                    echo "value=\"$valor\"";
                                    if (isset($voluntario['zona']) && $voluntario['zona'] == $valor) {
                                        echo 'selected="selected"';
                                    };
                                    echo ">$valor" ?></option>
                                    <option class="textFormularioVoluntario"
                                    <?php $valor = "BARRIO DE LOS DOLORES";
                                    echo "value=\"$valor\"";
                                    if (isset($voluntario['zona']) && $voluntario['zona'] == $valor) {
                                        echo 'selected="selected"';
                                    };
                                    echo ">$valor" ?></option>
                                    <option class="textFormularioVoluntario"
                                    <?php $valor = "MASÍAS";
                                    echo "value=\"$valor\"";
                                    if (isset($voluntario['zona']) && $voluntario['zona'] == $valor) {
                                        echo 'selected="selected"';
                                    };
                                    echo ">$valor" ?></option>
                                    <option class="textFormularioVoluntario"
                                    <?php $valor = "SAN ISIDRO DE BENAGEBER";
                                    echo "value=\"$valor\"";
                                    if (isset($voluntario['zona']) && $voluntario['zona'] == $valor) {
                                        echo 'selected="selected"';
                                    };
                                    echo ">$valor" ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Código Postal <span
                                        class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteSocioCP fondocaja colorLineaCaja" type="text"
                                       name="datosVoluntario[cp]"
                                       value="<?php if (isset($voluntario['cp'])) {
                                           echo $voluntario['cp'];
                                       } ?>"
                                       id="CP" placeholder="C.P" required onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^\d{5}$/); setProvincia(this)" data-mask="99999">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Provincia<span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <select class="colorLineaCaja lineahazteVoluntarioProvincia" id="provincias"
                                        value="<?php if (isset($voluntario->provincia)) {
                                            echo $voluntario->provincia;
                                        } ?>"
                                        name="datosVoluntario[provincia]" required>
                                    <option selected disabled value="0">Selecciona tu provincia</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-5">

                    <div class="row d-flex justify-content-md-between">
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i
                                            class="glyphicon glyphicon-envelope"></i></span>
                                <input class="mailSocio fondocaja colorLineaCaja" type="text"
                                       name="datosVoluntario[correo]"
                                       value="<?php if (isset($voluntario['correo'])) {
                                           echo $voluntario['correo'];
                                       } ?>"
                                       id="correo" placeholder="xxxxx@xxx.xxx" required onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^[a-z0-9]+\@[a-z]+\.[a-z]+$/)">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Telefono 1 <span
                                        class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i
                                            class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf1Socio fondocaja colorLineaCaja" type="text"
                                       name="datosVoluntario[telefono1]"
                                       value="<?php if (isset($voluntario['telefono1'])) {
                                           echo $voluntario['telefono1'];
                                       } ?>"
                                       id="telefono1" placeholder="Telefono 1" required onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^\d{9}$/)" data-mask="000000000">
                            </div>
                        </div>

                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Telefono 2</label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i
                                            class="glyphicon glyphicon-earphone"></i></span>
                                <input class="telf2Socio fondocaja colorLineaCaja" type="text"
                                       name="datosVoluntario[telefono2]"
                                       value="<?php if (isset($voluntario['telefono2'])) {
                                           echo $voluntario['telefono2'];
                                       } ?>"
                                       id="telefono2" placeholder="Telefono 2" onfocus="ponerFondoGris(this)"
                                       onblur="validar(this,/^\d{9}$/)" data-mask="000000000">
                            </div>
                        </div>
                    </div>

                    <hr class="lineaH mt-md-5">

                    <div class="row d-flex justify-content-md-between" <?php if ($viewing) {
                        echo 'style="visibility:hidden"';
                    } ?>>
                        <div class="col-md-4 col-12 mt-md-3 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Contraseña <span
                                        class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="passwordSocio1 fondocaja colorLineaCaja" type="password"
                                       name="datosVoluntario[password]"
                                       id="password" placeholder="Contraseña" required onfocus="ponerFondoGris(this)">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 ml-5 ml-md-0">
                            <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name=""
                                       id="password2" placeholder="contraseña" required
                                       onfocus="ponerFondoGris(this)" onblur="validarPassword()">
                            </div>
                        </div>
                        <div class="vistoPassword" id="visto1"></div>
                    </div>

                    <div class="row justify-content-md-center mt-md-4" style="visibility:"
                        <?php if ($editing) {
                            echo 'visible';
                        } else {
                            echo 'hidden';
                        } ?>>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center" style="height: 100%">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Núm Colonia</th>
                                        <th>Ubicación</th>
                                        <th>Núm Total de Gatos</th>
                                        <th>Núm de Gatas</th>
                                        <th>Núm Gatas Castradas</th>
                                        <th>Núm Gatas por Castrar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_SESSION["mostrarColonias"]) && $_SESSION["mostrarColonias"]) {
                                        $query = $conexion->prepare("select * from colonia where idVoluntario=:dni ");
                                        $query->execute([":dni" => $voluntario["dni"]]);
                                        $colonias = $query->fetchAll(PDO::FETCH_OBJ);
                                    }
                                    if (isset($colonias)) {
                                        foreach ($colonias as $colonia)
                                        {?>
                                            <tr>
                                                <td><?php echo $colonia->idcolonia;?></td>
                                                <td><?php echo $colonia->ubicacion;?></td>
                                                <td><?php echo $colonia->numgatostotal;?></td>
                                                <td><?php echo $colonia->numgatastotal;?></td>
                                                <td><?php echo $colonia->numgatascastradas;?></td>
                                                <td><?php echo $colonia->numgatastotal-$colonia->numgatascastradas;?></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-md-center mt-md-4">
                        <div class="col-md-2"></div>
                        <button class="col-md-2 mt-md-5 mb-md-5 btn btn-primary boton1" type="submit" role="button"
                                id="button1" disabled>Enviar
                        </button>
                        <div class="col-md-2"></div>
                        <button class="col-md-2 mt-md-5 mb-md-5 btn btn-primary boton1 mt-5" type="button" role="button"
                                id="btnColonias" style="visibility:"
                            <?php if ($editing) {
                                echo 'visible';
                            } else {
                                echo 'hidden';
                            } ?> onclick="document.location.href='coloniasGatos.php'">
                            Crear Colonias
                        </button>
                        <div class="col-md-2"></div>
                        <a href="index.php" class="col-md-1 mt-md-5 mb-md-5 btn boton1 mt-5 mb-5"
                           type="button" role="button">Salir</a>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mensaje Modal-->
<div class="modal" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="modaltype" class="modal-content alert">
            <div id="modaltype2" class="modal-header alert">
                <h2 class="modal-title" id="exampleModalLongTitle"><?php echo $Title ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $Text ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >Aceptar</button>
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
    });
</script>

<?php
if ($viewing) {
    echo "<script> window.onload = function () {
            setEditing(false);
        }</script>";
}
?>

<?php include("./views/partials/footer.part.php"); ?>
<script type="text/javascript" src="./jsvalidar/validardatos.js"></script>
<script type="text/javascript" src="./jsValidar/validardatos.js"></script>