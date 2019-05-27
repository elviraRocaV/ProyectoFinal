<?php
require_once "./database/connection.php";
$dbh = Connection::make();
include("./views/partials/cabecera.part.php");
?>


<?php
if($_SERVER['REQUEST_METHOD']==="POST") {
    $nombreGato="";
    $descripcionGato="";
    if (isset($_POST["nombreGato"]))        {$nombreGato = $_POST["nombreGato"];}
    if (isset($_POST["descripcionGato"]))   {$descripGato = $_POST["descripcionGato"];}
    $fotoGato = $_FILES['fotoGato']["name"];  //name es el nombre del archivo

    if ($fotoGato == false) {
        throw new UploadException("Error, este fichero no se ha subido");
    }
    $destfile="";
    $rutaFotos=".\\fotosgatosadopcion\\";
//    echo "RUTA: " . $rutaFotos . "<br>". print_r($_FILES['fotoGato']) - "<br> " . uniqid('',true);
    if (is_file($_FILES['fotoGato']['tmp_name']) === true) {
        $array=explode(".", basename($_FILES['fotoGato']['name']));
        $extension=end($array);
        $destfile=$rutaFotos . uniqid('', true) . "." . $extension;
        move_uploaded_file($_FILES['fotoGato']['tmp_name'], $destfile );
    }

    $rutaRelativa = ltrim(str_replace("\\","/", $destfile), ".");
    $stmt = $dbh->prepare("insert into gatosadopcion(nombre, descripcion, ruta) values(:nombre, :descripcion, :ruta)");
    $stmt->execute([":nombre" => $nombreGato, ":descripcion" => $descripcionGato, ":ruta" => $rutaRelativa]);
}
?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-1">
                    <p class="subtitulo">Introducción gatos para adopción</p>
                </div>
            </div>

            <form action="gatosadopcion.php" method="post" enctype="multipart/form-data"> <!--enctype=" -----" -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 offset-sm-1">
                        <label class="textFormularioVoluntario">Nombre<span class="asterisco">*</span></label><br>
                        <input class="linea lineahazteVoluntario fondocaja" type="text" name="nombreGato"
                               id="nombreGato" placeholder="Nombre gato" required onclick="cambiarFondoNombreGato()"
                        <!--onblur="cambiarFondoNombreGatos(this)-->">
                    </div>

                    <div class="col-md-1 col-sm-1 mt-md-3">
                        <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                        <div class="input-group" id="visto12"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 offset-sm-1">
                        <label class="textFormularioVoluntario">Descripción<span class="asterisco">*</span></label><br>
                        <textarea class="linea lineahazteVoluntario fondocaja" rows="8" cols="17" name="descripcionGato"
                                  id="descripcionGato" required onclick="cambiarFondoDescripGato()"
                        <!--onblur="cambiarFondoDescripGatos(this)-->"></textarea>
                    </div>

                    <div class="col-md-1 col-sm-1 mt-md-3">
                        <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                        <div class="input-group" id="visto13"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 offset-sm-1">
                        <label class="textFormularioVoluntario">Imagen<span class="asterisco">*</span></label><br>
                        <input type="file" name="fotoGato" id="fotoGato">
                        <!--esto se pone para poder subir una imagen-->
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="mt-md-5 mb-md-5">
                        <button class="btn btn-primary boton1" type="submit" role="button" id="button1">Enviar</button>
                    </div>
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000"
            </form>

            <?php
            include("./views/partials/footer.part.php");
            ?>
        </div>

        <script type="text/javascript" src="./jsvalidar/validardatossociovoluntario.js"></script>

