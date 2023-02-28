<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafik Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
          background-image: url(imgs/background.png);
        }
        h2,h4{
          color: white;
          text-align: center;
        }
        a{
          color: white;
        }
        .img{
          display: block;
          margin-left: auto;
          margin-right: auto;
          width:3em;
        }
        #cuenta{
          color: rgba(255, 255, 255, 0.9);
          font-size: 20px;
          font-weight: 500;
          padding: 0.5em 1.2em;
          background-color: rgba(0, 0, 255, 0);
          border: none;
          position: relative;
        }

        #cuenta:hover {
          color: rgba(255, 255, 255, 1);
          transition: all 0.2s ease;
        }
        a{
          color: white;
          text-decoration: none;
        }
        a:hover{
          color: white;
        }
        .modal-header,.modal-body,.modal-footer{
            background-image: url("imgs/background.png");
        }
        .textomodal,.cart-container{
            color: white;
        }
        .bg-cyan,.btn-cyan{
            background-color: cyan;
        }
        .bg-purple,.btn-purple{
            background-color: rgb(255, 0, 255);
            color: white;
        }
        /*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
    </style>
  </head>
  <body onload="cargar()">
    <div class="container mt-3">


        <div class="row  align-items-center"><!--header-->
            <div class="col col-lg-2 d-none d-md-block"> <img src="imgs/logoGrafikGames (1).png" alt=""></div><!--logo-->

            <div class="col col-lg-8 text-center"><img src="imgs/GrafikLetras.png" alt=""></div><!--Nombre-->
            <div class="col col-lg-2 text-center">
                          <?php
                            if(isset($_COOKIE["Usuario"])){
                                echo '<figure class="figure">';
                                echo '<img src="'.$_COOKIE["ImagenUsuario"].'" class="figure-img img-fluid rounded-5">';
                                echo '<figcaption class="figure-caption"><h3 style="color:white">'.$_COOKIE["Usuario"].'</h3></figcaption>';
                                echo '<figcaption class="figure-caption"><a href="?cookiedestroy"><button type="button" class="btn btn-cyan w-auto">Cerrar Sesion</button></a></figcaption>';
                                echo '</figure>';
                            }else{
                                echo '<figure class="figure">';
                                echo '<a href="Login.php"><img src="imgs/Login.png" class="figure-img img-fluid rounded"></a>';
                                echo '<figcaption class="figure-caption"><button id="cuenta"><a href="Login.php">Login</a></button></figcaption>';
                                echo '</figure>';
                            }
                            if(isset($_GET["cookiedestroy"])){
                                setcookie("Usuario","",time()-3600,"/");
                                setcookie("ImagenUsuario","",time()-3600,"/");
                                header("Location:tienda.php");
                            }
                          ?>
            </div><!--Login en algun momento-->
        </div>
        <div class="row"><!--Navegador-->
            
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="home.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Link</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="tienda.php">Tienda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Desplegable
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a href="#" class="dropdown-item">Link 1</a></li>
                            <li><a href="#" class="dropdown-item">Link 2</a></li>
                            <li><a href="#" class="dropdown-item">Link 3</a></li>
                        </ul>
                      </li>
                  </ul>
                  <form autocomplete="on" class="d-flex">
                    <div class="autocomplete" style="width:300px;">
                    <input onblur="vacio()" id="buscar" type="text" class=" form-control me-2 h-100" placeholder="Busqueda">
                    </div>
                    <button type="button" class="btn btn-outline-success" style="margin-left: 1em;" onclick="busqueda()">Buscar</button>
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#carrito" aria-expanded="false" aria-controls="collapseExample">
                        <img src="imgs/shopping-cart.png" alt="">
                        <span class="badge text-bg-primary" id="cartitems">0</span>
                    </button>
                </form>
                </div>
              </nav>
        </div>

        <div class="collapse" id="carrito"><!--Carrito-->
        <div class="row border-top">
            <div class="col mt-5">
                <div class="cart-container d-flex flex-column">
                    <h2>Carrito</h2>
                    <table>
                      <thead>
                        <tr>
                        <th><strong>Producto</strong></th>
                        <th><strong>Precio</strong></th>
                      </tr>
                      </thead>
                      <tbody id="carttable">
                      </tbody>
                    </table>
                    <hr>
                    <table id="carttotals">
                      <tr>
                        <td><strong>Productos</strong></td>
                        <td><strong>Total</strong></td>
                      </tr>
                      <tr>
                        <td>x <span id="itemsquantity">0</span></td>
                       
                        <td><span id="total">0</span>€</td>
                      </tr></table>
            
                      
                    <div class="cart-buttons d-flex justify-content-center">  
                      <button id="emptycart" class="btn bg-purple">Vaciar Carrito</button>
                      <button id="checkout"  class="btn bg-cyan">Pagar</button>
                    </div>
                  </div>
            </div>
        </div>
        </div>
        <div id="cuerpo" class="row border-top mt-5"><!--Cuerpo de la pagina-->
        <div id="alerts" style="color: white;"></div>
        </div>
        <div class="row mt-5 border-top"><!--Footer-->
            <div class="col-4 mt-5"><!--Contacto-->
                <h4>Contacto</h4>
                <ul class="mt-4">
                    <li style="color: white;">Carr. de Guadarrama, 85, 28260 Galapagar, Madrid</li>
                    <li style="color: white;">Email de contacto: Informacion@Grafik.com</li>
                    <li style="color: white;">Telefono: 123456789</li>
                </ul>
            </div>

            <div class="col-4 mt-5"><!--Info-->
                <h4>Informacion de Nuestra Empresa</h4>
                <ul>
                    <li style="color: white;">Acerca De:</li>
                    <li style="color: white;">Poltica De Privacidad</li>
                    <li style="color: white;">Actualizaciones de la Pagina</li>
                </ul>

            </div>

            <div class="col-4 mt-5"><!--Redes Sociales-->
                <h4>Redes Sociales</h4>
                <ul class="mt-4">
                    <li style="color: white;">Instagram</li>
                    <li style="color: white;">Twitter</li>
                    <li style="color: white;">Tik Tok</li>
                    <li style="color: white;">Facebook</li>
                </ul>
            </div>
        </div>    
        <div class="row mt-5 border-top border-bottom">
            <div class="col-2 mt-3 mb-3">
                <img class="img" src="imgs/grafik Presentacion.png" alt="Logo Grafik">
            </div>
            <div class="col-10 mt-3 mb-3">
                <h6 style="color: white; background-color: black;">© 2023 Grafik S.L. Todos los derechos reservados. Todas las marcas registradas pertenecen a sus respectivos dueños en España y otros países.
                    Todos los precios incluyen IVA (donde sea aplicable).</h4>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<!-- <script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script> -->
<script src="js/tienda.js"></script>
<script src="js/carrito.js"></script>
  </body>
</html>
