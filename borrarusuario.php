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
      <form method="post" action="borrarusuario.php">
      <table>

      <?php
        $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $mysqli->connect_error);
          exit();
        }

    echo '<tr><td>IdUsuario: </td><td>'.$_GET['id'].'</td></tr>
          <tr><td>Nombre: </td><td>'.$_GET['nombre'].'</td></tr>
          <tr><td>Apellidos: </td><td>'.$_GET['apellidos'].'</td></tr>
          <tr><td>Correo: </td><td>'.$_GET['correo'].'</td></tr>
          <tr><td>Direccion: </td><td>'.$_GET['direccion'].'</td></tr>
          <tr><td>Ciudad: </td><td>'.$_GET['ciudad'].'</td></tr>
          <tr><td>Telefono: </td><td>'.$_GET['telefono'].'</td></tr>
      <tr><td></td><td><input type="submit" style="margin-bottom: 5px" value="Borrar"></td></tr>
      </table>
      </form>';

      ?>

      <?php else: ?>

        <?php

        $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");
        if ($connection->connect_error) {
          printf("Connection failed: %s\n", $mysqli->connect_error);
          exit();
        }

        $id=$_GET['id'];

        mysqli_query($connection,"DELETE FROM pedido WHERE id_usuario=$id");
        mysqli_query($connection,"DELETE FROM cesta WHERE id_usuario=$id");
        mysqli_query($connection,"DELETE FROM usuario WHERE id_usuario=$id");

        header('Location: listausuarios.php');

        ?>
      <?php endif ?>
      <a href="listausuarios.php"><button type="button" class="btn btn-danger">Cancelar</button>
  </body>
</html>
