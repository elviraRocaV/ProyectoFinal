<?php
require_once "./database/connection.php";
$dbh = Connection::make();
include("./views/partials/cabeceraAdministrador.php");
$uploadfileerror=false;
$timeZone='Europe/Madrid';
date_default_timezone_set($timeZone);

if($_SERVER['REQUEST_METHOD']==="POST") {
    $ruta="";
    $nombre="";
    $lugar="";
    $descripcion="";

    $fecha=DateTime::createFromFormat('d/m/Y H:i',$_POST["fechaEvento"] . " " . $_POST["horaEvento"]);

    if (isset($_POST["nombreEvento"]))        {$nombre = $_POST["nombreEvento"];}
    if (isset($_POST["lugarEvento"]))         {$lugar = $_POST["lugarEvento"];}
    if (isset($_POST["descripcionEvento"]))   {$descripcion = $_POST["descripcionEvento"];}

    $destfile="";
    $rutaFotos=".\\fotoseventos\\";

     if ($_FILES['fotoEvento']['error'] === UPLOAD_ERR_OK) {
        if (is_file($_FILES['fotoEvento']['tmp_name']) === true) {
            $array=explode(".", basename($_FILES['fotoEvento']['name']));
            $extension=end($array);
            $destfile=$rutaFotos . uniqid('', true) . "." . $extension;
            move_uploaded_file($_FILES['fotoEvento']['tmp_name'], $destfile );
        }
    } else {
        $uploadfileerror=true;
    }
    $rutaRelativa = ltrim(str_replace("\\","/", $destfile), ".");
    $stmt = $dbh->prepare("insert into eventos(nombre, fecha, lugar, descripcion, ruta) values(:nombre, :fecha, :lugar, :descripcion, :ruta)");
    $stmt->execute([":nombre" => $nombre, ":fecha"=>$fecha->format(DateTime::ATOM), ":lugar" => $lugar, ":descripcion" => $descripcion, ":ruta" => $rutaRelativa]);
}
?>

<div class="container-fluid sinPadding">
    <div class="fondoGatoSocio sinPadding">

        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-md-4 mb-md-5">
                <p class="subtitulo">Creación de Eventos</p>
            </div>
        </div>

        <div class="container sinPadding">

            <form action="introducirEventos.php" method="post" enctype="multipart/form-data">
                <?php
                    if ($uploadfileerror) {
                        echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"text-align: center\">
                         Ha ocurrido un error al subir el archivo. Intentalo de nuevo y si el error persiste inténtalo con otro archivo.
                        </div>";
                    }
                ?>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario">Nombre<span class="asterisco">*</span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="nombreEvento"
                               id="nombreGato" placeholder="Nombre Evento" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario ml-md-4">Fecha<span class="asterisco">* </span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="fechaEvento"
                               id="razaGato" placeholder="00/00/0000" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario ml-md-4">Lugar<span class="asterisco">* </span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="lugarEvento"
                               id="edadGato" placeholder="Nombre Lugar" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario ml-md-4">Hora<span class="asterisco">* </span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="horaEvento"
                               id="edadGato" placeholder="00:00" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[0-9]{2}:[0-9]{2}$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario">Descripción<span class="asterisco">*</span></label><br>
                        <textarea class="linea lineahazteVoluntario fondocaja" rows="8" cols="20" name="descripcionEvento"
                                  id="descripcionGato" required onfocus="ponerFondoGris(this)"></textarea>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-4">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 col-sm-6 mt-sm-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario">Imagen<span class="asterisco">*</span></label><br>
                        <input type="file" name="fotoEvento" id="fotoEvento">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="mt-md-5 mb-md-5">
                        <button class="btn btn-primary boton1" type="submit" role="button" id="button1">Enviar</button>
                    </div>
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000"
            </form>
        </div>
    </div>
</div>

<?php include("./views/partials/footer.part.php"); ?>


<script type="text/javascript" src="./jsvalidar/validardatossociovoluntario.js"></script>

