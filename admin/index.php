

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Proyecto</title>
    <style media="screen">
      .input-field input:focus + label{
        color: #ff9800 !important;
      }
      .row .input-field input:focus{
        border-bottom: 1px solid #ff9800 !important;
        box-shadow: 0 1px 0 0 #ff9800 !important;
      }
      .prefix{
        color: #ff9800 !important;
      }
      .btn {
        background-color: #ff9800;
      }
      .btn:hover {
        background-color: #ffcc80;
      }
    </style>
  </head>
  <body class="grey lighten-2">
    <main>
      <div class="row">
        <div class="input-field col s12 center">
          <img src="img/logo.jpg" width="200" class="circle">
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col s12">
            <div class="card z-depth-5">
              <div class="card-content">
                <span class="card-title"><center>Inicio de sesion</center></span>
                <form action="login/index.php" method="post" autocomplete="off">
                  <div class="input-field">
                    <i class="material-icons prefix">perm_identity</i>
                    <input type="text" name="usuario" id="usuario" required pattern="[A-Z]{8,15}" autofocus >
                    <label for="usuario">Usuario</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" name="contra" id="contra" required pattern="[A-Za-z0-9]{8,15}" >
                    <label for="contra">Contraseña</label>
                  </div>
                  <div class="input-field center">
                    <button type="submit" class="btn waves-effect waves-light">Acceder</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>

    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="js/materialize.min.js"></script>
  </body>
</html>
