<?php
ob_start();
session_start();
if (isset($_POST["email"])) {

      include("conexion.php");
}
  if (!empty($_SESSION["permisos"])){
      if ($_SESSION["permisos"]=="user") {
        header("Location: index.php");
      }
  }
  else {
        header("Location: index.php");
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Hookah Solid</title>
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
  </head>
  <body>

    <?php if (isset($_GET['id'])) {

      include("conexion.php");
                /* Consultas de selección que devuelven un conjunto de resultados */
                if ($result = $connection->query("SELECT * FROM usuario WHERE id_usuario=".$_GET['id'])) {

                  while($obj = $result->fetch_object()) {
                                      //PRINTING EACH ROW

                      echo "<div class='col-md-6'>";
                      echo "<form action='editarusuario.php' method='post'>";
                      echo "<div class='form-group col-lg-6'>Id Usuario <input class='form-control' type='number' name='id' required value='".$obj->id_usuario."' readonly></div>";
                      echo "<div class='form-group col-lg-6'>Permisos: <select class='form-control' name='permiso' required>";
                      echo "<option value='user'>User</option>";
                      echo "<option value='Admin'>Admin</option>";
                      echo "</select>";
                      echo "</div>";
                      echo "<div class='form-group col-lg-6'>Nombre: <input class='form-control' type='text' name='nombre' required value='".$obj->nombre."'></div>";
                      echo "<div class='form-group col-lg-6'>Apellidos: <input class='form-control' type='text' name='apellidos' required value='".$obj->apellidos."'></div>";
                      echo "<div class='form-group col-lg-6'>Correo: <input class='form-control' type='email' name='correo' required value='".$obj->correo."'></div>";
                      echo "<div class='form-group col-lg-6'>Direccion: <input class='form-control' type='text' name='direccion' required value='".$obj->direccion."'></div>";
                      echo "<div class='form-group col-lg-6'>Ciudad: <input class='form-control' type='text' name='ciudad' required value='".$obj->ciudad."'></div>";
                      echo "<div class='form-group col-lg-6'>Telefono: <input class='form-control' type='text' name='telefono' value='".$obj->telefono."'></div>";
                      echo "<div class='form-group col-lg-6'><input class='form-control' type='submit' name='guardar' value='Editar'></div>";
                      echo "</form>";
                      echo "<a href='listausuarios.php'><button type='button' class='btn btn-danger'>Cancelar</button>";
                      echo "</div>";
                      echo "</div>";
                        }

                            $result->close();
                            unset($obj);
                            unset($connection);
                              }
                                }
                          if (isset($_POST["guardar"])){

      include("conexion.php");

                                $consulta="UPDATE usuario SET id_usuario='".$_POST['id']."', permisos='".$_POST['permiso']."',nombre='".$_POST['nombre']."',apellidos='".$_POST['apellidos']."',correo='".$_POST['correo']."',telefono='".$_POST['telefono']."',direccion='".$_POST['direccion']."' WHERE id_usuario='".$_POST['id']."';";
                                   if ($connection->query($consulta)) {
                                     echo "<div class='alert alert-success'><strong>¡Hecho!</strong> La accion se ha realizado con exito.</div>";
                                    }
                                     $connection->close();
                                    header("refresh:2; url=listausuarios.php");

                                    }
                                      ?>

  </body>
  </html>
