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
    <?php  if (!isset($_POST['id'])) : ?>

      <h3 style="margin-bottom: 10px">Datos del Usuario</h3>
      <form method="post" action="editarusuario.php">
      <table>

      <?php
        $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $mysqli->connect_error);
          exit();
        }

        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $apellidos = $_GET['apellidos'];
        $correo = $_GET['correo'];
        $direccion = $_GET['direccion'];
        $ciudad = $_GET['ciudad'];
        $telefono = $_GET["telefono"];


    echo '<tr><td>Id Usuario</td><td><input type="text" name="Id" style="margin-bottom: 5px" value="'.$id.'" disabled></td></tr>
          <tr><td>Nombre</td><td><input type="text" name="Matricula" style="margin-bottom: 5px" value="'.$matricula.'" disabled></td></tr>
          <tr><td>Apellidos</td><td><input type="date" name="FechaIn" style="margin-bottom: 5px" value="'.$fechain.'"></td></tr>
          <tr><td>Correo</td><td><input type="number" name="Km" style="margin-bottom: 5px" value="'.$km.'"></td></tr>
          <tr><td>Direccion</td><td><input type="text" size="100" name="Averia" style="margin-bottom: 5px" value="'.$averia.'"></td></tr>
          <tr><td>Ciudad</td><td><input type="date" name="FechaOut" style="margin-bottom: 5px" value="'.$fechaout.'"></td></tr>
          <tr><td>Telefono</td><td><input type="text" size="100" name="Observaciones" style="margin-bottom: 5px" value="'.$observ.'"></td></tr>
      <tr><td></td><td><input type="submit" style="margin-bottom: 5px"></td></tr>
      </table>
      </form>';

      ?>

      <?php else: ?>

          <?php

          $id = $_POST['Id'];
          $nombre = $_POST['nombre'];
          $apellidos = $_POST['apellidos'];
          $correo = $_POST['correo'];
          $direccion = $_POST['direccion'];
          $ciudad = $_POST['ciudad'];
          $telefono = $_POST["telefono"];

              $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }

              $q="UPDATE usuario SET id_usuario='".$id ."',Matricula='".$matricul."', FechaEntrada='".$fechain."', Km='".$km."', Averia='".$averia."' ,FechaSalida='".$fechaout."' ,Observaciones='".$observ."' WHERE IdReparacion=$id";

              $result=$connection->query($q);

              if (!$result) {
                  echo ERROR;
              }

              unset($connection);
              header("Location: reparaciones.php");
          ?>
      <?php endif ?>
      <a href="listausuarios.php"><button type="button" class="btn btn-danger">Cancelar</button>
  </body>
</html>
