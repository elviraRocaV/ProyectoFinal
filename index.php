
<?php
include("views/partials/cabecera.part.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-1">
            <p class="subtitulo">Inicio</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-md-5 ">
            <div class="carousel slide" id="principal-carousel" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-block">
                                <p class="textoDentroFoto">Gatos en adopción</p>
                        </div>
                        <img class="fotoGato" src="gatosAdopcion/05.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="fotoGato" src="gatosAdopcion/02.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="fotoGato" src="gatosAdopcion/01.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="fotoGato" src="gatosAdopcion/04.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="fotoGato" src="gatosAdopcion/03.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="fotoGato" src="gatosAdopcion/07.jpg">
                    </div>
                </div>
                        
                <a href="#principal-carousel" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">siguiente</span>
                </a>
                        
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 indexHazteVoluntario mt-md-5 offset-md-1">
            <p>Hazte voluntario</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 indexHazteVoluntarioParraf mt-md-1 offset-md-1">
            <p>Si quieres colaborar con nosostros, puedes hacerte voluntario, lo único que tienes que hacer es rellenar
                    el formulario y así formalizar la inscripción.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 cajaBoton mt-md-1 offset-md-1">
            <a href="hazteVoluntario.php" class="btn btn-primary boton1" role="button">Hazte Voluntario</a>
        </div>

        <div class="col-md-5 offset-md-7">
            <img class="fotoIndex1 " src="gatosAdopcion/indexHazteVol.jpg" alt="foto">
        </div>
    </div>



    <div class="row">
        <div class="col-md-12 indexHazteVoluntario mt-md-5 offset-md-1">
            <p>Ayúdanos</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 indexHazteVoluntarioParraf mt-md-1 offset-md-1">
            <p>Nos gustaría mucho que nos ayudases haciéndote socio, es muy fácil, únicamnete debes rellenar un formulario. Tu aportación, hará más por los animales.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 cajaBoton mt-md-1 offset-md-8">
            <a href="hazteVoluntario.php" class="btn btn-primary boton1" role="button">Ayúdanos</a>
        </div>

        <div class="col-md-5 offset-md-1">
            <img class="fotoIndex2" src="gatosAdopcion/indexHazteAyu.jpg" alt="foto">
        </div>

    </div>




    <div class="row">
        <div class="col-md-12 indexHazteVoluntario mt-md-5 offset-md-1">
            <p>Adopta</p>
        </div>
        <div class="col-md-8 indexHazteVoluntarioParraf mt-md-1 offset-md-1">
            <p>Estos son algunos de los gatos que están esperando para ser adoptados.</p>
        </div>

    </div>






</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>