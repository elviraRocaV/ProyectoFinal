<?php
require_once "./database/connection.php";
$dbh = Connection::make();
include("./views/partials/cabeceraAdministrador.php");
?>


<?php
if($_SERVER['REQUEST_METHOD']==="POST") {
    $ruta="";
    $nombre="";
    $raza="";
    $edad="";
    $descripcion="";

    if (isset($_POST["nombreGato"]))        {$nombre = $_POST["nombreGato"];}
    if (isset($_POST["razaGato"]))          {$raza = $_POST["razaGato"];}
    if (isset($_POST["edadGato"]))          {$edad = $_POST["edadGato"];}
    if (isset($_POST["descripcionGato"]))   {$descripcion = $_POST["descripcionGato"];}

    //$fotoGato = $_FILES['fotoGato']["name"];  //name es el nombre del archivo

    $destfile="";
    $rutaFotos=".\\fotosgatosadopcion\\";


    if (is_file($_FILES['fotoGato']['tmp_name']) === true) {
        $array=explode(".", basename($_FILES['fotoGato']['name']));
        $extension=end($array);
        $destfile=$rutaFotos . uniqid('', true) . "." . $extension;
        move_uploaded_file($_FILES['fotoGato']['tmp_name'], $destfile );
    }

    if(is_uploaded_file($_FILES['fotoGato']['tmp_name'])===false)
    {
        throw new UploadException("Error, este fichero no se ha subido");
    }

    $rutaRelativa = ltrim(str_replace("\\","/", $destfile), ".");
    $stmt = $dbh->prepare("insert into gatosadopcion(nombre, raza, edad, descripcion, ruta) values(:nombre, :raza, :edad, :descripcion, :ruta)");
    $stmt->execute([":nombre" => $nombre, ":raza" => $raza, ":edad" => $edad,":descripcion" => $descripcion, ":ruta" => $rutaRelativa]);

}
?>

<div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-md-4">
                <p class="subtitulo">Introducción gatos para adoptar</p>
            </div>
        </div>

        <div class="container sinPadding">

            <form action="IntroducirGatosEnAdopcion.php" method="post" enctype="multipart/form-data">

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario">Nombre<span class="asterisco">*</span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="nombreGato"
                               id="nombreGato" placeholder="Nombre gato" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario ml-md-4">Raza<span class="asterisco">* </span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="razaGato"
                               id="razaGato" placeholder="raza gato" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario ml-md-4">Edad<span class="asterisco">* </span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja pl-5" type="text" name="edadGato"
                               id="edadGato" placeholder="Edad gato" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z0-9]+(\s[a-zA-Z0-9]+)*$/)">
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario">Descripción<span class="asterisco">*</span></label><br>
                        <textarea class="linea lineahazteVoluntario fondocaja" rows="8" cols="20" name="descripcionGato"
                                  id="descripcionGato" required onfocus="ponerFondoGris(this)" onblur="validar(this,/^[a-zA-Z]+(\s[a-zA-Z]+)*$/)"></textarea>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row mt-md-4">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 col-sm-6 mt-sm-4 d-flex justify-content-center">
                        <label class="textFormularioVoluntario">Imagen<span class="asterisco">*</span></label><br>
                        <input type="file" name="fotoGato" id="fotoGato">
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

<style>

    html {
        min-height: 100%;
        position: relative;
    }
    body {
        margin: 0;
        margin-bottom: 40px;
    }
    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
        color: white;
    }
</style>
    <?php include("./views/partials/footer.part.php"); ?>


<script type="text/javascript" src="./jsvalidar/validardatossociovoluntario.js"></script>
<script type="text/javascript" src="./jsvalidar/posicionarFooter.js"></script>

