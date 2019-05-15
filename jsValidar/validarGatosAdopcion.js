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


/*--------   funcion onblur ----------------------*/

function cambiarFondoUsuariosSocios(usuarioSocio)
{
    document.getElementById("visto11").style.width="24px";
    document.getElementById("visto11").style.height="24px";
    document.getElementById("visto11").style.backgroundrepeat="no-repeat";
    document.getElementById("visto11").style.backgroundSize="cover";

    if(usuarioSocio.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/))
    {
        document.getElementById("visto11").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        usuarioSocio.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto11").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        usuarioSocio.style="border-color:red;"
    }
}

function cambiarFondoApellidosSocios(apellidoSocio)
{
    document.getElementById("visto12").style.width="24px";
    document.getElementById("visto12").style.height="24px";
    document.getElementById("visto12").style.backgroundrepeat="no-repeat";
    document.getElementById("visto12").style.backgroundSize="cover";

    if(apellidoSocio.value.match(/^[a-zA-Z]+\s[a-zA-Z]+$/))
    {
        document.getElementById("visto12").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        apellidoSocio.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto12").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        apellidoSocio.style="border-color:red;"
    }
}

function cambiarFondoDNIsSocio(dniSocio)
{
    document.getElementById("visto13").style.width="24px";
    document.getElementById("visto13").style.height="24px";
    document.getElementById("visto13").style.backgroundrepeat="no-repeat";
    document.getElementById("visto13").style.backgroundSize="cover";

    if(dniSocio.value.match(/^\d{8}\-[a-zA-Z]$/))
    {
        document.getElementById("visto13").style.backgroundImage='url("imagenes/vistoVerde.png")';
        dniSocio.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto13").style.backgroundImage='url("imagenes/vistoRojo.png")';
        dniSocio.style="border-color:red;"
    }
}

function cambiarFondoDiaSocio(diaFecha)
{
    if(diaFecha.value=="")
    {
        diaFecha.style="border-color:red;"
        return 1;
    }else
    {
        diaFecha.style="border-color:#1CA421";
        return 0;
    }
}

function cambiarFondoMesSocio(mesFecha)
{
    if(mesFecha.value=="")
    {
        mesFecha.style="border-color:red;"
        return 1;
    }else
    {
        mesFecha.style="border-color:#1CA421";
        return 0;
    }
}

function cambiarFondoAnyoSocio(anyoFecha)
{
    let dia="";
    let mes="";
    let anyo="";

    document.getElementById("visto14").style.width="24px";
    document.getElementById("visto14").style.height="24px";
    document.getElementById("visto14").style.backgroundrepeat="no-repeat";
    document.getElementById("visto14").style.backgroundSize="cover";

    if(anyoFecha.value=="")
    {
        anyoFecha.style="border-color:red";
    }else
    {
        anyoFecha.style="border-color:#1CA421";
    }

    dia=document.getElementsByTagName("select")[0].value;
    mes=document.getElementsByTagName("select")[1].value;
    anyo=document.getElementsByTagName("select")[2].value;


    if(dia!="" && mes!="" && anyo!="")
    {
        dia.style="border-color:#1CA421";
        mes.style="border-color:#1CA421";
        anyo.style="border-color:#1CA421";

        document.getElementById("visto14").style.backgroundImage='url("imagenes/vistoVerde.png")';

    }else
    {
        document.getElementById("visto14").style.backgroundImage='url("imagenes/vistoRojo.png")';
    }
}

function cambiarFondoDireccionesSocio(direccionSocio)
{
    document.getElementById("visto15").style.width = "24px";
    document.getElementById("visto15").style.height = "24px";
    document.getElementById("visto15").style.backgroundrepeat = "no-repeat";
    document.getElementById("visto15").style.backgroundSize = "cover";

    if (direccionSocio.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/)) {
        document.getElementById("visto15").style.backgroundImage = 'url("imagenes/vistoVerde.png")';
        direccionSocio.style = "border-color:#1CA421;"
    } else {
        document.getElementById("visto15").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
        direccionSocio.style = "border-color:red;"
    }
}

