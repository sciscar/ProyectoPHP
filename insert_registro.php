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
