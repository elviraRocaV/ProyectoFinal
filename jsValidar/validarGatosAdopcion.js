/*------------------------------  gatosAdopcion ----------------------------*/


function cambiarFondoNombreGato()
{
    document.getElementById("nombreGato").style.backgroundColor="#d1d1c6";
}

function cambiarFondoDescripGato()
{
    document.getElementById("descripcionGato").style.backgroundColor="#d1d1c6";
}


/*------------------------------  SOCIOS ----------------------------*/

/*--------   funcion onclick ----------------------*/

function  cambiarFondoCajaUsuarioSocio()
{
    document.getElementById("usuarioSocio").style.backgroundColor="#d1d1c6";
}


function  cambiarFondoCajaApellidos()
{
    document.getElementById("apellidoSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoCajaApellidos()
{
    document.getElementById("apellidoSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoDNISocio()
{
    document.getElementById("dniSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoDireccionSocio()
{
    document.getElementById("direccionSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoNumeroSocio()
{
    document.getElementById("numeroSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoPortalSocio()
{
    document.getElementById("portalSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoPisoSocio()
{
    document.getElementById("pisoSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoLetraSocio()
{
    document.getElementById("letraSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoPoblacionSocio()
{
    document.getElementById("poblacionSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoCPSocio()
{
    document.getElementById("CPSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoProvinciaSocio()
{
    document.getElementById("provinciaSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoCorreoSocio()
{
    document.getElementById("correoSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoTelf1Socio()
{
    document.getElementById("telefono1Socio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoTelf2Socio()
{
    document.getElementById("telefono2Socio").style.backgroundColor="#d1d1c6";
}

function cambiarFondoCajaSocioPassword()
{
    document.getElementById("passwordSocio").style.backgroundColor="#d1d1c6";
}

function cambiarFondoCajaSocioPassword2()
{
    document.getElementById("password2Socio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoCantidadesSocio()
{
    document.getElementById("cantidadSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoIBANSocio()
{
    document.getElementById("ibaSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoBancoSocio()
{
    document.getElementById("bancoSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoOficinaSocio()
{
    document.getElementById("oficinaSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoDCSocio()
{
    document.getElementById("DCSocio").style.backgroundColor="#d1d1c6";
}

function  cambiarFondocuentaSocio()
{
    document.getElementById("cuentaSocio").style.backgroundColor="#d1d1c6";
}


/*--------   funcion onblur SOCIOS!!!!!  ----------------------*/

function cambiarFondoUsuariosSocios(usuarioSocio)
{
    if(usuarioSocio.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/))
    {
        usuarioSocio.style="border-color:#1CA421;"
    }else
    {
        usuarioSocio.style="border-color:red;"
    }
}

function cambiarFondoApellidosSocios(apellidoSocio)
{
    if(apellidoSocio.value.match(/^[a-zA-Z]+\s[a-zA-Z]+$/))
    {
        apellidoSocio.style="border-color:#1CA421;"
    }else
    {
        apellidoSocio.style="border-color:red;"
    }
}

function cambiarFondoDNIsSocio(dniSocio)
{
    if(dniSocio.value.match(/^\d{8}\-[a-zA-Z]$/))
    {
        dniSocio.style="border-color:#1CA421;"
    }else
    {
        dniSocio.style="border-color:red;"
    }
}

function cambiarFondoDiaSocio(diaFecha)
{
    if(diaFecha.value=="")
    {
        diaFecha.style="border-color:red;"
    }else
    {
        diaFecha.style="border-color:#1CA421";
    }
}

function cambiarFondoMesSocio(mesFecha)
{
    if(mesFecha.value=="")
    {
        mesFecha.style="border-color:red;"
    }else
    {
        mesFecha.style="border-color:#1CA421";
    }
}

function cambiarFondoAnyoSocio(anyoFecha)
{
    if(anyoFecha.value=="")
    {
        anyoFecha.style="border-color:red";
    }else
    {
        anyoFecha.style="border-color:#1CA421";
    }
}

function cambiarFondoDireccionesSocio(direccionSocio)
{
    if (direccionSocio.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/)) {
        direccionSocio.style = "border-color:#1CA421;"
    } else {
        direccionSocio.style = "border-color:red;"
    }
}

function cambiarFondoNumerosSocios(numeroSocio)
{
    if (numeroSocio.value.match(/^\d{1,2}$/))
    {
        numeroSocio.style = "border-color:#1CA421;"
    } else
        {
        numeroSocio.style = "border-color:red;"
        }
}


function cambiarFondoPoblacionsSocio(poblacionSocio)
{
    if (poblacionSocio.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/))
    {
        poblacionSocio.style = "border-color:#1CA421;"
    } else
    {
        poblacionSocio.style = "border-color:red;"
    }
}

function cambiarFondoCPsSocio(CPSocio)
{
    if (CPSocio.value.match(/^\d{5}$/))
    {
        CPSocio.style = "border-color:#1CA421;"
    } else
    {
        CPSocio.style = "border-color:red;"
    }
}

function cambiarFondoProvinciasSocio(provinciaSocio)
{
    if (provinciaSocio.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/))
    {
        provinciaSocio.style = "border-color:#1CA421;"

    } else {
        provinciaSocio.style = "border-color:red;"
    }
}

function cambiarFondoCorreosSocio(correoSocio)
{
    if (correoSocio.value.match(/^[a-z,0-9]+\@[a-z]+\.[a-z]+$/))
    {
        correoSocio.style = "border-color:#1CA421;"
    } else
    {
        correoSocio.style = "border-color:red;"
    }
}

function cambiarFondoTelf1sSocio(telefono1Socio)
{
    if (telefono1Socio.value.match(/^[0-9]{9}$/))
    {
        telefono1Socio.style = "border-color:#1CA421;"
    } else
    {
        telefono1Socio.style = "border-color:red;"
    }
}

function cambiarFondoTelf2sSocio(telefono2Socio)
{
    if (telefono2Socio.value.match(/^[0-9]{9}$/))
    {
        telefono2Socio.style = "border-color:#1CA421;"
    } else
    {
        telefono2Socio.style = "border-color:red;"
    }
}

function cambiarFondoCajaSociosPassword()
{
    return document.getElementById("passwordSocio").value;
}


function cambiarFondoCajaSociosPassword2()
{
    return document.getElementById("password2Socio").value;
}


/*document.getElementById("password2Socio").onchange=visualizarVistoPassword;

function visualizarVistoPassword()
{
    let pass1="";
    let pass2="";

    pass1=cambiarFondoCajaSociosPassword();
    pass2=cambiarFondoCajaSociosPassword2();

    if(pass1==pass2)
    {
        passwordSocio.style = "border-color:#1CA421;"
    }else
    {
        passwordSocio.style = "border-color:red;"
    }
}*/

function cambiarFondoCantidadessSocio(cantidad)
{
    let donacion="";
    donacion=document.getElementById("cantidad").value;

    if(donacion=="")
    {
        cantidad.style = "border-color:red;"
    }
}


function cambiarFondoCantidadessSocio(cantidad)
{

    let pos1=document.getElementsByClassName("circulo")[0].value;
    let pos2=document.getElementsByClassName("circulo")[1].value;
    let pos3=document.getElementsByClassName("circulo")[2].value;

    let cantText=document.getElementById("cantidadTexto");

    if(pos1=="" || pos2=="" || pos3=="")
    {
        if(cantidad.value=="")
        {
            cantidad.style="border-color:red;"
        }else
        {
            cantText.style="border-color:red;"
            }
    }
}

function cambiarFondoIBANsSocio(ibaSocio)
{
    if (ibaSocio.value.match(/^\d{3}$/))
    {
        ibaSocio.style = "border-color:#1CA421;"
    } else
    {
        ibaSocio.style = "border-color:red;"
    }
}

function cambiarFondoBancosSocio(bancoSocio)
{
    if (bancoSocio.value.match(/^\d{4}$/))
    {
        bancoSocio.style = "border-color:#1CA421;"
    } else
    {
        bancoSocio.style = "border-color:red;"
    }
}

function cambiarFondoOficinasSocio(oficinaSocio)
{
    if (oficinaSocio.value.match(/^\d{4}$/))
    {
        oficinaSocio.style = "border-color:#1CA421;"
    } else
    {
        oficinaSocio.style = "border-color:red;"
    }
}

function cambiarFondoDCsSocio(DCSocio)
{
    if (DCSocio.value.match(/^\d{2}$/))
    {
        DCSocio.style = "border-color:#1CA421;"
    } else
    {
        DCSocio.style = "border-color:red;"
    }
}

function cambiarFondocuentasSocio(cuentaSocio)
{
    if (cuentaSocio.value.match(/^\d{10}$/))
    {
        cuentaSocio.style = "border-color:#1CA421;"
    } else
    {
        cuentaSocio.style = "border-color:red;"
    }
}







/*------------------------------  VOLUNTARIOS ----------------------------*/

function cambiarFondoResides(zona)
{
    if(zona.value=="")
    {
        zona.style="border-color:red;"
    }else
    {
        zona.style="border-color:#1CA421;"
    }
}





















