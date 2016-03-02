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
    session_start();

    if (isset($_POST["email"])) {

      include("conexion.php");

      $query = $connection->prepare("SELECT * FROM usuario
        WHERE correo=? AND password=md5(?)");

      $query->bind_param("ss",$_POST["email"],$_POST["password"]);

      if ($query->execute()) {

        $query->store_result();

          if ($query->num_rows===0) {

            echo "<div class='alert alert-danger' style='text-align: center'>";
            echo "<strong>Error!</strong> Usuario y/o Contraseña introducidos no validos";
            echo "</div>";

          } else {

            $_SESSION["email"]=$_POST["email"];
            $_SESSION["language"]="es";

            header("Location: index.php");
          }
      } else {
        echo "Wrong Query";
        var_dump($consulta);
      }
  }


  ?>

    <div id="main">
        <div id="cabecera">
            <div id="logo"><img src="img/logo.png"/></div>
            <div>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="index.php">Inicio</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="cachimba.php">Cachimbas</a></li>
                    <li><a href="carbones.php">Carbones</a></li>
                    <li><a href="accesorios.php">Accesorios</a></li>

                    <?php if(isset($_SESSION["email"])) : ?>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">

                          <?php
                          include("conexion.php");
                          $user=$_SESSION["email"];
                          $consulta = "SELECT SUM(cesta.cantidad) AS total FROM usuario, cesta WHERE usuario.id_usuario = cesta.id_usuario AND usuario.correo = '".$user."';";
                          if($result = $connection->query($consulta)){
                                $total=0;
                                if($result->num_rows==0){
                                }else{
                                    while($fila=$result->fetch_object()){
                                        $total=$total+$fila->total;
                                    }
                                }
                                echo "$total";
                          }
                           ?>

                        </span></a>
                          <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li class="divider"></li>
                            <li><a class="text-center" href="pedido.php">Ver Carro</a></li>
                          </ul>
                      </li>

                    <?php else : ?>

                    <?php endif ?>

                  </ul>

<?php if (!isset($_SESSION["email"])) : ?>

<form id="login" class="navbar-form navbar-right" role="form" method="post" action="index.php">
  <div class="input-group">
    <input id="email" type="email" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="input-group">
    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
  </div>
  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
  <a href="registro.php" class="btn btn-primary" role="button">Registrate</a>
</form>

<?php else: ?>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <strong><?php echo $_SESSION["email"]; ?></strong>
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
        <ul class="dropdown-menu">
          <li>
          <div class="navbar-login">
              <div class="row">
                  <div class="col-lg-12">
                      <p class="text-left">
                          <a href="perfil.php" class="btn btn-primary btn-block">Perfil</a>
                      </p>
                  </div>
              </div>
          </div>
          </li>
          <li>
          <div class="navbar-login">
              <div class="row">
                  <div class="col-lg-12">
                      <p class="text-left">
                          <a href="historialpedidos.php" class="btn btn-success btn-block">Pedidos</a>
                      </p>
                  </div>
              </div>
          </div>
          </li>
            <li class="divider"></li>
              <li>
                <div class="navbar-login navbar-login-session">
                  <div class="row">
                    <div class="col-lg-12">
                      <p>
                          <a href="logout.php" class="btn btn-danger btn-block">Cerrar Sesion</a>
                      </p>
                  </div>
                  </div>
                </div>
              </li>
          </ul>
        </li>
      </ul>

<?php endif ?>
                  </div>
                </div>
              </nav>
        </div>
      </div>
        <div id="contenido" style="height:auto">

          <?php
      include("conexion.php");

            if ($result = $connection->query("SELECT * FROM producto WHERE tipo='cachimba';")) {

                printf("<h2>CACHIMBAS</h2>");

            ?>

            <?php

                while($obj = $result->fetch_object()) {
                    echo "<div style='background-color:white; display:inline-block; margin-left:32px; text-align:center; margin-bottom:32px'>";
                    echo "<div><img src='img/".$obj->imagen."'></div>";
                    echo "<div><h4>".$obj->nombreprod."</h4></div>";
                    echo "<div><h3>".$obj->precio."€</h3></div>";
                    echo "<div>Descripcion:<p>".$obj->descripcion."</div>";

                    if (isset($_SESSION["email"])) {

                    echo "<div><a href='addcarrito.php?id=$obj->id_producto'><button type='button' class='btn btn-primary'>Añadir al Carro</button></a></div>";

                  } else {

                    echo "<div><button type='button' class='btn btn-primary'>Añadir al Carro</button></div>";

                  }

                    echo "</div>";
                }



                $result->close();
                unset($obj);
                unset($connection);


            }
          ?>


    </div>
  </body>
</html>
