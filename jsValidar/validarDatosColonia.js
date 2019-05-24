

/*------------- funciones ONFOCUS ---------------------------------------*/

function  cambiarFondoColonia(elemento)
{
    elemento.style.backgroundColor="#d1d1c6";
}

/*------------------funciones ONBLUR --------------------------------*/

function validarNombreColonia(nombreCalle)
{
    if(nombreCalle.value.match(/^[a-zA-Z]+(\s?[a-zA-Z])*$/))
    {
        nombreCalle.style="border-color:#1CA421;"
    }else
    {
        nombreCalle.style="border-color:red;"
    }
}

function validarnumCantGatosColonia(numTotalGatos)
{
    if (numTotalGatos.value.match(/^\d{1,2}$/))
    {
        numTotalGatos.style = "border-color:#1CA421;"
    } else
    {
        numTotalGatos.style = "border-color:red;"
    }
}

function validarnumCantTotalGatas(numTotalGatas)
{
    if (numTotalGatas.value.match(/^\d{1,2}$/))
    {
        numTotalGatas.style = "border-color:#1CA421;"
    } else
    {
        numTotalGatas.style = "border-color:red;"
    }
    updateGatasNoCastradas()
}

function validarnumGatasCastradas(gatasCastradas)
{
    if (gatasCastradas.value.match(/^\d{1,2}$/))
    {
        gatasCastradas.style = "border-color:#1CA421;"
    } else
    {
        gatasCastradas.style = "border-color:red;"
    }
    updateGatasNoCastradas()
}


function updateGatasNoCastradas()
{
    let numtotalGatas="";
    let numGatasCastradas="";

    numtotalGatas=document.getElementById("numTotalGatas").value;
    numGatasCastradas=document.getElementById("numGatasCastradas").value;

    document.getElementById("numGatasNoCastradas").value=numtotalGatas-numGatasCastradas;
}



/*----------------------------------------------  BOTON AÑADIR COLONIA ---------------------------------------*/


