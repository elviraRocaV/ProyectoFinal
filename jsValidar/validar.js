/*-------------------------------- NOMBRE ----------------------------------*/
function cambiarFondoUsuario()
{
    document.getElementById("usuario").style.backgroundColor="#d1d1c6";
}

function cambiarFondoUsuarios(nombre)
{
    document.getElementById("visto1").style.width="35px";
    document.getElementById("visto1").style.height="35px";
    document.getElementById("visto1").style.backgroundrepeat="no-repeat";
    document.getElementById("visto1").style.backgroundSize="cover";
    if(nombre.value.match(/^[a-z]{1,14}$/))
    {
        document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
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
    document.getElementById("visto2").style.width="35px";
    document.getElementById("visto2").style.height="35px";
    document.getElementById("visto2").style.backgroundrepeat="no-repeat";
    document.getElementById("visto2").style.backgroundSize="cover";


    if(apellidos.value.match(/^[a-z]{1,14}$/))
    {
        document.getElementById("visto2").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
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
    document.getElementById("visto3").style.width="35px";
    document.getElementById("visto3").style.height="35px";
    document.getElementById("visto3").style.backgroundrepeat="no-repeat";
    document.getElementById("visto3").style.backgroundSize="cover";

    if(dni.value.match(/^[a-z]{1,14}$/))
    {
        document.getElementById("visto3").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
    }else
    {
        document.getElementById("visto3").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        dni.style="border-color:red;"
    }
}

/*-------------------------------- FECHA NACIMIENTO ----------------------------------   NO FUNCIONA*/

function cambiarFondoDia(dia)
{
    if(dia.value=="")
    {
        dia.style="border-color:red;"
    }
    return 1;
}

function cambiarFondoMes(mes)
{
    if(mes.value=="")
    {
        mes.style="border-color:red;"
    }
    return 1;
}

function cambiarFondoAnyo(anyo)
{
    if(anyo.value=="")
    {
        anyo.style="border-color:red;"
    }
    return 1;
}

function cambiarFondoAnyos(anyo, dia, mes)
{
    alert("pasa");

    let resdia=cambiarFondoDia(dia);
    let resmes=cambiarFondoMes(mes);
    let resAnyo=cambiarFondoAnyo(anyo);

    alert(resAnyo, resdia, resAnyo);

    if(resdia==1 || resmes==1 || resAnyo==1)
    {
        document.getElementById("visto4").style.width="40px";
        document.getElementById("visto4").style.height="40px";
        document.getElementById("visto4").style.backgroundrepeat="no-repeat";
        document.getElementById("visto4").style.backgroundSize="cover";
        document.getElementById("visto4").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
    }else
        {
            document.getElementById("visto4").style.width="35px";
            document.getElementById("visto4").style.height="35px";
            document.getElementById("visto4").style.backgroundrepeat="no-repeat";
            document.getElementById("visto4").style.backgroundSize="cover";
            document.getElementById("visto4").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        }
}

/*-------------------------------- DIRECCION ---------------------------------- NO FUNCIONA*/

function cambiarFondoDireccion()
{
    document.getElementById("direccion").style.backgroundColor="#d1d1c6";
}

function cambiarFondoDireccions(direccion)
{
    document.getElementById("visto5").style.width="35px";
    document.getElementById("visto5").style.height="35px";
    document.getElementById("visto5").style.backgroundrepeat="no-repeat";
    document.getElementById("visto5").style.backgroundSize="cover";

    if(direccion.value.match(/^[a-z]{1,14}$/))
    {
        document.getElementById("visto5").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
    }else
    {
        document.getElementById("visto5").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        dni.style="border-color:red;"
    }
}



function cambiarFondoNumero()
{
    document.getElementById("numero").style.backgroundColor="#d1d1c6";
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


/*-------------------------------- ZONA DONDE RESIDE ---------------------------------- NO FUNCIONA*/

function cambiarFondoResides(zona)
{
    document.getElementById("visto5").style.width="40px";
    document.getElementById("visto5").style.height="40px";
    document.getElementById("visto5").style.backgroundrepeat="no-repeat";
    document.getElementById("visto5").style.backgroundSize="cover";

    if(zona.value=="")
    {
        document.getElementById("visto5").style.backgroundImage= 'url("imagenes/vistoRojo.png")';

    }else
        {
            document.getElementById("visto5").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
            zona.style="border-color:red;"
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



















/*function cambiarFondoDireccion()
{
    fondoPassword=document.getElementById("direccion");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoNumero()
{
    fondoPassword=document.getElementById("numero");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoPortal()
{
    fondoPassword=document.getElementById("portal");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoPiso()
{
    fondoPassword=document.getElementById("piso");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoLetra()
{
    fondoPassword=document.getElementById("letra");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoLetra()
{
    fondoPassword=document.getElementById("letra");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoCorreo()
{
    fondoPassword=document.getElementById("correo");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoTelf1()
{
    fondoPassword=document.getElementById("telefono1");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

function cambiarFondoTelf2()
{
    fondoPassword=document.getElementById("telefono2");
    fondoPassword.style.backgroundColor="#d1d1c6";
}

*/


