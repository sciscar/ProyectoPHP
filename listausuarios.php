<?php
ob_start();
session_start();
if (isset($_POST["email"])) {

  $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");

  if ($connection->connect_errno) {
      printf("Connection failed: %s\n", $connection->connect_error);
      exit();
  }
}
  if (!empty($_SESSION["permisos"])){
      if ($_SESSION["permisos"]=="user") {
        header("Location: index.php");
      }
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
      <?php
      $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $mysqli->connect_error);
            exit();
        }

        if ($result = $connection->query("SELECT * FROM usuario;")) {

            printf("<h2>USUARIOS REGISTRADOS</h2>");
            printf("<a href='index.php'><button type='button' class='btn btn-danger'>Volver Inicio</button></a>");

        ?>

            <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id Usuario</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Telefono</th>
                <th>Permisos</th>
                <th>Editar</th>
                <th>Borrar</th>
            </thead>

        <?php

            while($obj = $result->fetch_object()) {
                echo "<tr align='center'>";
                echo "<td>".$obj->id_usuario."</td>";
                echo "<td>".$obj->correo."</td>";
                echo "<td>".$obj->nombre."</td>";
                echo "<td>".$obj->apellidos."</td>";
                echo "<td>".$obj->direccion."</td>";
                echo "<td>".$obj->ciudad."</td>";
                echo "<td>".$obj->telefono."</td>";
                echo "<td>".$obj->permisos."</td>";
                echo "<td><a href='editarusuario.php?id=$obj->id_usuario'><button type='button' class='btn btn-primary'>Editar</button></a></td>";
                echo "<td><a href='borrarusuario.php?id=$obj->id_usuario'><button type='button' class='btn btn-danger'>Borrar</button></a></td>";
                echo "</tr>";
            }



            $result->close();
            unset($obj);
            unset($connection);


        }
      ?>

    </body>
</html>
