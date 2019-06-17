
document.getElementById("buttonEditar").onclick=desactivarOnread;


function desactivarOnread()
{
    let numInputs=document.getElementsByTagName("input");
    for(let i=0;i<numInputs.length;i++)
    {
        numInputs[i].readOnly=false;
    }

    let datosColonia=document.getElementsByClassName("colonia");

    for(let j=0;j<datosColonia.length;j++)
    {
        datosColonia[j].readOnly=false;
    }
}

document.getElementById("buttonGuardarCambios").onclick=buttonGuardarCambios;

function buttonGuardarCambios()
{
    let numInputs=document.getElementsByTagName("input");
    for(let i=0;i<numInputs.length;i++)
    {
        numInputs[i].readOnly=true;
    }
}

