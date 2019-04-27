
/*-------------------------------- NOMBRE ----------------------------------*/
function cambiarFondoUsuario()
{
    document.getElementById("usuario").style.backgroundColor="#d1d1c6";
}

function cambiarFondoUsuarios(nombre)
{
    document.getElementById("visto1").style.width="24px";
    document.getElementById("visto1").style.height="24px";
    document.getElementById("visto1").style.backgroundrepeat="no-repeat";
    document.getElementById("visto1").style.backgroundSize="cover";

    if(nombre.value.match(/^[a-zA-Z]+\s[a-zA-Z]*$/))
    {
        document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        nombre.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        nombre.style="border-color:red;"
    }
}

/*-------------------------------- APELLIDOS ----------------------------------*/

function cambiarFondoApellido()
{
    document.getElementById("apellido").style.backgroundColor="#d1d1c6";
}

function cambiarFondoApellidos(apellidos)
{
    document.getElementById("visto2").style.width="24px";
    document.getElementById("visto2").style.height="24px";
    document.getElementById("visto2").style.backgroundrepeat="no-repeat";
    document.getElementById("visto2").style.backgroundSize="cover";

    if(apellidos.value.match(/^[a-zA-Z][a-zA-Z]+\s[a-zA-Z][a-zA-Z]+$/))
    {
        document.getElementById("visto2").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        apellidos.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto2").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        apellidos.style="border-color:red;"
    }
}

/*-------------------------------- DNI ----------------------------------*/
function cambiarFondoDNI()
{
    document.getElementById("dni").style.backgroundColor="#d1d1c6";
}

function cambiarFondoDNIs(dni)
{
    document.getElementById("visto3").style.width="24px";
    document.getElementById("visto3").style.height="24px";
    document.getElementById("visto3").style.backgroundrepeat="no-repeat";
    document.getElementById("visto3").style.backgroundSize="cover";

    if(dni.value.match(/^\d{8}\-[a-zA-Z]$/))
    {
        document.getElementById("visto3").style.backgroundImage='url("imagenes/vistoVerde.png")';
        dni.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto3").style.backgroundImage='url("imagenes/vistoRojo.png")';
        dni.style="border-color:red;"
    }
}

/*-------------------------------- FECHA NACIMIENTO ----------------------------------   NO FUNCIONA*/


function cambiarFondoDia(dia)
{
    if(dia.value=="")
    {
        dia.style="border-color:red;"
        return 1;
    }else
    {
        dia.style="border-color:#1CA421";
        return 0;
    }
}

function cambiarFondoMes(mes)
{
    if(mes.value=="")
    {
        mes.style="border-color:red;"
        return 1;
    }else
        {
            mes.style="border-color:#1CA421";
            return 0;
        }
}

function cambiarFondoAnyo(anyo)
{
    if(anyo.value=="")
    {
        anyo.style="border-color:red";
        return 1;
    }else
        {
            anyo.style="border-color:#1CA421";
            return 0;
        }
}

document.getElementsByTagName("select")[2].onchange=cambiarFondoAnyos;

function cambiarFondoAnyos()
{
    let dia;
    let mes;
    let anyo;

    dia=document.getElementsByTagName("select")[0].value;
    mes=document.getElementsByTagName("select")[2].value;
    anyo=document.getElementsByTagName("select")[2].value;

    //alert(dia+mes+anyo);

    document.getElementById("visto4").style.width="24px";
    document.getElementById("visto4").style.height="24px";
    document.getElementById("visto4").style.backgroundrepeat="no-repeat";
    document.getElementById("visto4").style.backgroundSize="cover";

    if(dia!="" && mes!="" && anyo!="")
    {
        document.getElementById("visto4").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        dia.style="border-color:#1CA421";
        mes.style="border-color:#1CA421";
        anyo.style="border-color:#1CA421";
    }else
        {
            document.getElementById("visto4").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        }
}

/*-------------------------------- DIRECCION ---------------------------------- */

function cambiarFondoDireccion(event)
{
    event.style.backgroundColor="#d1d1c6";
}

function cambiarFondoNumero(evento)
{
    evento.style.backgroundColor="#d1d1c6";
}

function cambiarFondoPortal()
{
    document.getElementById("portal").style.backgroundColor="#d1d1c6";
}

function cambiarFondoPiso()
{
    document.getElementById("piso").style.backgroundColor="#d1d1c6";
}

function cambiarFondoLetra()
{
    document.getElementById("letra").style.backgroundColor="#d1d1c6";
}

document.getElementById("direccion").onblur=cambiarFondoDireccions;

function cambiarFondoDireccions(direccion)
{
    let direcc;
    direcc=document.getElementById("direccion").value;

    if(direcc.match(/^[a-zA-Z]+\s[a-zA-Z]*$/))
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
}

document.getElementsByTagName("input")[4].onblur=visualizarVisto;

function visualizarVisto()
{
    let res1=cambiarFondoDireccions();
    let res2=cambiarFondoNumeros();

    document.getElementById("visto5").style.width="24px";
    document.getElementById("visto5").style.height="24px";
    document.getElementById("visto5").style.backgroundrepeat="no-repeat";
    document.getElementById("visto5").style.backgroundSize="cover";

   if(res1==0 && res2==0)
   {
       document.getElementById("visto5").style.backgroundImage='url("imagenes/vistoVerde.png")';
       document.getElementById("numero").style="border-color:#1CA421;"
       document.getElementById("direccion").style="border-color:#1CA421;"
   }else
       {
           document.getElementById("visto5").style.backgroundImage='url("imagenes/vistoRojo.png")';
           document.getElementById("numero").style="border-color:red;"
           document.getElementById("direccion").style="border-color:red;"
       }
}

