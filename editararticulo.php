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

    <?php if (isset($_GET['id'])) {

          $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");

            if ($connection->connect_errno) {
                printf("Conexion fallida: %s\n", $mysqli->connect_error);
                exit();
              }
                /* Consultas de selección que devuelven un conjunto de resultados */
                if ($result = $connection->query("SELECT * FROM producto WHERE id_producto=".$_GET['id'])) {

                  while($obj = $result->fetch_object()) {
                                      //PRINTING EACH ROW

                      echo "<div class='col-md-6'>";
                      echo "<form action='editararticulo.php' method='post'>";
                      echo "<div class='form-group col-lg-6'>Id Producto <input class='form-control' type='number' name='id' required value='".$obj->id_producto."' readonly></div>";
                      echo "<div class='form-group col-lg-6'>Nombre: <input class='form-control' type='text' name='nombre' required value='".$obj->nombreprod."'></div>";
                      echo "<div class='form-group col-lg-6'>Tipo: <select class='form-control' name='tipo' required>";
                      echo "<option value='cachimba'>Cachimba</option>";
                      echo "<option value='carbon'>Carbon</option>";
                      echo "<option value='accesorio'>Accesorio</option>";
                      echo "</select>";
                      echo "</div>";
                      echo "<div class='form-group col-lg-6'>Precio: <input class='form-control' type='number' name='precio' required value='".$obj->precio."'></div>";
                      echo "<div class='form-group col-lg-6'>Descripcion: <input class='form-control' type='text' name='descripcion' required value='".$obj->descripcion."'></div>";
                      echo "<div class='form-group col-lg-6'>Marca: <input class='form-control' type='text' name='marca' required value='".$obj->marca."'></div>";
                      echo "<div class='form-group col-lg-6'><input class='form-control' type='submit' name='guardar' value='Editar'></div>";
                      echo "</form>";
                      echo "<a href='listaarticulos.php'><button type='button' class='btn btn-danger'>Cancelar</button>";
                      echo "</div>";
                      echo "</div>";
                        }

                            $result->close();
                            unset($obj);
                            unset($connection);
                              }
                                }
                          if (isset($_POST["guardar"])){

                              $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");

                                  if ($connection->connect_errno) {
                                    printf("Conexion fallida: %s\n", $mysqli->connect_error);
                                    exit();
                                  }

                                $consulta="UPDATE producto SET id_producto='".$_POST['id']."', nombreprod='".$_POST['nombre']."',tipo='".$_POST['tipo']."',precio='".$_POST['precio']."',descripcion='".$_POST['descripcion']."',marca='".$_POST['marca']."' WHERE id_producto='".$_POST['id']."';";
                                   if ($connection->query($consulta)) {
                                     echo "<div class='alert alert-success'><strong>¡Hecho!</strong> La accion se ha realizado con exito.</div>";
                                    }
                                     $connection->close();
                                    header("refresh:2; url=listaarticulos.php");

                                    }
                                      ?>

  </body>
  </html>
