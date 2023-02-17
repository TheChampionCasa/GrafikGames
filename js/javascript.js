var formulario;
formulario=document.getElementById("formulario");

function comprobarcorreo(){
    var correo;
    correo=document.getElementById("email").value;
    if(correo.indexOf("@")> -1){
        document.getElementById("textocorreo").style.display="none";
        document.getElementById("textocorreo").innerHTML="";
    }else{
        document.getElementById("textocorreo").style.display="block";
        document.getElementById("textocorreo").style.width="70%";
        document.getElementById("textocorreo").innerHTML="El correo no es valido";
    }
}
function comprobarcontraseña(){
    var contraseña,confirmarContraseña;
    contraseña=document.getElementById("contraseña").value;
    confirmarContraseña=document.getElementById("contraseña2").value;
    if(contraseña==confirmarContraseña){
        document.getElementById("contraseñacoincide").innerHTML="";
        document.getElementById("contraseñacoincide").style.display="none";
            if(/^(?=[A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]{8,12}$/gm.test(contraseña) ){
                document.getElementById("textoContraseña").innerHTML="";
                document.getElementById("textoContraseña").style.display="none";
            }else{
                document.getElementById("textoContraseña").style.display="block";
                document.getElementById("textoContraseña").style.width="70%";
                document.getElementById("textoContraseña").innerHTML="La contraseña tiene que tener una longitud de 8 caracteres,1 numero y 1 letra";
            }
    }else{
        document.getElementById("contraseñacoincide").style.display="block";
        document.getElementById("contraseñacoincide").style.width="70%";
        document.getElementById("contraseñacoincide").innerHTML="Las contraseñas no coinciden";
    }

}

function mostrarContraseña(){
    var mostrarContraseña, mostrarRepetirContraseña;
    mostrarContraseña=document.getElementById("contraseña");
    mostrarRepetirContraseña=document.getElementById("contraseña2");

    if(mostrarContraseña.type==="password" && mostrarRepetirContraseña.type==="password"){
        mostrarContraseña.type="text";
        mostrarRepetirContraseña.type="text";
    }else{
        mostrarContraseña.type="password";
        mostrarRepetirContraseña.type="password";
    }

}

formulario.addEventListener('submit', (e)=> {e.preventDefault()})


/*function comprobartarjeta(){
    var direccion,pais;
    direccion=document.getElementById("direccion").value;
    pais=document.getElementById("paises").value;
        if(direccion!="" && pais!="predeterminado"){
        document.getElementById("tarjeta").style.display='block';
        }else{
            document.getElementById("tarjeta").style.display='none';
        }
}*/
