<?php
session_start();
require_once "Database/Connection.php";
$conexion=Connection::make();

require __DIR__."/views/partials/cabecera.part.php";

$pass1="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST["usuario"])) { $name=strtoupper($_POST["usuario"]);}

    if(isset($_POST["apellido"])) { $apellidos=strtoupper($_POST["apellido"]);}

    if(isset($_POST["dni"])) { $dni=strtoupper($_POST["dni"]);}

    if(isset($_POST["fecha"])) { $date=$_POST["fecha"];}

    if(isset($_POST["zona"])) { $zonaReside=strtoupper($_POST["zona"]);}

    if(isset($_POST["numero"])) { $num=$_POST["numero"];}

    if(isset($_POST["portal"])) { $portal=$_POST["portal"];}

    if(isset($_POST["piso"])) { $piso=$_POST["piso"];}

    if(isset($_POST["letra"])) { $letra=strtoupper($_POST["letra"]);}

    if(isset($_POST["CP"])) { $cp=$_POST["CP"];}

    if(isset($_POST["provincia"])) { $provincia=strtoupper($_POST["provincia"]);}

    if(isset($_POST["correo"])) { $mail=strtoupper($_POST["correo"]);}

    if(isset($_POST["telefono1"])) { $telf1=$_POST["telefono1"];}

    if(isset($_POST["telefono2"])) { $telf2=$_POST["telefono2"];}

    if(isset($_POST["password"])) { $pass1=$_POST["password"];}

    $administrador="SI";
    $voluntario="NO";

    $churropassword=password_hash($pass1, PASSWORD_DEFAULT, ["cost"=>15]);

    $query=$conexion->prepare("
        INSERT INTO voluntariado VALUES (
        :usuario, :apellido, :dni, :fechaNacim, :zona, :numero, :portal, :piso, :letra, 
        :cp, :provincia, :correo, :telefono1, :telefono2, :password, :admin
        )");
    $query->bindParam(':usuario',   $name);
    $query->bindParam(':apellido',  $apellidos);
    $query->bindParam(':dni',       $dni);
    $query->bindParam(':fechaNacim',$date);
    $query->bindParam(':zona',      $zonaReside);
    $query->bindParam(':numero',    $num);
    $query->bindParam(':portal',    $portal);
    $query->bindParam(':piso',      $piso);
    $query->bindParam(':letra',     $letra);
    $query->bindParam(':cp',        $cp);
    $query->bindParam(':provincia', $provincia);
    $query->bindParam(':correo',    $mail);
    $query->bindParam(':telefono1', $telf1);
    $query->bindParam(':telefono2', $telf2);
    $query->bindParam(':password',  $churropassword);
    $query->bindParam(':admin',     $voluntario);  //CAMBIAR ADMINISTRADOR

    $query->execute();
    $_SESSION["dniVoluntario"]=$dni;
    header("Location:mostrarDatosVoluntario.php");
}

?>

