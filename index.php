<?php include 'admin/conexion/conexion_web.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="admin/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>TuPrimerDepa.com</title>
</head>
<body class="blue-grey lighten-5">
<nav class="blue-grey" >
  <a href="index.php" class="brand-logo center">TuPrimerDepa.com</a>
</nav>

<div class="slider">
  <ul class="slides">
  <li>
        <img src="admin/inicio/slider/CECD6ADF-66D7-41BF-9115-C482B4056F04.JPEG"> <!-- random image -->
        <div class="caption center-align">
      </div>
    </li>
    <li>
        <img src="admin/inicio/slider/66752BD2-5DEB-4DA6-BA37-F782777B8421.JPEG"> <!-- random image -->
        <div class="caption left-align">
        </div>
      </li>
      <li>
        <img src="admin/inicio/slider/454845AA-8884-4F25-9FBF-669C1624E3D2.JPEG"> <!-- random image -->
        <div class="caption left-align">
        </div>
      </li>
  </ul>
</div>

<div class="row">
  <?php
  $sel_marc = $con->prepare("SELECT foto_principal,precio, estado, municipio, fraccionamiento,propiedad FROM inventario WHERE marcado = 'SI' ");
  $sel_marc->execute();
  $res_marc = $sel_marc->get_result();
  while ($f_marc =$res_marc->fetch_assoc()) {?>
  <div class="col s12 m6 l3">
    <div class="card">
      <div class="card-image">
        <img src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
        <span class="card-title"><?php echo '$'. number_format($f_marc['precio'], 2); ?></span>
      </div>
      <div class="card-content">
        <p><?php echo $f_marc['fraccionamiento'].' '.$f_marc['estado'].' '.$f_marc['municipio']; ?></p>
      </div>
      <div class="card-action">
        <a href="ver_mas.php?id=<?php echo $f_marc['propiedad'] ?>">Ver mas..</a>
      </div>
    </div>
  </div>
<?php }
$sel_marc->close();
 ?>
</div>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Buscador de inmuebles</span>
        <form  action="buscar.php" method="post">
          <div class="row">
            <div class="col s6">
              <select id="estado" name="estado" required="">
                <option value="" disabled selected>SELECCIONA UN ESTADO</option>
                <?php $sel_estado = $con->prepare("SELECT * FROM estados ");
                $sel_estado->execute();
                $res_estado = $sel_estado->get_result();
                while ($f_estado =$res_estado->fetch_assoc()) {?>
                <option value="<?php echo $f_estado['idestados'] ?>"><?php echo $f_estado['estado'] ?></option>
                <?php }
                $sel_estado->close();
                 ?>
              </select>
            </div>
            <div class="col s6">
              <div class="res_estado"></div>
            </div>
          </div>

          <div class="row">
            <div class="col s6">
              <select name="operacion" required  >
                <option value="" disabled selected  >ELIGE LA OPERACION</option>
                <option value="VENTA">VENTA</option>
                <option value="RENTA">RENTA</option>
                <option value="TRASPASO">TRASPASO</option>
                <option value="OCUPADO">OCUPADO</option>
              </select>
            </div>
            <div class="col s6">
              <select name="tipo_inmueble" required >
                <option value="" disabled selected  >ELIGE EL TIPO DE INMUEBLE</option>
                <option value="CASA">CASA</option>
                <option value="TERRENO">TERRENO</option>
                <option value="LOCAL">LOCAL</option>
                <option value="DEPARTAMENTO">DEPARTAMENTO</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col s6">
              <div class="input-field">
                <input type="number" name="rango1"  title=""  id="rango1" required  >
                <label for="rango1">Precio minimo</label>
              </div>
            </div>
            <div class="col s6">
              <div class="input-field">
                <input type="number" name="rango2"  title=""  id="rango2" required  >
                <label for="rango2">Precio maximo</label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn">Buscar inmueble</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Contacto</span>
        <div class="row">
          <div class="col s6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481728.804584038!2d-99.42380635078402!3d19.390519038362424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f932c627afe1%3A0x914f3df027515f27!2sMexico%20City%20Metropolitan%20Cathedral!5e0!3m2!1sen!2smx!4v1640004113850!5m2!1sen!2smx" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen class="z-depth-4"></iframe>
          </div>
          <div class="col s6">
            <div class="input-field">
              <input type="text" name="nombre" pattern="[A-Za-z/s ]+"  title=""  id="nombre" required >
              <label for="nombre">Nombre:</label>
            </div>
            <div class="input-field">
              <input type="text" name="asunto"   title=""  id="asunto"  >
              <label for="asunto">Asunto:</label>
            </div>
            <div class="input-field">
              <input type="email" name="correo"   title=""  id="correo" required  >
              <label for="correo">Correo:</label>
            </div>
            <div class="input-field">
              <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
              <label for="">Mensaje:</label>
            </div>
            <button type="button" class="btn" id="enviar">Enviar</button>
            <div class="resultado"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="page-footer blue-grey white-text center">
  Ingenieria de Software 3CM13
</footer>

  <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
  <script src="admin/js/materialize.min.js"></script>
  <script>
    $('.slider').slider();
    $('select').material_select();
    $('#estado').change(function() {
      $.post('admin/propiedades/ajax_muni.php',{
        estado:$('#estado').val(),

        beforeSend: function(){
          $('.res_estado').html("Espere un momento por favor..");
        }

      }, function(respuesta){
        $('.res_estado').html(respuesta);
      });
    });
    $('#enviar').click(function() {
      $.post('email.php',{
        nombre:$('#nombre').val(),
        asunto:$('#asunto').val(),
        correo:$('#correo').val(),
        mensaje:$('#mensaje').val(),
        id_propiedad:$('#id_propiedad').val(),

        beforeSend: function(){
          $('.resultado').html("Espere un momento por favor..");
        }

      }, function(respuesta){
        $('.resultado').html(respuesta);
      });
    });
  </script>
</body>
</html>
