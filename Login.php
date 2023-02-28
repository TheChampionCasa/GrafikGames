<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="EstiloRegistro.css">

  </head>
  <style>
#cuenta{
    color: rgba(255, 255, 255, 0.9);
    font-size: 20px;
    font-weight: 500;
    padding: 0.5em 1.2em;
    background: linear-gradient(45deg, #2196f3, #ff4685);
    border: none;
    position: relative;
}

#cuenta:hover {
    color: rgba(255, 255, 255, 1);
    box-shadow: 0 4px 16px rgba(49, 138, 172, 1);
    transition: all 0.2s ease;
}
a{
display: flex;
justify-content: center;
text-decoration: none;
}

#parrafo{
  position: relative;
  margin-top: -12em;
  color: white;
}
#imagenGrafikGames1{
  margin-top:7em;
  margin-bottom: -2em;
  width: 25%;
}


  </style>
  <body>
    <div class="container">
      <div class="row">
          <?php
          if(isset($_GET["Registro"])&& $_GET["Registro"]==true){
              echo '<p style="color:green;justify-content:center;display:flex">Te has Registrado Correctamente. Ya puedes iniciar sesion</p>';
          }
          ?>
        <div class="col-12 imagenGrafik1">
          <a href="home.php"><img src="imgs/logoGrafikGames.png"  id="imagenGrafikGames1" alt="Logo de la Pagina"></a>
      </div>
    </div>
        <form action="CONTROL/ModeloControladorLogin.php" method="POST">
            <div class="form">
                <h1>
                    <span>Inicia sesión</span>
                    <i></i>
                </h1>
                
                <div class="col-12 input-box">
                    <input type="text" name="usuario" required>
                    <span>Usuario</span>
                    <i></i>
                </div>
                    
                <div class="col-12 input-box">
                    <input type="password" name="password" required>
                    <span>Contraseña</span>
                    <i></i>  
                </div>
                <?php
                if(isset($_GET['error'])&& $_GET['error']==1){
                    echo '<p style="color:red">Usuario o contraseña incorrectos</p>';
                }
                ?>
                <button class="col-6" id="botonEnviar" type="submit">Enviar</button>
            </div>
        </form>
            <h6 id="parrafo">¿No tienes cuenta? ¡¡Registrate!!</h6>
            <a href="registro.php"><button id="cuenta">Registrate</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>