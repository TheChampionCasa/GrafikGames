let fichero = new URL("http://localhost:3000/specs")
let fichero2 = new URL("http://localhost:3000/foro")
function specs(){
  let ul = document.getElementById("lista");
  let nombre = document.getElementById("nombreSpecs").value;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET",fichero,true);
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){//We check that all is correct
          let datos = JSON.parse(this.responseText);//We create a variable and we parse the content of the json by responseText
          for(let objeto of datos){//We create a variable objeto where we put the data of the variable datos
              if(objeto.titulo==nombre){
                ul.innerHTML="";
                let minimos = objeto.minimos;
                let recomendados = objeto.recomendados;
                let ultra =  objeto.ultra;
                let specs = [minimos,recomendados,ultra];
                let dato = ["Minimos","Recomendados","Ultra"];
                for(let i=0;i<specs.length;i++){
                let li = document.createElement("li");
                li.appendChild(document.createTextNode(dato[i]))
                ul.appendChild(li)
                let ul2 = document.createElement("ul");
                li.appendChild(ul2);
                for(let j=0;j<specs[i].length;j++){
                let li1 = document.createElement("li");
                li1.appendChild(document.createTextNode(specs[i][j]))
                ul2.appendChild(li1)
                }
              }
            }
          }
        }
      }
    xhttp.send();
}

function escribirforo(){
  let ul = document.getElementById("foro");
  let mensaje = document.getElementById("mensaje");
  let p = document.createElement("p");
  
  const xhttp = new XMLHttpRequest();

  xhttp.open('POST',fichero2,true);//We open the Json 

  xhttp.setRequestHeader("Content-Type", "application/json");
  let msg = JSON.stringify({"id": 0 ,"mensaje": mensaje.value});// We create a new Json object by stringify
  xhttp.send(msg);//We send it

  p.appendChild(document.createTextNode(mensaje.value));
  ul.appendChild(p);
  mensaje.value="";
}

function cargarforo(){
  let ul = document.getElementById("foro");
  xhttp = new XMLHttpRequest();
  xhttp.open("GET",fichero2,true);
  xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        let datos = JSON.parse(this.responseText);
        for(let objeto of datos){
          let p = document.createElement("p");
          p.appendChild(document.createTextNode(objeto.mensaje));
          ul.appendChild(p);
        }
      }
    }
  xhttp.send();
}
