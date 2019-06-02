
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
    alert("Se ha dado usted de baja");
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

