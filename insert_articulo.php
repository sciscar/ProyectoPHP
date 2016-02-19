<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
        //Compruebo que he recibido el parámetro por la query.
            $link = mysql_connect('localhost', 'root', 'solidwork')or die('No se pudo conectar: ' . mysql_error());
            mysql_select_db('hookahsolid') or die('No se pudo seleccionar la base de datos');

            $insert = "INSERT INTO producto VALUE(NULL,'".$_POST['nombreprod']."'".","."'".$_POST['tipo']."'".","."'".$_POST['precio']."'".","."'".$_POST['descripcion']."'".","."'".$_POST['marca']."'".",NULL)";
            $result = mysql_query($insert) or die('Consulta fallida: ' . mysql_error());
            if ($result) {
            echo "Producto Añadido";
            } else {
            echo "Faltan campos por rellenar";
            }

            // Cerrar la conexión
            mysql_close($link);

            header("refresh:3; url=listaarticulos.php");
    ?>
  </body>
</html>
