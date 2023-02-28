function comprobarcorreo(){
    var correo;
    correo=document.getElementById("email").value;
    if(correo.indexOf("@")> -1){
        document.getElementById("textocorreo").style.display="none";
        document.getElementById("textocorreo").innerHTML="";
    }else{
        document.getElementById("textocorreo").style.display="block";
        document.getElementById("textocorreo").innerHTML="El correo no es valido";
    }
}
function comprobarcontraseña(){
    var contraseña,confirmarContraseña;
    contraseña=document.getElementById("contraseña").value;
    confirmarContraseña=document.getElementById("contraseña2").value;
    if(contraseña===confirmarContraseña){
        document.getElementById("contraseñacoincide").innerHTML="";
        document.getElementById("contraseñacoincide").style.display="none";
            if(/^(?=[A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]{8,12}$/gm.test(contraseña) ){
                document.getElementById("textoContraseña").innerHTML="";
                document.getElementById("textoContraseña").style.display="none";
            }else{
                document.getElementById("textoContraseña").style.display="block";
                document.getElementById("textoContraseña").innerHTML="La contraseña tiene que tener una longitud de 8 a 12 caracteres,1 numero y 1 letra";
            }
    }else{
        document.getElementById("contraseñacoincide").style.display="block";
        document.getElementById("contraseñacoincide").innerHTML="Las contraseñas no coinciden";
    }

}


function comprobarTarjeta(){
    let direccion,pais;
    direccion=document.getElementById("direccion").value;
    pais=document.getElementById("pais").value;
    if(direccion!=="" && pais!==""){
        document.getElementById("tarjeta").style.display="flex";
    }else{
        document.getElementById("tarjeta").style.display="none";
    }
}

