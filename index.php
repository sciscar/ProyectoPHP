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

      $connection = new mysqli("localhost", "root", "solidwork", "hookahsolid");

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      $query = $connection->prepare("SELECT correo, password, permisos FROM usuario
        WHERE correo=? AND password=md5(?)");

      $query->bind_param("ss",$_POST["email"],$_POST["password"]);

      if ($query->execute()) {

        $query->store_result();
        $query->bind_result($correo,$password,$permisos);

        while ($query->fetch()) {
          $p=$permisos;
        }

          if ($query->num_rows===0) {

            echo "<div class='alert alert-danger' style='text-align: center'>";
            echo "<strong>Error!</strong> Usuario y/o Contraseña introducidos no validos";
            echo "</div>";

          } else {

            $_SESSION["email"]=$_POST["email"];
            $_SESSION["permisos"]=$p;
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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">0</span></a>
                          <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li class="divider"></li>
                            <li><a class="text-center" href="pedido.php">Ver Carro</a></li>
                          </ul>
                      </li>
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
        <div id="contenido">
            <h2>PRODUCTOS</h2>
            <ul id="contenido1">
                <li><a href="cachimba.php"><div>
                <img src="img/hookah.png" width="120px" height="120px"/>
                </div>
                    <div><a href="cachimba.php">
                        <p id="headcont">CACHIMBAS</p>
                        <p id="bodycont">Primeras marcas en cachimbas de alta calidad</p>
                    </div></a>
                </li>
                <li><a href="carbones.php"><div>
                <img src="img/carbon.jpg"/ width="120px" height="120px">
                </div>
                    <div>
                        <p id="headcont">CARBONES</p>
                        <p id="bodycont">Carbones naturales de gran calidad</p>
                    </div></a>
                </li>
                <li><a href="accesorios.php"><div>
                <img src="img/cazoleta.png"/ width="120px" height="120px">
                </div>
                    <div>
                        <p id="headcont">ACCESORIOS</p>
                        <p id="bodycont">Mangueras, cazoletas, pinzas, hornillos, etc..</p>
                    </div></a>
                </li>
            </ul>
            <div id="boton"><img src="img/logo.png"/></div>
        </div>
        <div id="pie">
            <ul id="listapie">
                <li><a href="index.php">
                    <div id="iconpie">
                    <img src="img/productos.png">
                    </div>
                    <div id="contpie">Productos<p> </p></div>
                </a></li>
                <li><a href="info.php">
                    <div id="iconpie">
                    <img src="img/informacion.png">
                    </div>
                    <div id="contpie">Información<p> </p></div>
                </a></li>
                <li>
                    <div id="iconpie">
                    <img src="img/entrega.png">
                    </div>
                    <div id="contpie">Entrega en<br/><p>24/48 Horas</p></div>
                </li>
                <li>
                    <div id="iconpie">
                    <img src="img/envio.png">
                    </div>
                    <div id="contpie">Envio Gratis<p>desde 75€</p></div>
                </li>
                <li>
                    <div id="iconpie">
                    <img src="img/pago.png">
                    </div>
                    <div id="contpie">Pago 100%<p>Seguro</p></div>
                </li>
                <li>
                    <div id="iconpie">
                    <img src="img/calidad.png">
                    </div>
                    <div id="contpie">Calidad<p>Asegurada</p></div>
                </li>
                <li><a href="contacto.php">
                    <div id="iconpie">
                    <img src="img/contacta.png">
                    </div>
                    <div id="contpie">Contacta con<p>Nosotros</p></div>
                </a></li>
            </ul>
        </div>
    </div>
  </body>
</html>
