<?php session_start();

require __DIR__."/views/partials/cabecera.part.php";
require_once "Database/Connection.php";
$dbh = Connection::make();

$nom="";
$apellidos="";
$dni="";
$diaNacimiento="";
$mesNacimiento="";
$anyNacimiento="";
$fechaNacimiento="";
$direccion="";
$num="";
$portal="";
$piso="";
$letra="";
$poblacion="";
$codPost="";
$provincia="";
$mail="";
$telf1="";
$telf2="";
$aportacion="";
$iban="";
$banco="";
$oficina="";
$dc="";
$cuenta="";
$churropassword="";
$passwordSocio="";


if($_SERVER['REQUEST_METHOD']!=="GET")
{
    if(isset($_POST["usuarioSocio"]))
    {
        $nom=strtoupper($_POST["usuarioSocio"]);
    }

    if(isset($_POST["apellidoSocio"]))
    {
        $apellidos=strtoupper($_POST["apellidoSocio"]);
    }

    if(isset($_POST["dniSocio"]))
    {
        $dni=strtoupper($_POST["dniSocio"]);
    }

    if(isset($_POST["diaFecha"]))
    {
        $diaNacimiento=$_POST["diaFecha"];
    }

    if(isset($_POST["mesFecha"]))
    {
        $mesNacimiento=$_POST["mesFecha"];
    }

    if(isset($_POST["anyoFecha"]))
    {
        $anyNacimiento=$_POST["anyoFecha"];
    }

    if(isset($_POST["direccionSocio"]))
    {
        $direccion=strtoupper($_POST["direccionSocio"]);
    }

    if(isset($_POST["numeroSocio"]))
    {
        $num=$_POST["numeroSocio"];
    }

    if(isset($_POST["portalSocio"]))
    {
        $portal=$_POST["portalSocio"];
    }

    if(isset($_POST["pisoSocio"]))
    {
        $piso=$_POST["pisoSocio"];
    }

    if(isset($_POST["letraSocio"]))
    {
        $letra=strtoupper($_POST["letraSocio"]);
    }

    if(isset($_POST["poblacionSocio"]))
    {
        $poblacion=strtoupper($_POST["poblacionSocio"]);
    }

    if(isset($_POST["CPSocio"]))
    {
        $codPost=$_POST["CPSocio"];
    }

    if(isset($_POST["provinciaSocio"]))
    {
        $provincia=strtoupper($_POST["provinciaSocio"]);
    }

    if(isset($_POST["correoSocio"]))
    {
        $mail=strtoupper($_POST["correoSocio"]);
    }

    if(isset($_POST["telefono1Socio"]))
    {
        $telf1=$_POST["telefono1Socio"];
    }

    if(isset($_POST["telefono2Socio"]))
    {
        $telf2=$_POST["telefono2Socio"];
    }

    if(isset($_POST["passwordSocio"]))
    {
        $passwordSocio=strtoupper($_POST["passwordSocio"]);
    }

    if(isset($_POST["cantidad"]))
    {
        $aportacion=$_POST["cantidad"];
    }

    if(isset($_POST["ibaSocio"]))
    {
        $iban=$_POST["ibaSocio"];
    }

    if(isset($_POST["bancoSocio"]))
    {
        $banco=$_POST["bancoSocio"];
    }

    if(isset($_POST["oficinaSocio"]))
    {
        $oficina=$_POST["oficinaSocio"];
    }

    if(isset($_POST["DCSocio"]))
    {
        $dc=$_POST["DCSocio"];
    }

    if(isset($_POST["cuentaSocio"]))
    {
        $cuenta=$_POST["cuentaSocio"];
    }

    $churropassword=password_hash($passwordSocio, PASSWORD_DEFAULT, ["cost"=>15]);

$stmt = $dbh->prepare("INSERT INTO socios (usuarioSocio, apellidoSocio, dniSocio, diaFecha, mesFecha, anyoFecha, direccionSocio, numeroSocio, portalSocio, pisoSocio, letraSocio, poblacionSocio, CPSocio, provinciaSocio, correoSocio, telefono1Socio, telefono2Socio, passwordSocio, cantidad, ibaSocio, bancoSocio, oficinaSocio, DCSocio, cuentaSocio)
 values(:usuarioSocio, :apellidoSocio, :dniSocio, :diaFecha, :mesFecha, :anyoFecha, :direccionSocio, :numeroSocio, :portalSocio, :pisoSocio, :letraSocio, :poblacionSocio, :CPSocio, :provinciaSocio, :correoSocio, :telefono1Socio, :telefono2Socio, :contrasenya, :cantidad, :ibaSocio, :bancoSocio, :oficinaSocio, :DCSocio, :cuentaSocio)");
$stmt->execute([":usuarioSocio"=>$nom ,":apellidoSocio"=>$apellidos ,":dniSocio"=>$dni ,":diaFecha"=>$diaNacimiento ,":mesFecha"=>$mesNacimiento ,":anyoFecha"=>$anyNacimiento ,":direccionSocio"=>$direccion, ":numeroSocio"=>$num ,":portalSocio"=>$portal ,":pisoSocio"=>$piso ,":letraSocio"=>$letra ,":poblacionSocio"=>$poblacion ,":CPSocio"=>$codPost ,":provinciaSocio"=>$provincia ,":correoSocio"=>$mail ,":telefono1Socio"=>$telf1 ,":telefono2Socio"=>$telf2 , ":contrasenya"=>$churropassword,":cantidad"=>$aportacion ,":ibaSocio"=>$iban ,":bancoSocio"=>$banco ,":oficinaSocio"=>$oficina ,":DCSocio"=>$dc ,":cuentaSocio"=>$cuenta]);


    /*$stmt=$dbh->prepare("select dniSocio from socio where UsuarioSocio='$nom' && apellidoSocio=$apellidos && dniSocio='$dni' && diaFecha=$diaNacimiento");
        $stmt->execute();
        $dniSocio=$stmt->fetch(PDO::FETCH_NUM);*/

        $_SESSION["dniSocio"]="".$dni;

        header("Location:hojaSocio.php");

        echo "El archivo ha sido cargado correctamente";
}

?>


<div class="container sinPadding">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-md-2">
            <p class="subtitulo">Hazte Socio</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3 col-12 d-flex justify-content-center">
            <p class="subtitle">Datos Personales</p>
        </div>
        <div class="col-md-8"></div>
    </div>

    <form action="ayudanos.php" method="post">

        <div class="row">
            <div class="col-md-3 mt-md-5 mt-4 offset-md-1 offset-1">
                <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="usuarioSocio" id="usuarioSocio" placeholder="Nombre" required onclick="cambiarFondoCajaUsuarioSocio()" onblur="cambiarFondoUsuariosSocios(this)">
                </div>
            </div>


            <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-3 offset-1">
                <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja" type="text" name="apellidoSocio" id="apellidoSocio" placeholder="Apellido1 Apellido2" required onclick="cambiarFondoCajaApellidos()" onblur="cambiarFondoApellidosSocios(this)">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-1 offset-1">
                <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="dniSocio" id="dniSocio" placeholder="00000000-X" required onclick="cambiarFondoDNISocio()" onblur="cambiarFondoDNIsSocio(this)">
                </div>
            </div>

            <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-3 offset-1">
                <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                    <div class="alinearDiaMesAnyo">
                        <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="diaFecha" id="diaFecha" required onblur="cambiarFondoDiaSocio(this)">
                            <option value="">Día</option>
                            <?php
                            for($i=1;$i<=31;$i++):
                                ?>
                                <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
                            <?php
                            endfor;
                            ?>
                        </select>

                        <select class="lineahazteVoluntarioFechaMes lineaMesSocio colorLineaCaja" name="mesFecha" id="mesFecha" required onblur="cambiarFondoMesSocio(this)">
                            <option value="">Mes</option>
                            <option value="Enero">Enero</option>
                            <option value="Febrero">Febrero</option>
                            <option value="Marzo">Marzo</option>
                            <option value="Abril">Abril</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Junio">Junio</option>
                            <option value="Julio">Julio</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Septiembre">Septiembre</option>
                            <option value="Octubre">Octubre</option>
                            <option value="Noviembre">Noviembre</option>
                            <option value="Diciembre">Diciembre</option>
                        </select>

                        <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="anyoFecha" id="anyoFecha" required onblur="cambiarFondoAnyoSocio(this)">
                            <option value="">Año</option>
                            <?php
                            $anyoActual=date("Y",time());
                            $anyoMin=$anyoActual-18;

                            for($j=$anyoMin;$j>=diaAnyo;$j--):

                                ?> <option value="<?php echo $j ?> "> <?php echo $j ?> </option>
                            <?php
                            endfor;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-5">


        <div class="row">
            <div class="col-md-3 col-12 mt-md-5 mt-3 offset-md-1 offset-1">
                <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                <div class="input-group">
                    <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="direccionSocio" id="direccionSocio" placeholder="Dirección" required onclick="cambiarFondoDireccionSocio()" onblur="cambiarFondoDireccionesSocio(this)">
                </div>
            </div>

            <div class="col-md-3 offset-sm-1 offset-md-2">
                <div class="row">
                    <div class="alinearCajasDireccionSocio offset-1 offset-md-2 offset-sm-0 d-flex justify-content-md-between">

                        <div class="col-md-2 mt-1 col-sm-12 mt-md-5 mt-5 desplazarDerecha">
                            <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                            <input class="lineahazteVoluntarioDirec1" type="text" name="numeroSocio" id="numeroSocio" required onclick="cambiarFondoNumeroSocio()" onblur="cambiarFondoNumerosSocios(this)">
                        </div>

                        <div class="col-md-2 col-sm-12 mt-1 desplazarDerecha mt-md-5 mt-5">
                            <label class="textFormularioVoluntario">Portal</label><br>
                            <input class="lineahazteVoluntarioDirec2" type="text" name="portalSocio" id="portalSocio" onclick="cambiarFondoPortalSocio()">
                        </div>

                        <div class="col-md-2 col-sm-12 mt-1 desplazarDerecha mt-md-5 mt-5">
                            <label class="textFormularioVoluntario">Piso</label><br>
                            <input class="lineahazteVoluntarioDirec3" type="text" name="pisoSocio" id="pisoSocio" onclick="cambiarFondoPisoSocio()">
                        </div>

                        <div class="col-md-2 col-sm-12 mt-1 desplazarDerecha mt-md-5 mt-5">
                            <label class="textFormularioVoluntario">Letra</label><br>
                            <input class="lineahazteVoluntarioDirec4" type="text" name="letraSocio" id="letraSocio" onclick="cambiarFondoLetraSocio()">
                        </div>

                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="centrarDatosSocio">
                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 offset-md-1 mr-md-5">
                    <label class="textFormularioVoluntario">Población<span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineaPoblacionSocio fondocaja colorLineaCaja " type="text" name="poblacionSocio" id="poblacionSocio" placeholder="Población" required onclick="cambiarFondoPoblacionSocio()" onblur="cambiarFondoPoblacionsSocio(this)" >
                    </div>
                </div>

                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 offset-md-1">
                    <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label><br>
                    <div class="input-group ">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteSocioCP fondocaja colorLineaCaja" type="text" name="CPSocio" id="CPSocio" placeholder="C.P" required onclick="cambiarFondoCPSocio()" onblur="cambiarFondoCPsSocio(this)">
                    </div>
                </div>

                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 mt-4 offset-md-1">
                    <label class="textFormularioVoluntario">Provincia <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteSocioProv fondocaja colorLineaCaja" type="text" name="provinciaSocio" id="provinciaSocio" placeholder="Provincia" required onclick="cambiarFondoProvinciaSocio()" onblur="cambiarFondoProvinciasSocio(this)">
                    </div>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-5">

        <div class="row">
            <div class="centrarDatosSocio">
                <div class="col-md-3 col-12 mt-md-5 mt-4 offset-md-1 offset-2 mr-md-5">
                    <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="mailSocio fondocaja colorLineaCaja" type="text" name="correoSocio" id="correoSocio" placeholder="xxxxx@xxx.xxx" required onclick="cambiarFondoCorreoSocio()" onblur="cambiarFondoCorreosSocio(this)" >
                    </div>
                </div>

                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 offset-md-1 mr-md-2">
                    <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="telf1Socio fondocaja colorLineaCaja" type="text" name="telefono1Socio" id="telefono1Socio" placeholder="Telefono 1" required onclick="cambiarFondoTelf1Socio()" onblur="cambiarFondoTelf1sSocio(this)">
                    </div>
                </div>

                <div class="col-md-3 col-12 mt-md-5 mt-5 offset-2 offset-md-1">
                    <label class="textFormularioVoluntario">Telefono 2</label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="telf2Socio fondocaja colorLineaCaja" type="text" name="telefono2Socio" id="telefono2Socio" placeholder="Telefono 2" onclick="cambiarFondoTelf2Socio()" onblur="cambiarFondoTelf2sSocio(this)">
                    </div>
              </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="centrarCajaPassword">
                <div class="col-md-12">
                    <div class="col-md-3 col-12 mt-md-3 mt-md-5 mt-4 offset-2 desplazarPassord1">
                        <label class="textFormularioVoluntario">Contraseña <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="passwordSocio1 fondocaja colorLineaCaja" type="password" name="passwordSocio" id="passwordSocio" placeholder="Contraseña" required onclick="cambiarFondoCajaSocioPassword()" onblur="cambiarFondoCajaSociosPassword()">
                        </div>
                    </div>

                    <div class="col-md-3 col-12 mt-md-5 mt-5 offset-md-3 offset-2 desplazarPassord2">
                        <label class="textFormularioVoluntario">Introduce contaseña <span class="asterisco">*</span></label><br>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="passwordSocio2 fondocaja colorLineaCaja" type="password" name="password2Socio" id="password2Socio" placeholder="contraseña" required onclick="cambiarFondoCajaSocioPassword2()" onblur="cambiarFondoCajaSociosPassword2()">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">


            <div class="row">
                <div class="col-md-12 col-12 d-flex justify-content-center">
                    <p class="subtitle">Cantidad a aportar</p>
                </div>
            </div>

            <div class="row">
                <div class="dineroAportar">
                    <div class="enLinea offset-2 d-flex">
                        <div class="col-md-2 col-12 mt-4 offset-1">
                            <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value=""><b>   5€</b></label>
                        </div>
                        <div class="col-md-2 mt-4 col-12 offset-1">
                           <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value="1"><b>   10€</b></label>
                        </div>
                        <div class="col-md-2 mt-4 col-12 offset-1">
                            <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value=""><b>   15€</b></label>
                        </div>
                    </div>

                    <div class="col-md-5 col-12 mt-4 enlineaCajaAportar offset-2">
                        <div>
                            <label class="textFormularioVoluntario">otras cantidades</label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-usd"></i></span>
                            <input class="lineaAportarSocio colorLineaCaja circulo" type="text" name="cantidad" id="cantidadTexto" placeholder="Otras cantidades" onclick="cambiarFondoCantidadesSocio()" onblur="cambiarFondoCantidadessSocio(this)">
                        </div>
                    </div>
                </div>
            </div>

        <hr class="lineaH mt-md-5">

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p class="subtitle">Cuenta Bancaria</p>
                </div>
            </div>

            <div class="row">
                <div class="cajaCuentaBancaria">
                    <div class="col-12 col-md-2 offset-md-1 offset-2 mt-5 ml-md-5 desplazarCuenta">
                        <label class="textFormularioVoluntario textoBanco">IBAN</label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="ibaSocio" id="ibaSocio" placeholder="000" required onclick="cambiarFondoIBANSocio()" onblur="cambiarFondoIBANsSocio(this)">
                        </div>
                    </div>

                    <div class="col-12 col-md-2 mt-5 ml-md-5 offset-2 desplazarCuenta">
                        <label class="textFormularioVoluntario textoBanco">Banco 4 dig</label>
                        <input class="colorLineaCaja lineahazteSocioCuenta2" type="text" name="bancoSocio" id="bancoSocio" placeholder="0000" required onclick="cambiarFondoBancoSocio()" onblur="cambiarFondoBancosSocio(this)">
                    </div>

                    <div class="col-12 col-md-2 mt-5 ml-md-5 offset-2 desplazarCuenta">
                        <label class="textFormularioVoluntario textoBanco">Oficina 4 dig</label>
                        <input class="colorLineaCaja lineahazteSocioCuenta2" type="text" name="oficinaSocio" id="oficinaSocio" placeholder="0000" required onclick="cambiarFondoOficinaSocio()" onblur="cambiarFondoOficinasSocio(this)">
                    </div>

                    <div class="col-12 col-md-2 mt-5 ml-md-5 offset-2 desplazarCuenta">
                        <label class="textFormularioVoluntario text-sm-left  textoBanco">DC 2dig</label>
                        <input class="colorLineaCaja lineahazteSocioCuenta" type="text" name="DCSocio" id="DCSocio" placeholder="00" required onclick="cambiarFondoOficinaSocio()" onblur="cambiarFondoDCsSocio(this)">
                    </div>

                    <div class="col-12 col-md-2 mt-5 ml-md-5 offset-2 desplazarCuenta">
                        <label class="textFormularioVoluntario textoBanco">Cuenta 10 dig</label>
                        <input class="colorLineaCaja lineahazteSocioCuenta2" type="text" name="cuentaSocio" id="cuentaSocio" placeholder="0000000000" required onclick="cambiarFondocuentaSocio()" onblur="cambiarFondocuentasSocio(this)">
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="mt-md-5 mb-md-5 mt-sm-5 mb-sm-5 mt-5 mb-5 offset-2 offset-sm-1">
                        <button class="btn btn-primary boton1"  type="submit" role="button" id="button1">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
</div>



<?php  include("views/partials/footer.part.php");  ?>
<!--<script type="text/javascript" src="jsValidar/validar.js"></script>-->
<script type="text/javascript" src="jsValidar/validarGatosAdopcion.js"></script>





