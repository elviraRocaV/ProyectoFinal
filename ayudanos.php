<?php
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


if($_SERVER['REQUEST_METHOD']!=="GET")
{
    if(isset($_POST["usuarioSocio"]))
    {
        $nom=$_POST["usuarioSocio"];
    }

    if(isset($_POST["apellidoSocio"]))
    {
        $apellidos=$_POST["apellidoSocio"];
    }

    if(isset($_POST["dniSocio"]))
    {
        $dni=$_POST["dniSocio"];
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
        $direccion=$_POST["direccionSocio"];
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
        $letra=$_POST["letraSocio"];
    }

    if(isset($_POST["poblacionSocio"]))
    {
        $poblacion=$_POST["poblacionSocio"];
    }

    if(isset($_POST["CPSocio"]))
    {
        $codPost=$_POST["CPSocio"];
    }

    if(isset($_POST["provinciaSocio"]))
    {
        $provincia=$_POST["provinciaSocio"];
    }

    if(isset($_POST["correoSocio"]))
    {
        $mail=$_POST["correoSocio"];
    }

    if(isset($_POST["telefono1Socio"]))
    {
        $telf1=$_POST["telefono1Socio"];
    }

    if(isset($_POST["telefono2Socio"]))
    {
        $telf2=$_POST["telefono2Socio"];
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
}

/*$stmt = $dbh->prepare("insert into usuarios (usuarioSocio, apellidoSocio, dniSocio, diaFecha, mesFecha, anyoFecha, direccionSocio, numeroSocio, portalSocio, pisoSocio, letraSocio, poblacionSocio, CPSocio, provinciaSocio, correoSocio, telefono1Socio, telefono2Socio, cantidad, ibaSocio, bancoSocio, oficinaSocio, DCSocio, cuentaSocio)
 values(:usuarioSocio, :apellidoSocio, :dniSocio, :diaFecha, :mesFecha, :anyoFecha, :direccionSocio, :numeroSocio, :portalSocio, :pisoSocio, :letraSocio, :poblacionSocio, :CPSocio, :provinciaSocio, :correoSocio, :telefono1Socio, :telefono2Socio, :cantidad, :ibaSocio, :bancoSocio, :oficinaSocio, :DCSocio, :cuentaSocio)");
$stmt->execute([":usuarioSocio"=>$nom ,":apellidoSocio"=>$apellidos ,":dniSocio"=>$dni ,":diaFecha"=>$diaNacimiento ,":mesFecha"=>$mesNacimiento ,":anyoFecha"=>$anyNacimiento ,":direccionSocio"=>$direccion, ":numeroSocio"=>$num ,":portalSocio"=>$portal ,":pisoSocio"=>$piso ,":letraSocio"=>$letra ,":poblacionSocio"=>$poblacion ,":CPSocio"=>$codPost ,":provinciaSocio"=>$provincia ,":correoSocio"=>$mail ,":telefono1Socio"=>$telf1 ,":telefono2Socio"=>$telf2 ,":cantidad"=>$aportacion ,":ibaSocio"=>$iban ,":bancoSocio"=>$banco ,":oficinaSocio"=>$oficina ,":DCSocio"=>$dc ,":cuentaSocio"=>$cuenta]);*/
?>



        <div class="container-fluid">
            <div class="row mt-3 mb-md-5">
                <div class="col-md-12 text-md-center acceso">
                    <h2>Hazte Socio</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="subtitle">Datos Personales</p>
                </div>
            </div>

            <form action="ayudanos.php" method="post">

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-1 offset-sm-1">
                            <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="usuarioSocio" id="usuarioSocio" placeholder="Nombre" required onclick="cambiarFondoCajaUsuarioSocio()" onblur="cambiarFondoUsuariosSocios(this)">
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-3">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto11"></div>
                        </div>

                        <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

                        <div class="col-md-4 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 offset-sm-1">
                            <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="fondocaja cajaApellidosSocio colorLineaCaja" type="text" name="apellidoSocio" id="apellidoSocio" placeholder="Apellido1 Apellido2" required onclick="cambiarFondoCajaApellidos()" onblur="cambiarFondoApellidosSocios(this)">
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-3">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto12"></div>
                        </div>
                    </div>
                </div>

                <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-3 col-sm-6 mt-md-5 mt-sm-4 offset-md-1 offset-sm-1">
                            <label class="textFormularioVoluntario">DNI <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="dniSocio" id="dniSocio" placeholder="00000000-X" required onclick="cambiarFondoDNISocio()" onblur="cambiarFondoDNIsSocio(this)">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1 mt-md-5">
                            <label class="textFormularioVoluntario">&nbsp<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto13"></div>
                        </div>

                        <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

                        <div class="col-md-4 mt-md-5 mt-sm-4 offset-md-2 offset-sm-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                                    <div class="input-group">
                                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                                        <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="diaFecha" id="diaFecha" required onblur="cambiarFondoDiaSocio(this)">
                                            <option value="">Día</option>
                                            <?php
                                            for($i=1;$i<=31;$i++):
                                                ?> <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
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

                        <div class="col-md-1 col-sm-1 mt-md-5">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto14"></div>
                        </div>
                    </div>
                </div>

                <hr class="lineaH mt-md-5">


                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 mt-md-4 offset-md-1 offset-sm-1">
                            <label class="textFormularioVoluntario">Dirección <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="direccionSocio" id="direccionSocio" placeholder="Dirección" required onclick="cambiarFondoDireccionSocio()" onblur="cambiarFondoDireccionesSocio(this)">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1 mt-md-4">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto15"></div>
                        </div>

                        <div class="col-md-4 offset-md-1 offset-sm-1">
                            <div class="row">
                                <div class="col-md-2 col-sm-12 mt-sm-4 mr-md-5 mt-md-4">
                                    <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                                    <input class="linea lineahazteVoluntarioDirec1 colorLineaCaja" type="text" name="numeroSocio" id="numeroSocio" required onclick="cambiarFondoNumeroSocio()" onblur="cambiarFondoNumerosSocios(this)">
                                </div>
                                <div class="col-md-2 col-sm-12 mt-sm-5 mr-md-5 mt-md-4 mt-5">
                                    <label class="textFormularioVoluntario">Portal</label><br>
                                    <input class="linea lineahazteVoluntarioDirec2 colorLineaCaja" type="text" name="portalSocio" id="portalSocio" onclick="cambiarFondoPortalSocio()">
                                </div>
                                <div class="col-md-2 col-sm-12 mt-sm-5 mr-md-5 mt-md-4 mt-5">
                                    <label class="textFormularioVoluntario">Piso</label><br>
                                    <input class="linea lineahazteVoluntarioDirec3 colorLineaCaja" type="text" name="pisoSocio" id="pisoSocio" onclick="cambiarFondoPisoSocio()">
                                </div>
                                <div class="col-md-2 col-sm-12 mt-sm-5 mr-md-5 mt-md-4 mt-5">
                                    <label class="textFormularioVoluntario">Letra</label><br>
                                    <input class="linea lineahazteVoluntarioDirec4 colorLineaCaja" type="text" name="letraSocio" id="letraSocio" onclick="cambiarFondoLetraSocio()">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-4">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto16"></div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-md-center">
                    <div class="col-md-12">

                        <div class="col-md-3 mt-md-5 mt-sm-3 offset-md-1 offset-sm-1">
                            <label class="textFormularioVoluntario">Población<span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntario  lineahazteVoluntarioPoblacion fondocaja colorLineaCaja" type="text" name="poblacionSocio" id="poblacionSocio" placeholder="Población" required onclick="cambiarFondoPoblacionSocio()" onblur="cambiarFondoPoblacionsSocio(this)" >
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-5">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto17"></div>
                        </div>

                        <div class="col-md-2 mt-md-5 offset-sm-1 ml-md-1">
                            <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label><br>
                            <div class="input-group ">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioViviendaSocio lineahazteVoluntarioPoblacion fondocaja colorLineaCaja" type="text" name="CPSocio" id="CPSocio" placeholder="C.P" required onclick="cambiarFondoCPSocio()" onblur="cambiarFondoCPsSocio(this)">
                            </div>
                        </div>

                        <div class="col-md-2 mt-md-5 offset-sm-1 mt-sm-5 mt-5">
                            <label class="textFormularioVoluntario">Provincia <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="lineahazteVoluntarioViviendaSocio lineahazteVoluntarioPoblacion fondocaja colorLineaCaja" type="text" name="provinciaSocio" id="provinciaSocio" placeholder="Provincia" required onclick="cambiarFondoProvinciaSocio()" onblur="cambiarFondoProvinciasSocio(this)">
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-5 pl-md-3 bordeRojo">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto18"></div>
                        </div>
                    </div>
                </div>

                <hr class="lineaH mt-md-5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3 mt-md-4 mt-sm-3 offset-md-1 offset-sm-1">
                            <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="lineahazteVoluntario lineahazteVoluntarioPoblacion fondocaja colorLineaCaja" type="text" name="correoSocio" id="correoSocio" placeholder="xxxxx@xxx.xxx" required onclick="cambiarFondoCorreoSocio()" onblur="cambiarFondoCorreosSocio(this)" >
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-4">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto19"></div>
                        </div>
                        <div class="col-md-2 mt-md-4 offset-sm-1 ml-md-1">
                            <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="lineahazteVoluntarioViviendaSocio lineahazteVoluntarioPoblacion fondocaja colorLineaCaja" type="text" name="telefono1Socio" id="telefono1Socio" placeholder="Telefono 1" required onclick="cambiarFondoTelf1Socio()" onblur="cambiarFondoTelf1sSocio(this)">
                            </div>
                        </div>

                        <div class="col-md-2 mt-md-4 offset-sm-1 mt-sm-5 mt-5">
                            <label class="textFormularioVoluntario">Telefono 2</label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="lineahazteVoluntarioViviendaSocio lineahazteVoluntarioPoblacion fondocaja colorLineaCaja" type="text" name="telefono2Socio" id="telefono2Socio" placeholder="Telefono 2" onclick="cambiarFondoTelf2Socio()" onblur="cambiarFondoTelf2sSocio(this)">
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-1 mt-md-3">
                            <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                            <div class="input-group" id="visto20"></div>
                        </div>

                    </div>
                </div>

                <hr class="lineaH mt-md-5">

                <div class="row">
                    <div class="col-md-12">
                        <p class="subtitle">Cantidad a aportar</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2 offset-md-1 mt-md-4">
                            <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value=""><b>   5€</b></label>
                        </div>
                        <div class="col-md-2 mt-md-4">
                           <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value="1"><b>   10€</b></label>
                        </div>
                        <div class="col-md-1 mt-md-4">
                            <label><input type="radio" class="circulo" name="cantidad" id="cantidad" value=""><b>   15€</b></label>
                        </div>
                        <div class="col-md-2 mt-md-4 ml-md-4 ml-md-5">
                            <label class="textFormularioVoluntario">otras cantidades</label>
                        </div>

                        <div class="col-md-3 mt-md-4 offset-sm-1">
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-usd"></i></span>
                                <input class="lineaAportarSocio lineahazteVoluntarioPoblacion colorLineaCaja circulo" type="text" name="cantidad" id="cantidad" placeholder="Otras cantidades" onclick="cambiarFondoCantidadesSocio()" onblur="cambiarFondoCantidadessSocio(this)">                      </div>
                        </div>
                    </div>
                </div>

                <hr class="lineaH mt-md-5">

                <div class="row">
                    <div class="col-md-12">
                        <p class="subtitle">Cuenta Bancaria</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-2 mt-md-4 mt-sm-4 offset-md-1 offset-sm-1 mt-4">
                        <label class="textFormularioVoluntario col-sm-12">IBAN 3 dig</label>
                        <div class="input-group">
                            <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input class="lineaBancoSocioIcono colorLineaCaja lineahazteVoluntarioCuenta" type="text" name="ibaSocio" id="ibaSocio" placeholder="000" required onclick="cambiarFondoIBANSocio()" onblur="cambiarFondoIBANsSocio(this)">
                        </div>
                    </div>

                    <div class="col-md-2 mt-md-4 mt-sm-4 offset-sm-1 mt-4">
                        <label class="textFormularioVoluntario col-sm-12">Banco 4 dig</label>
                        <input class="lineaBancoSocio colorLineaCaja lineahazteVoluntarioCuenta2" type="text" name="bancoSocio" id="bancoSocio" placeholder="0000" required onclick="cambiarFondoBancoSocio()" onblur="cambiarFondoBancosSocio(this)">
                    </div>

                    <div class="col-md-2 mt-md-4 mt-sm-4 offset-sm-1 mt-4">
                        <label class="textFormularioVoluntario col-sm-12">Oficina 4 dig</label>
                        <input class="lineaBancoSocio colorLineaCaja lineahazteVoluntarioCuenta2" type="text" name="oficinaSocio" id="oficinaSocio" placeholder="0000" required onclick="cambiarFondoOficinaSocio()" onblur="cambiarFondoOficinasSocio(this)">
                    </div>

                    <div class="col-md-2 mt-md-4 mt-sm-4 offset-sm-1 mt-4">
                        <label class="textFormularioVoluntario text-sm-left col-sm-12">DC 2 dig</label>
                        <input class="lineaBancoSocio colorLineaCaja lineahazteVoluntarioCuenta2" type="text" name="oficinaSocio" id="oficinaSocio" placeholder="00" required onclick="cambiarFondoOficinaSocio()" onblur="cambiarFondoOficinasSocio(this)">
                    </div>

                    <div class="col-md-2 mt-md-4 mt-sm-4 offset-sm-1 mt-4">
                        <label class="textFormularioVoluntario col-sm-12">Cuenta 10 dig</label>
                        <input class="lineaBancoSocioCuenta colorLineaCaja lineahazteVoluntarioCuenta2" type="text" name="cuentaSocio" id="cuentaSocio" placeholder="0000000000" required onclick="cambiarFondocuentaSocio()" onblur="cambiarFondocuentasSocio(this)">
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="mt-md-5 mb-md-5 mt-sm-5 mb-sm-5 mt-5 mb-5">
                            <button class="btn btn-primary boton1"  type="submit" role="button" id="button1">Enviar</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>




<?php  include("views/partials/footer.part.php");  ?>
<!--<script type="text/javascript" src="jsValidar/validar.js"></script>-->
<script type="text/javascript" src="jsValidar/validarGatosAdopcion.js"></script>





