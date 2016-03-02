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
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
      $db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME']; //Openshift db name OPENSHIFT_MYSQL_DB_USERNAME
      $db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST']; //Openshift db host OPENSHIFT_MYSQL_DB_HOST
      $db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']; //Openshift db password OPENSHIFT_MYSQL_DB_PASSWORD
      $db_name="hookahsolid"; //Openshift db name
    } else {
      $db_user="solid"; //my db user
      $db_host="localhost"; //my db host
      $db_password="1234"; //my db password
      $db_name="hookahsolid"; //my db name
    }
        //Compruebo que he recibido el parámetro por la query.
            $link = mysql_connect($db_host,$db_user,$db_password)or die('No se pudo conectar: ' . mysql_error());
            mysql_select_db($db_name) or die('No se pudo seleccionar la base de datos');

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
