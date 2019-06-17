let divPrincipal;    //1
let row;
let div1;
let textUbicacion;
let span1;
let div2;
let span;
let inputUbicacion;
let form;
let i;

let div3;     //2
let texttotalGatos;
let span3;
let div4;
let span4;
let i1;
let numGatos;

let row1;    //3
let div5;
let textCant;
let span5;
let div6;
let span6;
let i2;
let numTotalGatas;

let div7;    //4
let GatasCastradas;
let span7;
let div8;
let span8;
let i3;
let castradas;

let div9;    //5
let numGatasXCastrar;
let div10;
let span9;
let i4;
let numGatasNoCastradas;


let div11;


document.getElementsByTagName("div")[32].onclick=anyadirColonia;

function anyadirColonia()
{
    document.getElementsByTagName("label")[5].innerText = "";

    let botonDesactivar;
    botonDesactivar = document.getElementsByTagName("div")[32].style.display="none";

    form=document.getElementsByTagName("form")[0];

    divPrincipal=document.createElement("div");   //div principal                                    //1
    row=document.createElement("div");   //se crea row
    row.className="row";
    div1=document.createElement("div");
    div1.className="col-md-3 col-sm-6 mt-md-3 offset-md-2 mb-md-4";
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
    inputUbicacion.className="linea lineahazteVoluntario fondocaja";
    inputUbicacion.type="text";
    inputUbicacion.name="gatoCalle";
    inputUbicacion.id="gatoCalle";
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

    /*--------------------------------------------------------------------------------------------------------------------------*/

    div3=document.createElement("div");                                                               //2
    div3.className="col-md-3 col-sm-6 mt-md-3 mt-sm-4 offset-md-3 mb-md-4";
    texttotalGatos=document.createTextNode("Nº total de gatos/as de la colonia");
    texttotalGatos.className="textFormularioVoluntario";
    span3=document.createElement("span");
    span3.className="asterisco";
    span3.innerText="*";
    div4=document.createElement("div");
    div4.className="input-group";
    span4=document.createElement("span");
    span4.className="input-group-addon icono2";
    i1=document.createElement("i");
    i1.className="glyphicon glyphicon-edit";
    numGatos=document.createElement("input");
    numGatos.className="linea lineahazteVoluntario fondocaja";
    numGatos.type="text";
    numGatos.name="numTotalGatos";
    numGatos.id="numTotalGatos";
    numGatos.placeholder="nº total gat@s";

    row.appendChild(div3);
    div3.appendChild(texttotalGatos);
    div3.appendChild(span3);
    div3.appendChild(div4);
    div4.appendChild(span4);
    span4.appendChild(i1);
    div4.appendChild(numGatos);

    /*--------------------------------------------------------------------------------------------------------------------------*/

    row1=document.createElement("div");                               //3
    row1.className="row mb-md-5";
    div5=document.createElement("div");
    div5.className="col-md-2 mt-md-5 offset-md-2 mr-md-5";
    textCant=document.createTextNode("Cantidad de gatas");
    textCant.className="textFormularioVoluntario";
    span5=document.createElement("span");
    span5.className="asterisco";
    span5.innerText="*";
    div6=document.createElement("div");
    div6.className="input-group";
    span6=document.createElement("span");
    span6.className="input-group-addon icono2";
    i2=document.createElement("i");
    i2.className="glyphicon glyphicon-edit";
    numTotalGatas=document.createElement("input");
    numTotalGatas.className="linea lineaGatos fondocaja";
    numTotalGatas.type="text";
    numTotalGatas.name="numTotalgatas";
    numTotalGatas.id="numTotalgatas";
    numTotalGatas.placeholder="Número total de gatas en colonia";

    divPrincipal.appendChild(row1);
    row1.appendChild(div5);
    div5.appendChild(textCant);
    div5.appendChild(span5);
    div5.appendChild(div6);
    div6.appendChild(span6);
    span6.appendChild(i2);
    div6.appendChild(numTotalGatas);
    /*--------------------------------------------------------------------------------------------------------------------------*/

    div7=document.createElement("div");                                     //4
    div7.className="col-md-2 mt-md-5 offset-md-1 mr-md-4";
    GatasCastradas=document.createTextNode("Nº de gatas castradas");
    GatasCastradas.className="textFormularioVoluntario";
    span7=document.createElement("span");
    span7.className="asterisco";
    span7.innerText="*";
    div8=document.createElement("div");
    div8.className="input-group";
    span8=document.createElement("span");
    span8.className="input-group-addon icono2";
    i3=document.createElement("i");
    i3.className="glyphicon glyphicon-edit";
    castradas=document.createElement("input");
    castradas.className="linea lineaGatos fondocaja";
    castradas.type="text";
    castradas.name="numGatasCastradas";
    castradas.id="numGatasCastradas";
    castradas.placeholder="Número gatas castradas";

    row1.appendChild(div7);
    div7.appendChild(GatasCastradas);
    div7.appendChild(span7);
    div7.appendChild(div8);
    div8.appendChild(span8);
    span8.appendChild(i3);
    div8.appendChild(castradas);

    /*--------------------------------------------------------------------------------------------------------------------------*/

    div9=document.createElement("div");                        //5
    div9.className="col-md-2 mt-md-5 mb-md-3 offset-md-1";
    numGatasXCastrar=document.createTextNode("Nº de gatas por castrar");
    numGatasXCastrar.className="textFormularioVoluntario";
    div10=document.createElement("div");
    div10.className="input-group";
    span9=document.createElement("span");
    span9.className="input-group-addon icono2";
    i4=document.createElement("i");
    i4.className="glyphicon glyphicon-edit";
    numGatasNoCastradas=document.createElement("input");
    numGatasNoCastradas.className="linea lineaGatos fondocaja";
    numGatasNoCastradas.type="text";
    numGatasNoCastradas.name="numGatasNoCastradas";
    numGatasNoCastradas.id="numGatasNoCastradas";
    numGatasNoCastradas.placeholder="Nún gatas no castradas";

    row1.appendChild(div9);
    div9.appendChild(numGatasXCastrar);
    div9.appendChild(div10);
    div10.appendChild(span9);
    span9.appendChild(i4);
    div10.appendChild(numGatasNoCastradas);
}
