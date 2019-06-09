/*--------   funcion onFocus SOCIOS Y VOLUNTARIOS----------------------*/

function  ponerFondoGris(objeto)
{
    objeto.style.backgroundColor="#d1d1c6";
}

function setProvincia(objeto)
{
    document.getElementById("provincias").value=objeto.value.substr(0,2)
}

function activarOtros(visible)
{
    if ( visible ) {
        document.getElementById("cantidadTexto").style.visibility = "visible"
    }
    else
    {
        document.getElementById("cantidadTexto").style.visibility = "hidden"
    }
}

/*--------   funcion onblur SOCIOS Y VOLUNTARIOS!!!!!  ----------------------*/

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
        document.getElementById("button1").style.visibility="visible";
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

$(function() {
    $('.datepicker').datepicker({
        todayBtn: true,
        language: "es",
        todayHighlight: true,
        toggleActive: true
    });
});



function setEditing(editable)
{
    let inputs=document.getElementsByTagName("input");
    for(let i=0;i<inputs.length;i++)
    {
        inputs[i].readOnly=!editable;
    }
    let selects=document.getElementsByTagName("select");
    for(let i=0;i<selects.length;i++)
    {
        selects[i].disabled=!editable;
    }
}
