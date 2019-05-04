
<?php require __DIR__."/views/partials/cabecera.part.php";?>

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

    <form action="hazteVoluntario.php" method="post">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-1 offset-sm-1">
                    <label class="textFormularioVoluntario">Nombre <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="usuarioSocio" id="usuarioSocio" placeholder="Nombre" required onclick="cambiarFondoCajaUsuarioSocio()" onblur="cambiarFondoUsuarios(this)">
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto1"></div>
                </div>

                <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

                <div class="col-md-4 col-sm-6 mt-md-3 mt-sm-4 offset-md-2 offset-sm-1">
                    <label class="textFormularioVoluntario">Apellidos <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="fondocaja cajaApellidosSocio colorLineaCaja" type="text" name="apellidoSocio" id="apellidoSocio" placeholder="Apellido1 Apellido2" required onclick="cambiarFondoCajaApellidos()" onblur="cambiarFondoApellidos(this)">
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto2"></div>
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
                        <input class="lineahazteVoluntario fondocaja colorLineaCaja" type="text" name="dniSocio" id="dniSocio" placeholder="00000000-X" required onclick="cambiarFondoDNISocio()" onblur="cambiarFondoDNIs(this)">
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 mt-md-5">
                    <label class="textFormularioVoluntario">&nbsp<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto3"></div>
                </div>

                <div class="w-100 d-none d-sm-block d-md-none mb-sm-2"></div>

                <div class="col-md-4 mt-md-5 mt-sm-4 offset-md-2 offset-sm-1">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="textFormularioVoluntario">Fecha nacimiento <span class="asterisco">*</span></label><br>
                            <div class="input-group">
                                <span class="input-group-addon icono2"><i class="glyphicon glyphicon-calendar"></i></span>
                                <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="diaFecha" id="diaFecha" required onblur="cambiarFondoDia(this)">
                                    <option value="">Día</option>
                                    <?php
                                    for($i=1;$i<=31;$i++):
                                        ?> <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
                                    <?php
                                    endfor;
                                    ?>
                                </select>

                                <select class="lineahazteVoluntarioFechaMes lineaMesSocio colorLineaCaja" name="mesFecha" id="mesFecha" onblur="cambiarFondoMes(this)">
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

                                <select class="lineahazteVoluntarioFecha lineaDiaSocio colorLineaCaja" name="anyoFecha" id="anyoFecha" onblur="cambiarFondoAnyo(this)">
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
                    <div class="input-group" id="visto4"></div>
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
                        <input class="lineahazteVoluntarioDirecion colorLineaCaja" type="text" name="direccionSocio" id="direccionSocio" placeholder="Dirección" required onclick="cambiarFondoDireccionSocio()">
                    </div>
                </div>

                <div class="col-md-4 offset-md-2 offset-sm-1">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-1">
                            <label class="textFormularioVoluntario">Nº<span class="asterisco">*</span></label><br>
                            <input class="linea lineahazteVoluntarioDirec1 colorLineaCaja" type="text" name="numeroSocio" id="numeroSocio" required onclick="cambiarFondoNumeroSocio()">
                        </div>
                        <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-5">
                            <label class="textFormularioVoluntario">Portal</label><br>
                            <input class="linea lineahazteVoluntarioDirec2 colorLineaCaja" type="text" name="portalSocio" id="portalSocio" onclick="cambiarFondoPortalSocio()">
                        </div>
                        <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-5">
                            <label class="textFormularioVoluntario">Piso</label><br>
                            <input class="linea lineahazteVoluntarioDirec3 colorLineaCaja" type="text" name="pisoSocio" id="pisoSocio" onclick="cambiarFondoPisoSocio()">
                        </div>
                        <div class="col-md-2 col-sm-12 mt-sm-4 ml-md-5">
                            <label class="textFormularioVoluntario">Letra</label><br>
                            <input class="linea lineahazteVoluntarioDirec4 colorLineaCaja" type="text" name="letraSocio" id="letraSocio" onclick="cambiarFondoLetraSocio()">
                        </div>
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto5"></div>
                </div>
            </div>
        </div>



        <div class="row justify-content-md-center">
            <div class="col-md-12">

                <div class="col-md-2 mt-md-5 mt-sm-3 offset-md-1">
                    <label class="textFormularioVoluntario">Población<span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteVoluntarioPoblacionSocio fondocaja colorLineaCaja" type="text" name="poblacionSocio" id="poblacionSocio" placeholder="Población" required onclick="cambiarFondoPoblacionSocio()" onblur="cambiarFondoCorreos(this)" >
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto8"></div>
                </div>

                <div class="col-md-2 mt-md-5 offset-sm-1">
                    <label class="textFormularioVoluntario">Código Postal <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteVoluntarioViviendaSocio fondocaja colorLineaCaja" type="text" name="CPSocio" id="CPSocio" placeholder="C.P" required onclick="cambiarFondoCPSocio()" onblur="cambiarFondoTelf1s(this)">
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto8"></div>
                </div>

                <div class="col-md-2 mt-md-5 offset-sm-1 ml-md-1">
                    <label class="textFormularioVoluntario">Provincia <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="lineahazteVoluntarioViviendaSocio fondocaja colorLineaCaja" type="text" name="provinciaSocio" id="provinciaSocio" placeholder="Provincia" required onclick="cambiarFondoProvinciaSocio()" onblur="cambiarFondoTelf2s(this)">
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto8"></div>
                </div>
            </div>
        </div>

        <hr class="lineaH mt-md-5">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 mt-md-4 mt-sm-3 offset-md-1">
                    <label class="textFormularioVoluntario">Mail<span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="lineahazteVoluntarioPoblacionSocio fondocaja colorLineaCaja" type="text" name="correoSocio" id="correoSocio" placeholder="xxxxx@xxx.xxx" required onclick="cambiarFondoCorreoSocio()" onblur="cambiarFondoCorreos(this)" >
                    </div>
                </div>

                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto7"></div>
                </div>
                <div class="col-md-2 mt-md-4 offset-sm-1">
                    <label class="textFormularioVoluntario">Telefono 1 <span class="asterisco">*</span></label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="lineahazteVoluntarioViviendaSocio fondocaja colorLineaCaja" type="text" name="telefono1Socio" id="telefono1Socio" placeholder="Telefono 1" required onclick="cambiarFondoTelf1Socio()" onblur="cambiarFondoTelf1s(this)">
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 mt-md-3">
                    <label class="textFormularioVoluntario">&nbsp;<span class="asterisco"></span></label><br>
                    <div class="input-group" id="visto8"></div>
                </div>
                <div class="col-md-2 mt-md-4 offset-sm-1 ml-md-1">
                    <label class="textFormularioVoluntario">Telefono 2</label><br>
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input class="lineahazteVoluntarioViviendaSocio fondocaja colorLineaCaja" type="text" name="telefono2Socio" id="telefono2Socio" placeholder="Telefono 2" required onclick="cambiarFondoTelf2Socio()" onblur="cambiarFondoTelf2s(this)">
                    </div>
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
                    <input type="radio" name="cantidad" value="5"><b>   5€</b>
                </div>
                <div class="col-md-2 mt-md-4">
                    <input type="radio" name="cantidad" value="10"><b>   10€</b>
                </div>
                <div class="col-md-1 mt-md-4">
                    <input type="radio" name="cantidad" value="15"><b>   15€</b>
                </div>
                <div class="col-md-2 mt-md-4 ml-md-4 ml-md-5">
                    <label class="textFormularioVoluntario">otras cantidades</label>
                </div>

                <div class="col-md-3 mt-md-4">
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-usd"></i></span>
                        <input class="lineaAportarSocio colorLineaCaja" type="text" name="cantidadSocio" id="cantidadSocio" placeholder="Otras cantidades" required onclick="cambiarFondoCantidadesSocio()" onblur="cambiarFondoTelf1s(this)">
                    </div>
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

            <div class="col-md-12 mt-md-4">
                <div class="col-md-2 offset-md-1 mr-md-5">
                    <label class="textFormularioVoluntario">IBAN</label>
                </div>
                <div class="col-md-2 mr-md-1">
                    <label class="textFormularioVoluntario">Banco</label>
                </div>
                <div class="col-md-2 mr-md-1">
                    <label class="textFormularioVoluntario">Oficina</label>
                </div>
                <div class="col-md-2">
                    <label class="textFormularioVoluntario text-center ">DC</label>
                </div>
                <div class="col-md-2 ">
                    <label class="textFormularioVoluntario">Cuenta</label>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-start">
                <div class="col-md-2 offset-md-1 mr-md-5">
                    <div class="input-group">
                        <span class="input-group-addon icono2"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input class="lineaBancoSocioIcono colorLineaCaja" type="text" name="iban" id="direccion" placeholder="IBAN" required onclick="cambiarFondoDireccion(this)">
                    </div>
                </div>

                <div class="col-md-2 mb-md-5">
                    <input class="lineaBancoSocio colorLineaCaja" type="text" name="direccion" id="direccion" placeholder="0000" required onclick="cambiarFondoDireccion(this)">
                </div>

                <div class="col-md-2 mb-md-5">
                    <input class="lineaBancoSocio colorLineaCaja" type="text" name="direccion" id="direccion" placeholder="0000" required onclick="cambiarFondoDireccion(this)">
                </div>

                <div class="col-md-1 mb-md-5">
                    <input class="lineaBancoSocioDC colorLineaCaja" type="text" name="direccion" id="direccion" placeholder="00" required onclick="cambiarFondoDireccion(this)">
                </div>

                <div class="col-md-2 mb-md-5">
                    <input class="lineaBancoSocioCuenta colorLineaCaja" type="text" name="direccion" id="direccion" placeholder="0000000000" required onclick="cambiarFondoDireccion(this)">
                </div>
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mt-md-5 mb-md-5">
                    <button class="btn btn-primary boton1"  type="submit" role="button" id="button1">Enviar</button>
                </div>
            </div>
        </div>

    </form>

</div>

<?php  include("views/partials/footer.part.php");  ?>
<!--<script type="text/javascript" src="jsValidar/validar.js"></script>-->
<script type="text/javascript" src="jsValidar/validarGatosAdopcion.js"></script>





