let fichero = new URL("https://my-json-server.typicode.com/Pcb1230/GrafikGames/specs")
let fichero2 = new URL("https://my-json-server.typicode.com/Pcb1230/GrafikGames/foro")
var juegos = [];

function cargarspecs(){
  xhttp = new XMLHttpRequest();
  xhttp.open("GET",fichero,true);
  xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){//We check that all is correct
        let datos = JSON.parse(this.responseText);//We create a variable and we parse the content of the json by responseText
        for(let objeto of datos){//We create a variable objeto where we put the data of the variable datos
          juegos.push(objeto.titulo)
        }
      }
    }
  xhttp.send();
}
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



function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("nombreSpecs"), juegos);