<div class="container-fluid sinPadding ">
    <div class="row d-flex justify-content-center">
        <div class="fondoGatoSocio">

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
                             <div class="col-md-4 col-12 mt-md-5 mt-4">
                                 <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                     <input class="lineahazteVoluntarioNombre fondocaja colorLineaCaja" type="text" name="usuario" id="usuarioSocio"
                                     placeholder="Nombre" required onfocus="cambiarFondoSocio(this)" onblur="cambiarFondoUsuariosSocios(this)">
                                 </div>
                             </div>

                            <div class="col-md-4"></div>

                            <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                     <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text"
                                     name="apellido" id="apellidoSocio" placeholder="Apellido1 Apellido2" required onfocus="cambiarFondoSocio(this)"
                                     onblur="cambiarFondoApellidosSocios(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-md-between">
                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                                     <input class="lineahazteVoluntarioDNI fondocaja colorLineaCaja" type="text" name="dni" id="dniSocio"
                                     placeholder="00000000X" required onfocus="cambiarFondoSocio(this)" onblur="cambiarFondoDNIsSocio(this)"
                                     data-mask="00000000S">
                                 </div>
                             </div>

                             <div class="col-md-4"></div>

                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label>
                                 <div class="input-group date anchoFecha" data-provide="datepicker">
                                     <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                     <input class="form-control lineahazteVoluntarioFechaNa colorLineaCaja" type="text"
                                            name="fecha" id="fechaSocio" required onfocus="cambiarFondoSocio(this)"
                                            onblur="cambiarFondoFechassSocio(this)">
                                 </div>
                             </div>
                         </div>

                        <hr class="lineaH mt-5">

                        <div class="row d-flex justify-content-md-between desplazarDcha">
                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Zona donde reside <span class="asterisco">*</span></label>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                     <select class="lineahazteVoluntarioZona linea" name="zona" id="zona" required onchange="cambiarFondoResides(this)">
                                         <option class="textFormularioVoluntario" value="">Zona a Elegir</option>
                                         <option value="Moncada">Moncada</option>
                                         <option value="Barrio">Barrio</option>
                                         <option value="Barrio de los Dolores">Barrio de los Dolores</option>
                                         <option value="Masías">Masías</option>
                                         <option value="San Antonio de Benageber">San Isidro de Benageber</option>
                                     </select>
                                 </div>
                             </div>

                            <div class="col-md-4"></div>

                            <div class="col-md-4 col-12">
                                <div class="row">
                                    <div class="anchoCajas d-flex justify-content-md-between">
                                         <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                             <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                                             <input class="lineahazteVoluntarioDirec1" type="text" name="numero"
                                             id="numeroSocio" required onfocus="cambiarFondoSocio(this)" onblur="cambiarFondoNumerosSocios(this)">
                                         </div>

                                         <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                             <label class="textFormularioVoluntario">Portal</label>
                                             <input class="lineahazteVoluntarioDirec2" type="text" name="portal"
                                                    id="portalSocio" onfocus="cambiarFondoSocio(this)">
                                         </div>

                                         <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                             <label class="textFormularioVoluntario">Piso</label>
                                             <input class="lineahazteVoluntarioDirec3" type="text" name="piso" id="pisoSocio"
                                             onfocus="cambiarFondoSocio(this)">
                                         </div>

                                         <div class="col-3 mt-1 mt-md-5 mt-sm-5 mt-4">
                                             <label class="textFormularioVoluntario">Letra</label>
                                             <input class="lineahazteVoluntarioDirec4" type="text" name="letra" id="letraSocio"
                                             onfocus="cambiarFondoSocio(this)">
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="lineaH mt-5">

                        <div class="row d-flex justify-content-between">

                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                     <input class="lineahazteSocioCP fondocaja colorLineaCaja" type="text" name="CP"
                                            id="CPSocio" placeholder="C.P" required onfocus="cambiarFondoSocio(this)"
                                            onblur="cambiarFondoCPsSocio(this)" data-mask="99999">
                                 </div>
                             </div>

                            <div class="col-md-4"></div>

                            <!--browser-default custom-select-->
                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Provincia<span class="asterisco">*</span></label>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                     <select class="colorLineaCaja lineahazteVoluntarioProvincia" id="provincias"
                                             name="provincia" required >
                                         <option selected disabled value="0">Selecciona tu provincia</option>
                                            <script type="text/javascript">
                                               $(document).ready(function () {
                                                   $.getJSON('data/provincias.json', function (datos) {
                                                       for (index in datos.provincias) {
                                                           $('#provincias').append('<option ' + 'value=' + datos.provincias[index].id + '>'
                                                               + datos.provincias[index].nm + '</option>');
                                                       }
                                                       $('#provincias').val(46);
                                                   });
                                               });
                                            </script>
                                     </select>
                                 </div>
                             </div>
                        </div>

                       <hr class="lineaH mt-5">

                        <div class="row d-flex justify-content-md-between">
                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                                     <input class="mailSocio fondocaja colorLineaCaja" type="text" name="correo"
                                     id="correoSocio" placeholder="xxxxx@xxx.xxx" required onfocus="cambiarFondoSocio(this)"
                                     onblur="cambiarFondoCorreosSocio(this)">
                                 </div>
                             </div>

                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                     <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="telefono1"
                                     id="telefono1Socio" placeholder="Telefono 1" required onfocus="cambiarFondoSocio(this)"
                                     data-mask="000000000">
                                 </div>
                             </div>

                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Telefono 2</label><br>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                     <input class="telf2Socio fondocaja colorLineaCaja" type="text" name="telefono2"
                                     id="telefono2Socio" placeholder="Telefono 2" onfocus="cambiarFondoSocio(this)"
                                     data-mask="000000000">
                                 </div>
                             </div>
                        </div>

                        <hr class="lineaH mt-md-5">

                         <div class="row d-flex justify-content-md-between">

                             <div class="col-md-4 col-12 mt-md-3 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Contraseña <span class="asterisco">*</span></label><br>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                     <input class="passwordSocio1 fondocaja colorLineaCaja" type="password" name="password"
                                     id="passwordSocio" placeholder="Contraseña" required onfocus="cambiarFondoSocio(this)"
                                     onblur="cambiarFondoCajaSociosPassword()">
                                 </div>
                             </div>

                             <div class="col-md-3"></div>

                             <div class="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4">
                                 <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                                 <div class="input-group">
                                     <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                     <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name="password2"
                                     id="password2Socio" placeholder="contraseña" required
                                     onfocus="cambiarFondoSocio(this)" onblur="comprobarPassword()">
                                 </div>
                             </div>

                             <div class="vistoPassword" id="visto1"></div>
                         </div>

                         <div class="row justify-content-md-center mt-md-4">
                             <div class="mt-md-5 mb-md-5">
                                 <button class="btn btn-primary boton1" type="submit" role="button" id="button1" style="visibility: hidden">Enviar</button>
                             </div>

                             <div class="offset-md-2 mt-md-5 mb-md-5">
                                 <a href="coloniasGatos.php" class="btn btn-primary boton1" id="boton2" style="visibility: hidden" role="button">Siguiente </a>
                             </div>
                         </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
include("views/partials/footer.part.php");
?>
<script type="text/javascript" src="jsValidar/validarDatosSocioVoluntario.js"></script>

