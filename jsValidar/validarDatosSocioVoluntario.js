/*--------   funcion onFocus ----------------------*/

function  ponerFondoGris(objeto)
{
    objeto.style.backgroundColor="#d1d1c6";
}


/*--------   funcion onblur SOCIOS!!!!!  ----------------------*/

function validar(objeto, expresion)
{
    if (objeto.value.match(expresion)) {
        objeto.style = "border-color:#1CA421;"
    } else
    {
        objeto.style="border-color:red;"
    }
}

/*-----------------------VALIDAR PASSWORD-----------------------------------*/
function validarPassword()
{
    let pass1=document.getElementById("passwordSocio");
    let pass2=document.getElementById("password2Socio");

    let circulo=document.getElementById("visto1");
    circulo.style.width="24px";
    circulo.style.height="24px";
    circulo.style.backgroundrepeat="no-repeat";
    circulo.style.backgroundSize="cover";

    if(pass1.value != "" && pass1.value == pass2.value )
    {
        document.getElementById("btnEnviar").style.visibility="visible";
        document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
        pass1.style="border-color:#1CA421;"
        pass2.style="border-color:#1CA421;"
    }else
    {
        document.getElementById("visto1").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
        pass1.style="border-color:red;"
        pass2.style="border-color:red;"
    }
}


/* ----------------------------------------FECHA NACIMIENTO ------------------------------------------*/

function ValidarBorde(valorCampo)
{
    if(valorCampo.value=="")
    {
        valorCampo.style="border-color:red;"
    }else
    {
        valorCampo.style="border-color:#1CA421";
    }
}

//document.getElementById("cantidadotros").onclick=activarCasilla;
function activarOtros(activar)
{
    casilla=document.getElementById("cantidadTexto")
    if (activar) { casilla.style.visibility="visible"; }
    else {casilla.style.visibility="hidden"; }
//    document.getElementById("botonCantidades").style.visibility="hidden";
}


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

    $(function() {
        $('.datepicker').datepicker({
            todayBtn: true,
            language: "es",
            todayHighlight: true,
            toggleActive: true
        });
    });


/*----------------------------------------------  HOJA DARSE BAJA SOCIOS --------------------------------------*/


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

