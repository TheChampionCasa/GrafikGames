let fichero = new URL("http://localhost:3000/juegos")

function busqueda(){
  let nombre = document.getElementById("buscar").value;
  let row = document.getElementById("cuerpo");
  let col = row.getElementsByClassName("col-6");
    xhttp = new XMLHttpRequest();
    xhttp.open("GET",fichero,true);
    xhttp.onreadystatechange = function(){
      for(let i=0;i<col.length;i++){
          col[i].style.display="block";
      }
        if(this.readyState == 4 && this.status == 200){//We check that all is correct
          let datos = JSON.parse(this.responseText);//We create a variable and we parse the content of the json by responseText
          for(let objeto of datos){//We create a variable objeto where we put the data of the variable datos
              if(objeto.titulo==nombre){
                id = objeto.id;
                for(let i=0;i<col.length;i++){
                  if(id!=col[i].id){
                    col[i].style.display="none";
                    row.className="row border-top mt-5 productos justify-content-center"
                  }
                }
            }
          }
        }
      }
    xhttp.send();
}

function vacio(){
  let dato = document.getElementById("buscar").value;
  if(dato==""){
  location.reload()
  }
}

function cargar(){
  let row = document.getElementById("cuerpo");


  xhttp = new XMLHttpRequest();
  xhttp.open("GET",fichero,true);
  xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
          let datos = JSON.parse(this.responseText);
          let id=1;
        for(let objeto of datos){
          let col = document.createElement("div")
          let card = document.createElement("div");
          let card2 = document.createElement("div")
          let cardtitle = document.createElement("h3")
          // let cardtext = document.createElement("p")
          // let precio = document.createElement("p");
          // let vermas = document.createElement("button")
          // let comprar = document.createElement("button")
          let imagen = document.createElement("img")

          col.id=id++
          col.onclick = function() {
            location.href=objeto.link;
          };
          col.className="col-6 col-lg-3 mt-5"
          row.appendChild(col)
      
          card.className="product card bg-black h-100"
          card.style.color="white"
          col.appendChild(card);

          imagen.src = objeto.imagen
          imagen.className="rounded-2"
          card.appendChild(imagen)

          card2.className="card-body"
          card.appendChild(card2)
      
          cardtitle.appendChild(document.createTextNode(objeto.titulo))
          card2.appendChild(cardtitle);
      
          // cardtext.appendChild(document.createTextNode(objeto.descripcion))
          // if(objeto.titulo=="Hogwarts Legacy"){
          //   cardtext.style.fontSize="0.94em"
          // }
          // cardtext.className="card-text";
          // card2.appendChild(cardtext)
      
          // precio.appendChild(document.createTextNode(objeto.precio))
          // precio.className="price";
          // card2.appendChild(precio)
      
          // vermas.appendChild(document.createTextNode("Ver Mas"))
          // vermas.className="btn btn-purple h-100";
          // card2.appendChild(vermas)
      
          // comprar.appendChild(document.createTextNode("Comprar"))
          // comprar.className="addtocart btn btn-cyan h-100";
          // card2.appendChild(comprar)
        }
      }
  }
  xhttp.send();
}