function cambiarFondoNumerosSocios(numeroSocio)
{
    document.getElementById("visto16").style.width = "24px";
    document.getElementById("visto16").style.height = "24px";
    document.getElementById("visto16").style.backgroundrepeat = "no-repeat";
    document.getElementById("visto16").style.backgroundSize = "cover";

    if (numeroSocio.value.match(/^\d{1,2}$/))
    {
        document.getElementById("visto16").style.backgroundImage='url("imagenes/vistoVerde.png")';
        numeroSocio.style = "border-color:#1CA421;"
    } else
        {
        document.getElementById("visto16").style.backgroundImage='url("imagenes/vistoRojo.png")';
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


document.getElementsByTagName("input")[10].onchange=ponerVisto;

function ponerVisto()
{
    let mail="";
    let telf1="";
    let telef2="";

    mail=document.getElementById("poblacionSocio").value;
    telf1=document.getElementById("CPSocio").value;
    telef2=document.getElementById("provinciaSocio").value;

    document.getElementById("visto17").style.width = "24px";
    document.getElementById("visto17").style.height = "24px";
    document.getElementById("visto17").style.backgroundrepeat = "no-repeat";
    document.getElementById("visto17").style.backgroundSize = "cover";

    if(mail=="" || telf1=="" || telef2=="")
    {
        document.getElementById("visto17").style.backgroundImage='url("imagenes/vistoRojo.png")';
        passwordSocio.style = "border-color:red;"
    }else
        {
            document.getElementById("visto17").style.backgroundImage='url("imagenes/vistoVerde.png")';
            passwordSocio.style = "border-color:#1CA421;"
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







































function cambiarFondoCantidadessSocio(cantidad)
{
    let donacion="";
    donacion=document.getElementById("cantidad").value;

    if(donacion=="")
    {
        cantidad.style = "border-color:red;"
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


document.getElementsByTagName("input")[15].onblur=visualizarVistoPassword;

function visualizarVistoPassword()
{
    let pass1="";
    let pass2="";

    pass1=cambiarFondoCajaSociosPassword();
    pass2=cambiarFondoCajaSociosPassword2();

    document.getElementById("visto21").style.width = "24px";
    document.getElementById("visto21").style.height = "24px";
    document.getElementById("visto21").style.backgroundrepeat = "no-repeat";
    document.getElementById("visto21").style.backgroundSize = "cover";

    if(pass1==pass2)
    {
        alert("pasa2");
        document.getElementById("visto21").style.backgroundImage='url("imagenes/vistoVerde.png")';
        passwordSocio.style = "border-color:#1CA421;"
    }else
    {
        document.getElementById("visto21").style.backgroundImage='url("imagenes/vistoRojo.png")';
        passwordSocio.style = "border-color:red;"
    }
}


function cambiarFondoCantidadessSocio(cantidad)
{
    alert("pasa");
    let pos1=document.getElementsByClassName("circulo")[0].value;
    let pos2=document.getElementsByClassName("circulo")[1].value;
    let pos3=document.getElementsByClassName("circulo")[2].value;

    if(pos1=="" || pos2=="" || pos3=="")
    {
        if(cantidad.value=="")
        {
            cantidad.style="border-color:red;"
        }else
        {
                cantidad.style="border-color:#1CA421;"
            }
    }
}

function cambiarFondoIBANsSocio(ibaSocio)
{
    if (ibaSocio.value.match(/^\d{3}$/))
    {
        ibaSocio.style = "border-color:#1CA421;"
        return 1;
    } else
    {
        ibaSocio.style = "border-color:red;"
        return 0;
    }
}

function cambiarFondoBancosSocio(bancoSocio)
{
    if (bancoSocio.value.match(/^\d{4}$/))
    {
        bancoSocio.style = "border-color:#1CA421;"
        return 1;
    } else
    {
        bancoSocio.style = "border-color:red;"
        return 0;
    }
}

function cambiarFondoOficinasSocio(oficinaSocio)
{
    if (oficinaSocio.value.match(/^\d{4}$/))
    {
        oficinaSocio.style = "border-color:#1CA421;"
        return 1;
    } else
    {
        oficinaSocio.style = "border-color:red;"
        return 0;
    }
}

function cambiarFondoDCsSocio(DCSocio)
{
    if (DCSocio.value.match(/^\d{2}$/))
    {
        DCSocio.style = "border-color:#1CA421;"
        return 1;
    } else
    {
        DCSocio.style = "border-color:red;"
        return 0;
    }
}

function cambiarFondocuentasSocio(cuentaSocio)
{
    if (cuentaSocio.value.match(/^\d{10}$/))
    {
        cuentaSocio.style = "border-color:#1CA421;"
        return 1;
    } else
    {
        cuentaSocio.style = "border-color:red;"
        return 0;
    }
}

















/*    if(direccionSocio.value=="")
    {
        direccionSocio.style="border-color:red;"
    }else
    {
        direccionSocio.style="border-color:#1CA421";
    }
}




/*function cambiarFondoNumeroSocio(numeroSocio)
{


    if(direccionSocio.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/))
    {
        return 0;
    }else
    {
        return 1;
    }


}














document.getElementById("numero").onblur=cambiarFondoNumeros;

function cambiarFondoNumeros()
{
    let num;
    num=document.getElementById("numero").value;

    if(num.match(/^\d{1,2}$/))
    {
        return 0;
    }else
    {
        return 1;
    }
}*/










