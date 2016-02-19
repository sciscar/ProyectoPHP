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

        if ($result = $connection->query("SELECT * FROM producto;")) {

            printf("<h2>PRODUCTOS</h2>");
            printf("<a href='addarticulo.php'><button type='button' class='btn btn-primary'>Añadir Articulo</button></a>");
            printf("<a href='index.php'><button type='button' class='btn btn-danger'>Volver Inicio</button></a>");

        ?>

            <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Marca</th>
                <th>Editar</th>
                <th>Borrar</th>
            </thead>

        <?php

            while($obj = $result->fetch_object()) {
                echo "<tr align='center'>";
                echo "<td>".$obj->id_producto."</td>";
                echo "<td>".$obj->nombreprod."</td>";
                echo "<td>".$obj->tipo."</td>";
                echo "<td>".$obj->precio."</td>";
                echo "<td>".$obj->descripcion."</td>";
                echo "<td>".$obj->marca."</td>";
                echo "<td><a href='editararticulo.php?id=$obj->id_producto'><button type='button' class='btn btn-primary'>Editar</button></a></td>";
                echo "<td><a href='borrararticulo.php?id=$obj->id_producto'><button type='button' class='btn btn-danger'>Borrar</button></a></td>";
                echo "</tr>";
            }



            $result->close();
            unset($obj);
            unset($connection);


        }
      ?>

    </body>
</html>