/*-------------------------------- ZONA DONDE RESIDE ---------------------------------- NO FUNCIONA*/

function cambiarFondoResides(zona)
{
    document.getElementById("visto6").style.width="24px";
    document.getElementById("visto6").style.height="24px";
    document.getElementById("visto6").style.backgroundrepeat="no-repeat";
    document.getElementById("visto6").style.backgroundSize="cover";

    if(zona.value=="")
    {
        document.getElementById("visto6").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        zona.style="border-color:red;"
    }else
    {
        document.getElementById("visto6").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        zona.style="border-color:#1CA421;"
    }
}

/*-------------------------------- CORREO /TELEFONO1 / TELEFONO2 ----------------------------------*/

function cambiarFondoCorreo()
{
    document.getElementById("correo").style.backgroundColor="#d1d1c6";
}

function cambiarFondoTelf1()
{
    document.getElementById("telefono1").style.backgroundColor="#d1d1c6";
}

function cambiarFondoTelf2()
{
    document.getElementById("telefono2").style.backgroundColor="#d1d1c6";
}

//document.getElementById("correo").onblur=comprobarCorreo;

function cambiarFondoCorreos(mail)
{
    document.getElementById("visto7").style.width="24px";
    document.getElementById("visto7").style.height="24px";
    document.getElementById("visto7").style.backgroundrepeat="no-repeat";
    document.getElementById("visto7").style.backgroundSize="cover";

    if(mail.value.match(/^[a-z,0-9]+\@[a-z]+\.[a-z]+$/))
    {
        document.getElementById("visto7").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        mail.style="border-color:#1CA421;"
    }else
        {
            document.getElementById("visto7").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
            mail.style="border-color:red;"
        }
}

function cambiarFondoTelf1s(telf1)
{
    document.getElementById("visto8").style.width="24px";
    document.getElementById("visto8").style.height="24px";
    document.getElementById("visto8").style.backgroundrepeat="no-repeat";
    document.getElementById("visto8").style.backgroundSize="cover";

    if(telf1.value.match(/^[0-9]{9}$/))
    {
        document.getElementById("visto8").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        telf1.style="border-color:#1CA421";
    }else
    {
        document.getElementById("visto8").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        telf1.style="border-color:red";
    }
}

function cambiarFondoTelf2s(telf2)
{
    if(telf2.value.match(/^[0-9]{9}$/))
    {
        telf2.style="border-color:#1CA421;"
    }else
    {
        telf2.style="border-color:red;"
    }
}


/*-------------------------------- CONTRASEÑA ----------------------------------*/

function cambiarFondoPassword1()
{
    document.getElementById("password1").style.backgroundColor="#d1d1c6";
}

function cambiarFondoPassword2()
{
    document.getElementById("password2").style.backgroundColor="#d1d1c6";
}

function cambiarFondoPassword1s()
{
    //alert("pas1 "+document.getElementById("password1").value);
    return document.getElementById("password1").value;
}

function cambiarFondoPassword2s()
{
    //alert("pas2 "+document.getElementById("password2").value);
    return document.getElementById("password2").value;
}


document.getElementsByTagName("input")[12].onblur=visualizarVistoPassword;

function visualizarVistoPassword()
{
    let pas1="";
    let pas2="";

    pas1=cambiarFondoPassword1s();
    pas2=cambiarFondoPassword2s();

    document.getElementById("visto10").style.width="24px";
    document.getElementById("visto10").style.height="24px";
    document.getElementById("visto10").style.backgroundrepeat="no-repeat";
    document.getElementById("visto10").style.backgroundSize="cover";

    if(pas1==pas2)
    {
        document.getElementById("visto10").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        document.getElementById("password1").style="border-color:#1CA421";
        document.getElementById("password2").style="border-color:#1CA421";
    }else
        {
            document.getElementById("visto10").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
            document.getElementById("password1").style="border-color:red";
            document.getElementById("password2").style="border-color:red";
        }
}

/*-------------------------------- DATOS COLONIA  ----------------------------------*/


function cambiarFondoUbicacionGatos()
{
    document.getElementById("gatoCalle").style.backgroundColor="#d1d1c6";
}

function cambiarFondoTotalGatos()
{
    document.getElementById("numTotalGatos").style.backgroundColor="#d1d1c6";
}

function cambiarFondoCantidadGatas()
{
    document.getElementById("numTotalgatas").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoGatasCastradas()
{
    document.getElementById("numGatasCastradas").style.backgroundColor="#d1d1c6";
}

function cambiarFondoGastasNoCastradas()
{
    document.getElementById("numGatasNoCastradas").style.backgroundColor="#d1d1c6";
}



function cambiarFondoUbicacionGatosExpresionRegular(ubicacion)
{
    document.getElementById("visto11").style.width="24px";
    document.getElementById("visto11").style.height="24px";
    document.getElementById("visto11").style.backgroundrepeat="no-repeat";
    document.getElementById("visto11").style.backgroundSize="cover";

    if(ubicacion.value.match(/^[a-zA-Z]+\s[a-zA-Z]*$/))
    {
        document.getElementById("visto11").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        ubicacion.style="border-color:#1CA421";
    }else
    {
        document.getElementById("visto11").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        ubicacion.style="border-color:red";
    }
}

function cambiarFondoTotalGatosExpresionRegular(numeroTotal)
{



}
