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

    // Comprobamos si el nombre de usuario o la cuenta de correo ya existían
    $checkemail = mysql_query("SELECT correo FROM usuario WHERE correo='".$_POST['Email']."'" ) ;
    $email_exist = mysql_num_rows($checkemail);

    if ($email_exist>0) {
    echo "Esta cuenta de correo ya ha sido registrada";
            header("refresh:5; url=registro.php");
    }else{
            // Realizar una consulta MySQL
            $insert = "INSERT INTO usuario VALUE(NULL,'".$_POST['nombre']."'".","."'".$_POST['apellidos']."'".","."'".$_POST['Email']."'".","."'".$_POST['password']."'".","."'".$_POST['direccion']."'".","."'".$_POST['ciudad']."'".","."'".$_POST['telefono']."'".","."'user')";
            $result = mysql_query($insert) or die('Consulta fallida: ' . mysql_error());
            if ($result) {
            echo "Gracias por registrarte en Hookah Solid, en breve seras redirigido a la pagina principal";
            } else {
            echo "Faltan campos por rellenar";
            }

            // Cerrar la conexión
            mysql_close($link);

            header("refresh:5; url=index.php");
    }
    ?>
  </body>
</html>
