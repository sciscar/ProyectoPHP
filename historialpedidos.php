<?php
ob_start();
session_start();
if (isset($_SESSION["email"])) {

      include("conexion.php");
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
    <a href='index.php'><button type='button' class='btn btn-danger'>Volver Inicio</button></a>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Fecha</th>
        <th>Precio</th>
        <th></th>
    </thead>
<?php

    $user=$_SESSION["email"];
    $consulta="SELECT * FROM pedido,usuario WHERE pedido.id_usuario=usuario.id_usuario
 AND usuario.correo='".$_SESSION["email"]."'";

    if($result = $connection->query($consulta)){
          if($result->num_rows==0){
          }else{
              while($obj=$result->fetch_object()){
                echo "<tr align='center'>";
                echo "<td>".$obj->correo."</td>";
                echo "<td>".$obj->fecha."</td>";
                echo "<td>".$obj->preciototal."</td>";
                echo "<td><a href='detallespedido.php?id=$obj->id_pedido'><button type='button' class='btn btn-primary'>Ver Detalles</button></a></td>";
                echo "</tr>";
              }
          }
    }
     ?>
</table>

  </body>
  </html>