function anyadirColonias()
{
    document.getElementById("button1").style.display="none";

    form=document.getElementsByTagName("form")[0];

    divPrincipal=document.createElement("div");   //div principal
    divPrincipal.className="container sinPadding anchoContenedor"
    row=document.createElement("div");   //se crea row
    row.className="row d-flex justify-content-md-between";
    div1=document.createElement("div");
    div1.className="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4";
    textUbicacion=document.createTextNode("Ubicación colonia");
    textUbicacion.className="textFormularioVoluntario";
    span1=document.createElement("span");
    span1.className="asterisco";
    span1.innerText="*";
    div2=document.createElement("div");
    div2.className="input-group";
    span=document.createElement("span");
    span.className="input-group-addon icono2";
    i=document.createElement("i");
    i.className="glyphicon glyphicon-map-marker";
    inputUbicacion=document.createElement("input");
    inputUbicacion.className="lineahazteVoluntarioNombre fondocaja colorLineaCaja";
    inputUbicacion.type="text";
    inputUbicacion.name="ubicacion";
    inputUbicacion.id="";
    inputUbicacion.placeholder="Calle referencia";

    form.appendChild(divPrincipal);
    divPrincipal.appendChild(row);
    row.appendChild(div1);
    div1.appendChild(textUbicacion);
    div1.appendChild(span1);
    div1.appendChild(div2);
    div2.appendChild(span);
    span.appendChild(i);
    div2.appendChild(inputUbicacion);


    div3=document.createElement("div");
    div3.className="col-md-4";
    row.appendChild(div3);


   div4=document.createElement("div");
   div4.className="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4";
   texttotalGatos=document.createTextNode("Nº total gat@s de la colonia");
   texttotalGatos.className="textFormularioVoluntario";
   span3=document.createElement("span");
   span3.className="asterisco";
   span3.innerText="*";
   div5=document.createElement("div");
   div5.className="input-group";
   span4=document.createElement("span");
   span4.className="input-group-addon icono2";
   i1=document.createElement("i");
   i1.className="glyphicon glyphicon-edit";
   numGatos=document.createElement("input");
   numGatos.className="lineahazteVoluntarioApellidos fondocaja cajaApellidosSocio colorLineaCaja";
   numGatos.type="text";
   numGatos.name="numTotalGatos";
   numGatos.id="";
   numGatos.placeholder="num total gatos colonia";

   row.appendChild(div4);
   div4.appendChild(texttotalGatos);
   div4.appendChild(span3);
   div4.appendChild(div5);
   div5.appendChild(span4);
   span4.appendChild(i1);
   div5.appendChild(numGatos);


    row1=document.createElement("div");
    row1.className="row d-flex justify-content-md-between separacionHorizontal";
    div6=document.createElement("div");
    div6.className="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4";
    textCant=document.createTextNode("Cantidad Gatas (Hembras)");
    textCant.className="textFormularioVoluntario";
    span5=document.createElement("span");
    span5.className="asterisco";
    span5.innerText="*";
    div7=document.createElement("div");
    div7.className="input-group";
    span6=document.createElement("span");
    span6.className="input-group-addon icono2";
    i2=document.createElement("i");
    i2.className="glyphicon glyphicon-edit";
    numTotalGatas=document.createElement("input");
    numTotalGatas.className="lineahazteVoluntarioDNI fondocaja colorLineaCaja";
    numTotalGatas.type="text";
    numTotalGatas.name="numGatasTotales";
    numTotalGatas.id="numTotalGatas";
    numTotalGatas.placeholder="Número total gatas";

    divPrincipal.appendChild(row1);
    row1.appendChild(div6);
    div6.appendChild(textCant);
    div6.appendChild(span5);
    div6.appendChild(div7);
    div7.appendChild(span6);
    span6.appendChild(i2);
    div7.appendChild(numTotalGatas);


    div8=document.createElement("div");
    div8.className="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4";
    GatasCastradas=document.createTextNode("Nº de gatas castradas");
    GatasCastradas.className="textFormularioVoluntario";
    span7=document.createElement("span");
    span7.className="asterisco";
    span7.innerText="*";
    div9=document.createElement("div");
    div9.className="input-group";
    span8=document.createElement("span");
    span8.className="input-group-addon icono2";
    i3=document.createElement("i");
    i3.className="glyphicon glyphicon-edit";
    castradas=document.createElement("input");
    castradas.className="lineahazteVoluntarioDNI fondocaja colorLineaCaja";
    castradas.type="text";
    castradas.name="numGatasCastradas";
    castradas.id="numGatasCastradas";
    castradas.placeholder="Número gatas castradas";

    row1.appendChild(div8);
    div8.appendChild(GatasCastradas);
    div8.appendChild(span7);
    div8.appendChild(div9);
    div9.appendChild(span8);
    span8.appendChild(i3);
    div9.appendChild(castradas);

   div10=document.createElement("div");
   div10.className="col-md-4 col-12 mt-md-5 mt-sm-5 mt-4 mb-md-5";
   numGatasXCastrar=document.createTextNode("Nº gatas NO Castradas");
   numGatasXCastrar.className="textFormularioVoluntario";
   div11=document.createElement("div");
   div11.className="input-group";
   span9=document.createElement("span");
   span9.className="input-group-addon icono2";
   i4=document.createElement("i");
   i4.className="glyphicon glyphicon-edit";
   numGatasNoCastradas=document.createElement("input");
   numGatasNoCastradas.className="lineahazteVoluntarioDNI fondocaja colorLineaCaja";
   numGatasNoCastradas.type="text";
   numGatasNoCastradas.name="numGatasNoCastradas";
   numGatasNoCastradas.id="GatasNoCastradas";
   numGatasNoCastradas.placeholder="Nún gatas no castradas";

   numGatasNoCastradas.value=numTotalGatas.value-castradas.value;

   row1.appendChild(div10);
   div10.appendChild(numGatasXCastrar);
   div10.appendChild(div11);
   div11.appendChild(span9);
   span9.appendChild(i4);
   div11.appendChild(numGatasNoCastradas);

    row2=document.createElement("div");
    row2.className="row justify-content-md-center";
    div12=document.createElement("div");
    div12.className="col-md-5";
    div13=document.createElement("div");
    div13.className="col-md-2 mt-md-5 mb-md-5";
    div14=document.createElement("button");
    div14.className="btn btn-primary boton1";
    div14.role="button";
    div14.id="button1";
    div14.innerText="Enviar";
    div15=document.createElement("div");
    div15.className="col-md-5";

    row1.appendChild(row2);
    row2.appendChild(div12);
    div12.appendChild(div13);
    div13.appendChild(div14);
    div14.appendChild(div15);

    inputLectura()
}

function inputLectura()
{
    let inputNoCastradas="";

    inputNoCastradas=document.getElementById("GatasNoCastradas");
    inputNoCastradas.readOnly = true;




}
