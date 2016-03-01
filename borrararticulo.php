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
      include("conexion.php");
    $link=$_GET["id"];

    $delete1="DELETE FROM producto WHERE id_producto='$link'";
    $delete2="DELETE FROM cesta WHERE id_producto='$link'";
    $delete3="DELETE FROM contiene WHERE id_producto='$link'";

    $connection->query($delete1);
    $connection->query($delete2);
    $connection->query($delete3);

    header("refresh:0; url=listaarticulos.php");
    ?>
  </body>
</html>
