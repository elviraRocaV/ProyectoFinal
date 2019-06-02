<?php
require_once "./database/connection.php";
$dbh = Connection::make();

$stmt = $dbh->prepare("select * from gatosadopcion");   //base de datos regalos
$stmt->execute();

$gatos = $stmt->fetchAll(PDO:: FETCH_ASSOC);
include("./views/partials/cabecera.part.php");
?>

<div class="container-fluid sinPadding">
    <div class="fondoGato">

        <div class="container sinPadding">
            <div class="row">
                <div class="col-12 mt-md-5 d-flex justify-content-center titInicio">
                    <p class="subtitulo">Inicio</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 indexHazteVoluntario1 mt-md-5 d-flex justify-content-center">
                    <h3><b>Qué es el plan de esterilización felina</b></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-md-5 d-flex justify-content-center indexHazteVoluntarioParraf">
                    <p class="alturaTextoIndice">El Ayuntamiento de Moncada, junto con el CEU San Pablo y las voluntarias de las colonias felinas de la ciudad de Moncada
                        desde hace 10 años están trabajando para poner fin al problema de la superpoblación felina de la ciudad y
                        tener un mayor control sobre las colonias existentes.<br>
                        Para ello, buscamos gente solidaria que quiera unise a nuestro proyecto</p>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-12 indexHazteVoluntario1 mt-md-5 d-flex justify-content-center">
                    <p>¿Quieres colaborar con nosotros?</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 indexHazteVoluntario mt-md-5 d-flex justify-content-center">
                    <p class="mr-md-5">Hazte voluntario</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 mt-md-5"></div>
                <div class="col-md-8 indexHazteVoluntarioParraf mt-md-1">
                    <p class="alturaTextoIndice">Si ya eres responsable de una colonia felia o quieres hacerlo, lo único que debes hacer es registrarte y así
                        nos ayudarás con el plan de esterilización felina</p>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2 cajaBoton mt-md-1 d-flex justify-content-center">
                    <a href="hazteVoluntario.php" class="btn btn-primary boton1" role="button">Hazte Voluntario</a>
                </div>
                <div class="col-md-8"></div>
            </div>

            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5 mt-5 d-flex justify-content-md-start d-flex justify-content-center">
                    <img class="fotoIndex1" src="gatosadopcion/indexHazteVol.jpg" alt="foto">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 indexHazteVoluntario mt-5 d-flex justify-content-center">
                    <p>Ayúdanos</p>
                </div>
            </div>

            <div class="row d-flex justify-content-md-center">
                <div class="col-md-2"></div>
                <div class="col-md-8 indexHazteVoluntarioParraf mt-md-1">
                    <p class="alturaTextoIndice">Si te gustan los animales y no tienes tiempo para cuidarlos. Hazte sócio!!!!, nos gustaría mucho que
                        colaborases con nosotros realizando una pequeña aportación mensual.
                        <b>Es muy fácil, únicamente debes rellenar un formulario.</b>
                        El dinero recaudado es utilizado para sufragar gastos veterinarios, ya que algunos sufren atropellos u
                        enfermedades y necesitan la ayuda de un veterinario.</p>
                        <h4>Tu aportación importa!!</h4>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-3 cajaBoton mt-md-1 mt-2 d-flex justify-content-center d-flex justify-content-md-start">
                    <a href="hazteVoluntario.php" class="btn btn-primary boton1" role="button">Hazte Sócio</a>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4 d-flex justify-content-center mt-5 d-flex justify-content-md-start">
                    <img class="fotoIndex2" src="gatosadopcion/indexHazteAyu.jpg" alt="foto">
                </div>
                <div class="col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-md-12 indexHazteVoluntario mt-5 d-flex justify-content-center">
                    <p>Hazte casa de acogida</p>
                </div>
            </div>

            <div class="row d-flex justify-content-md-center">
                <div class="col-md-2"></div>
                <div class="col-md-8 indexHazteVoluntarioParraf mt-md-1">
                    <p class="alturaTextoIndice">Acoge en tu casa un gatito mientras encuentra una familia permanente. Escribe a acogeungato@moncada.es
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-12 indexHazteVoluntario mt-5 d-flex justify-content-center">
                    <p>Adopta</p>
                </div>
            </div>

           <div class="row">
               <div class="col-md-2"></div>
                <div class=" col-md-8 indexHazteVoluntarioParraf mt-md-1">
                     <p class="alturaTextoIndice">Estos son los gatos que están esperando ser adoptados.</p>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>


      <div class="container sinPadding d-flex justify-content-md-center">
          <div class="row">

            <div class="col-md-4 col-sm-6 mt-5 mt-sm-3">
                   <div class="card cajaKar cajaGatosIndex">
                       <img class="card-img-top" src="gatosadopcion/01.jpg" alt="01">
                       <div class="card-body">
                           <h4 class="card-title alturaTextoIndice">Pepo</h4>
                           <p class="card-text alturaTextoIndice">Gato de aprox. 1 mes <br> Raza Común </p>
                           <a href="mostrarGatosEnAdopcion.php" class="btn btn-primary stretched-link pl-md-5 pr-md-5 botonCardsGatos">Ver</a>
                       </div>
                   </div>
               </div>

               <div class="col-md-4 col-sm-6 mt-5">
                   <div class="card cajaKar">
                       <img class="card-img-top" src="gatosadopcion/02.jpg" alt="02">
                       <div class="card-body">
                           <h4 class="card-title alturaTextoIndice">Anubis</h4>
                           <p class="card-text alturaTextoIndice">Gata de aprox. 1 año <br> Raza Común</p>
                           <a href="mostrarGatosEnAdopcion.php" class="btn btn-primary stretched-link pl-md-5 pr-md-5 botonCardsGatos">Ver</a>
                       </div>
                   </div>
               </div>

               <div class="col-md-4 col-sm-6 mt-5">
                   <div class="card cajaKar">
                       <img class="card-img-top" src="gatosadopcion/03.jpg" alt="03">
                       <div class="card-body">
                           <h4 class="card-title alturaTextoIndice">Silvestre</h4>
                           <p class="card-text alturaTextoIndice">Gato de aprox. 1 año <br> Raza Común</p>
                           <a href="mostrarGatosEnAdopcion.php" class="btn btn-primary stretched-link pl-md-5 pr-md-5 botonCardsGatos">Ver</a>
                       </div>
                   </div>
               </div>

               <div class="col-md-4 col-sm-6 mt-5">
                   <div class="card cajaKar">
                       <img class="card-img-top cuartaPos" src="gatosadopcion/04.jpg" alt="04">
                       <div class="card-body">
                           <h4 class="card-title alturaTextoIndice">Leo</h4>
                           <p class="card-text alturaTextoIndice">Gato de aprox. 1 año <br> Raza Común</p>
                           <a href="mostrarGatosEnAdopcion.php" class="btn btn-primary stretched-link pl-md-5 pr-md-5 botonCardsGatos">Ver</a>
                       </div>
                   </div>
               </div>

                <div class="col-md-4 col-sm-6 mt-5">
                   <div class="card cajaKar">
                       <img class="card-img-top" src="gatosadopcion/05.jpg" alt="05">
                       <div class="card-body">
                           <h4 class="card-title alturaTextoIndice">Kitty</h4>
                           <p class="card-text alturaTextoIndice">Gato de aprox. 1 año <br> Raza Común</p>
                           <a href="mostrarGatosEnAdopcion.php" class="btn btn-primary stretched-link pl-md-5 pr-md-5 botonCardsGatos">Ver</a>
                       </div>
                   </div>
               </div>

               <div class="col-md-4 col-sm-6 mt-5">
                   <div class="card cajaKar">
                       <img class="card-img-top" src="gatosadopcion/07.jpg" alt="06">
                       <div class="card-body">
                           <h4 class="card-title alturaTextoIndice">Nube</h4>
                           <p class="card-text alturaTextoIndice">Gata de aprox. 1 mes <br> Raza Común</p>
                           <a href="mostrarGatosEnAdopcion.php" class="btn btn-primary stretched-link pl-md-5 pr-md-5 botonCardsGatos">Ver</a>
                       </div>
                   </div>
               </div>
          </div>
      </div>
  </div>
</div>



<?php include("./views/partials/footer.part.php");  ?>