



// document.getElementsByClassName("boton1")[0].onclick=enviar;
//
// function enviar()
// {
//     let usuario;
//     let apellidos;
//     let dni;
//     let dia;
//     let mes;
//     let anyo;
//     let direcc;
//     let num;
//     let place;
//     let mail;
//     let telf1;
//     let pass;
//     let colorBorde;
//
//     usuario = document.getElementById("usuario");
//     apellidos = document.getElementById("apellido");
//     dni = document.getElementById("dni");
//     dia = document.getElementsByTagName("select")[0];
//     mes = document.getElementsByTagName("select")[1];
//     anyo = document.getElementsByTagName("select")[2];
//     direcc = document.getElementById("direccion");
//     place = document.getElementsByTagName("select")[3];
//     num = document.getElementById("numero");
//     mail = document.getElementById("correo");
//     telf1 = document.getElementById("telefono1");
//     pass = document.getElementById("password1");
//
//     document.getElementById("visto1").style.width = "24px";   //nombre
//     document.getElementById("visto1").style.height = "24px";
//     document.getElementById("visto1").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto1").style.backgroundSize = "cover";
//
//     document.getElementById("visto2").style.width = "24px";   //apellidos
//     document.getElementById("visto2").style.height = "24px";
//     document.getElementById("visto2").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto2").style.backgroundSize = "cover";
//
//     document.getElementById("visto3").style.width = "24px";   //dni
//     document.getElementById("visto3").style.height = "24px";
//     document.getElementById("visto3").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto3").style.backgroundSize = "cover";
//
//     document.getElementById("visto4").style.width = "24px";  //dia,mes,anyo
//     document.getElementById("visto4").style.height = "24px";
//     document.getElementById("visto4").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto4").style.backgroundSize = "cover";
//
//     document.getElementById("visto5").style.width = "24px";
//     document.getElementById("visto5").style.height = "24px";
//     document.getElementById("visto5").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto5").style.backgroundSize = "cover";
//
//     document.getElementById("visto6").style.width = "24px";    //reside
//     document.getElementById("visto6").style.height = "24px";
//     document.getElementById("visto6").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto6").style.backgroundSize = "cover";
//
//     document.getElementById("visto7").style.width = "24px";    //mail
//     document.getElementById("visto7").style.height = "24px";
//     document.getElementById("visto7").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto7").style.backgroundSize = "cover";
//
//     document.getElementById("visto8").style.width = "24px";    //telef
//     document.getElementById("visto8").style.height = "24px";
//     document.getElementById("visto8").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto8").style.backgroundSize = "cover";
//
//     document.getElementById("visto9").style.width = "24px";    //password
//     document.getElementById("visto9").style.height = "24px";
//     document.getElementById("visto9").style.backgroundrepeat = "no-repeat";
//     document.getElementById("visto9").style.backgroundSize = "cover";
//
//     if (usuario.value == "") {
//         document.getElementById("visto1").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         usuario.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if (apellidos.value == "") {
//         document.getElementById("visto2").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         apellidos.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if (dni.value == "") {
//         document.getElementById("visto3").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         dni.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if (dia.value =="" || mes.value == "" || anyo.value == "") {
//         dia.style = "border-color:red;"
//         mes.style = "border-color:red;"
//         anyo.style = "border-color:red;"
//         document.getElementById("visto4").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         return colorBorde=1;
//     }
//
//     if (direcc.value == "") {
//         direcc.style = "border-color:red;"
//         direcc.style = "border-color:red;"
//         direcc.style = "border-color:red;"
//     }
//
//     if (num.value == "") {
//         num.style = "border-color:red;"
//         num.style = "border-color:red;"
//         num.style = "border-color:red;"
//     }
//
//     if (direcc.value == "" || num.value == "")
//     {
//         document.getElementById("visto5").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         return colorBorde=1;
//     }
//
//     if (place.value == "") {
//         document.getElementById("visto6").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         place.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if (mail.value== "") {
//         document.getElementById("visto7").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         mail.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if (telf1.value== "") {
//         document.getElementById("visto8").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         telf1.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if (pass.value== "") {
//         document.getElementById("visto9").style.backgroundImage = 'url("imagenes/vistoRojo.png")';
//         pass.style = "border-color:red;"
//         return colorBorde=1;
//     }
//
//     if(colorBorde!=1)
//     {
//         document.getElementById("button1").onclick=activarSegundoBoton;
//
//         function activarSegundoBoton()
//         {
//             alert("pasa");
//             document.getElementById("button1").style.display='none';
//             document.getElementById("boton2").style.display='inline';
//
//         }
//     }
// }
//
// /*-------------------------------- DATOS COLONIA  ----------------------------------*/
//
//
// function cambiarFondoUbicacionGatos()
// {
//     document.getElementById("gatoCalle").style.backgroundColor="#d1d1c6";
// }
//
// function cambiarFondoTotalGatos()
// {
//     document.getElementById("numTotalGatos").style.backgroundColor="#d1d1c6";
// }
//
// function cambiarFondoCantidadGatas()
// {
//     document.getElementById("numTotalgatas").style.backgroundColor="#d1d1c6";
// }
//
// function  cambiarFondoGatasCastradas()
// {
//     document.getElementById("numGatasCastradas").style.backgroundColor="#d1d1c6";
// }
//
// function cambiarFondoGastasNoCastradas()
// {
//     document.getElementById("numGatasNoCastradas").style.backgroundColor="#d1d1c6";
// }
//
//
//
// function cambiarFondoUbicacionGatosExpresionRegular(ubicacion)
// {
//     document.getElementById("visto11").style.width="24px";
//     document.getElementById("visto11").style.height="24px";
//     document.getElementById("visto11").style.backgroundrepeat="no-repeat";
//     document.getElementById("visto11").style.backgroundSize="cover";
//
//     if(ubicacion.value.match(/^[a-zA-Z]+\s[a-zA-Z]*$/))
//     {
//         document.getElementById("visto11").style.backgroundImage= 'url("imagenes/vistoVerde.png")';
//         ubicacion.style="border-color:#1CA421";
//     }else
//     {
//         document.getElementById("visto11").style.backgroundImage= 'url("imagenes/vistoRojo.png")';
//         ubicacion.style="border-color:red";
//     }
// }
//
// /*function cambiarFondoTotalGatosExpresionRegular(numeroTotal)
// {
//
//
//
// }*/
//
// /*------------------------------  gatosAdopcion ----------------------------*/
//
//
// function cambiarFondoNombreGato()
// {
//     document.getElementById("nombreGato").style.backgroundColor="#d1d1c6";
// }
//
// function cambiarFondoDescripGato()
// {
//     document.getElementById("descripcionGato").style.backgroundColor="#d1d1c6";
// }
//
//
// /*------------------------------  SOCIOS ----------------------------*/
//
// function  cambiarFondoCaja()
// {
//     document.getElementById("nombreGato").style.backgroundColor="#d1d1c6";
// }