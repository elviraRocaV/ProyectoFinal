/*------------------------------  gatosAdopcion ----------------------------*/


function cambiarFondoNombreGato()
{
    document.getElementById("nombreGato").style.backgroundColor="#d1d1c6";
}

function cambiarFondoDescripGato()
{
    document.getElementById("descripcionGato").style.backgroundColor="#d1d1c6";
}


/*------------------------------  SOCIOS y VOLUNTARIOS ----------------------------*/

/*--------   funcion onCliclk ----------------------*/

function  cambiarFondoSocio(usuarioVoluntario)
{
    usuarioVoluntario.style.backgroundColor="#d1d1c6";
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
    if(apellidoSocio.value.match(/^[a-zA-Z]+(\s[a-zA-Z]+)*$/))
    {
        apellidoSocio.style="border-color:#1CA421;"
    }else
    {
        apellidoSocio.style="border-color:red;"
    }
}

function cambiarFondoDNIsSocio(dniSocio)
{
    if(dniSocio.value=="")
    {
        dniSocio.style="border-color:#1CA421;"
    }else
        {
            if(dniSocio.value.match(/^\d{8}[a-zA-Z]$/))
            {
                dniSocio.style="border-color:#1CA421;"
            }else
            {
                dniSocio.style="border-color:red;"
            }
        }
}

function cambiarFondoFechassSocio(direccionSocio)
{
    if(direccionSocio.value=="")
    {
        direccionSocio.style="border-color:red;"
    }else
    {
        direccionSocio.style="border-color:#1CA421";
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

/*function cambiarFondoTelf1sSocio(telefono1Socio)
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
}*/   //se utiliza máscaras y no funciones

function cambiarFondoCajaSociosPassword()
{
    return document.getElementById("passwordSocio").value;
}

function cambiarFondoCajaSociosPassword2()
{
    return document.getElementById("password2Socio").value;
}

/*document.getElementById("cantidadotros").onclick=activarCasilla;
function activarCasilla()
{
    document.getElementById("cantidadTexto").style.visibility="visible";

    document.getElementById("botonCantidades").style.visibility="hidden";

}*/

function comprobarPassword()
{
    let pass1="";
    let pass2="";
    let circulo="";

    circulo=document.getElementById("visto1").style.width="24px";
    circulo=document.getElementById("visto1").style.height="24px";
    circulo=document.getElementById("visto1").style.backgroundrepeat="no-repeat";
    circulo=document.getElementById("visto1").style.backgroundSize="cover";

    pass1=document.getElementById("passwordSocio").value;
    pass2=document.getElementById("password2Socio").value;

    if(pass1==pass2)
    {
        document.getElementById("button1").style.visibility="visible";
        document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        document.getElementById("passwordSocio").style="border-color:#1CA421;"
        document.getElementById("password2Socio").style="border-color:#1CA421;"


    }else
        {
            document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
            document.getElementById("passwordSocio").style="border-color:red;"
            document.getElementById("password2Socio").style="border-color:red;"

        }
}






/*-------------------------------------------------------------------- FIN SOCIOS --------------------------------------*/

/*----------------------------------------------  HOJASOCIO --------------------------------------*/


function setEditing(editable)
{
    let inputs=document.getElementsByTagName("input");
    for(let i=0;i<inputs.length;i++)
    {
        inputs[i].readOnly=!editable;
    }
    $('#dni').readOnly=true;
    if (editable) {
        $('#divSave').show();
        $('#divEdit').hide();
        $('#divDelete').hide();
        $('#divCancel').show();
    } else {
        $('#divSave').hide();
        $('#divEdit').show();
        $('#divDelete').show();
        $('#divCancel').hide();
    }
}

function save() {
    setEditing(false)
    document.getElementById("socioform").submit();
}

function cancel() {
    location.reload(true)
}

function erase()
{
    alert("Cuidado que lo borras... S/N")
}

function setSocioMenu(visible) {
    if (visible) {
        $('#menuSocio').show()
    }
    else
    {
        $('#menuSocio').hide()
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
    if (ibaSocio.value.length == 4)
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

    $(function() {
        $('.datepicker').datepicker({
            todayBtn: true,
            language: "es",
            todayHighlight: true,
            toggleActive: true
        });
    });


/*----------------------------------------------  HOJA DARSE BAJA SOCIOS --------------------------------------*/


function  cambiarFondoUsuarioSocioBaja()
{
    document.getElementById("usuarioSocioBaja").style.backgroundColor="#d1d1c6";
}

function  cambiarFondoPasswordSocioBaja()
{
    document.getElementById("passwordSocioBaja").style.backgroundColor="#d1d1c6";
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

