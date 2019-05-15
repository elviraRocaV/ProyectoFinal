<?php
require_once "DataBase/Connection.php";
$dbh = Connection::make();
include("views/partials/cabecera.part.php");
?>


<?php

$nomGato="";
$descripGato="";
$fotoGato="";

if($_SERVER['REQUEST_METHOD']!=="GET") {
    if (isset($_POST["nombreGato"])) {
        $nomGato = $_POST["nombreGato"];
    }

    if (isset($_POST["descripcionGato"])) {
        $descripGato = $_POST["descripcionGato"];
    }

    $fotoGato = $_FILES['fotoGato']["name"];  //name indica que estamos subiendo el archivo por su nombre

    if ($fotoGato == false) {
        throw new UploadException("Error, este fichero no se ha subido");
    }

    $rutaFotos = "\\FotosGatosAdopcion\\" . $fotoGato;     //nombre de la carpeta del servidor

    if (is_file($rutaFotos) === true) {
        $coletilla = time();
        $photoGato = $coletilla . "_" . $fotoGato;
        $rutaFotos = "\\FotosGatosAdopcion\\" . "_" . $fotoGato;


        move_uploaded_file($_FILES['fotoGato']['name'], $rutaFotos);

        $stmt = $dbh->prepare("insert into gatosadopcion(nombre, descripcion, ruta) values(:nombre, :descripcion, :ruta)");
        $stmt->execute([":nombre" => $rutaFotos, ":descripcion" => $descripGato, ":ruta" => $rutaFotos]);
    } else {
        echo "existe";
    }
}

        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-1">
                    <p class="subtitulo">Introducción gatos para adopción</p>
                </div>
            </div>

            <form action="gatosAdopcion.php" method="post" enctype="multipart/form-data"> <!--enctype=" -----" -->
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

            </form>

            <?php
            include("views/partials/footer.part.php");
            ?>
        </div>

        <script type="text/javascript" src="jsValidar/validarGatosAdopcion.js"></script>

