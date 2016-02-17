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
            header("refresh:5; url=perfil.php");
    }else{
            // Realizar una consulta MySQL
            $insert = "UPDATE usuario SET id_usuario='".$id ."',nombre='".$matricula."', apellidos='".$fechain."', correo='".$km."', password='".$averia."' ,direcion='".$fechaout."' ,ciudad='".$observ."',telefono='".$observ."',permisos='".$observ."' WHERE id_usuario=$id";;
            $result = mysql_query($insert) or die('Consulta fallida: ' . mysql_error());
            if ($result) {
            echo "Tu perfil ha sido actualizado correctamente, en breve volveras a tu perfil..";
            } else {
            echo "Faltan campos por rellenar";
            }

            // Cerrar la conexión
            mysql_close($link);

            header("refresh:5; url=perfil.php");
    }
    ?>
  </body>
</html>
