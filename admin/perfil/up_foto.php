<?php include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nick = $_SESSION['nick'];
  $foto = $_SESSION['foto'];

  $extension = '';
  $ruta='foto_perfil';
  $archivo=$_FILES['foto']['tmp_name'];
  $nombrearchivo=$_FILES['foto']['name'];
  $info = pathinfo($nombrearchivo);
  if ($archivo !='') {
    $extension = $info['extension'];
    if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
      unlink('../usuarios/'.$foto);
      move_uploaded_file($archivo,'../usuarios/foto_perfil/'.$nick.'.'.$extension);
      $ruta = $ruta."/".$nick.'.'.$extension;
      $up = $con->query("UPDATE usuario SET foto='$ruta' WHERE nick='$nick' ");
      if ($up) {
        $_SESSION['foto'] = $ruta;
        header('location:../extend/alerta.php?msj=Foto de perfil actualizada&c=pe&p=in&t=success');
      }else {
        header('location:../extend/alerta.php?msj=La foto de perfil no pudo ser actualizada&c=pe&p=in&t=error');
      }
    }else {
      header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
      exit;
    }
  }else {
    header('location:../extend/alerta.php?msj=No se detecto ninguna foto para actualizar&c=pe&p=in&t=error');
  }



  $con->close();
  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=pe&p=in&t=error');
  }


?>
