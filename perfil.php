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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">0</span></a>
                          <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li class="divider"></li>
                            <li><a class="text-center" href="">Ver Carro</a></li>
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


                <?php
      include("conexion.php");
                    if(isset($_SESSION['email'])) {
                ?>

              <form id="perfil" method="post" action="actualizarperfil.php">
              <div class="container-fluid">
                  <section class="container" style="margin-top: 5px">
                  <div class="container-page">
                    <div class="col-md-6">

                      <div class="form-group col-lg-6">
                        <label>Email (*)</label>
                        <input type="Email" name="Email" class="form-control" id="Email" value="<?php echo $_SESSION["email"]; ?>" required>
                      </div>

                      <div class="form-group col-lg-6">
                        <label>Contraseña (*)</label>
                        <input type="password" name="password" class="form-control" id="password" value="" required>
                      </div>

                      <div class="form-group col-lg-6">
                        <label>Nombre (*)</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="" required>
                      </div>

                      <div class="form-group col-lg-6">
                        <label>Apellidos (*)</label>
                        <input type="text" name="apellidos" class="form-control" id="apellidos" value="" required>
                      </div>

                      <div class="form-group col-lg-6">
                        <label>Ciudad (*)</label>
                        <select class="form-control" id="ciudad" name="ciudad" required>
                          <option value='selecciona'>Selecciona</option>
                          <option value='ACoruna' >A Coruña</option>
                          <option value='Alava'>Álava</option>
                          <option value='Albacete' >Albacete</option>
                          <option value='Alicante'>Alicante</option>
                          <option value='Almeria' >Almería</option>
                          <option value='Asturias' >Asturias</option>
                          <option value='Avila' >Ávila</option>
                          <option value='Badajoz' >Badajoz</option>
                          <option value='Barcelona'>Barcelona</option>
                          <option value='Burgos' >Burgos</option>
                          <option value='Caceres' >Cáceres</option>
                          <option value='Cadiz' >Cádiz</option>
                          <option value='Cantabria' >Cantabria</option>
                          <option value='Castellon' >Castellón</option>
                          <option value='Ceuta' >Ceuta</option>
                          <option value='CiudadReal' >Ciudad Real</option>
                          <option value='Cordoba' >Córdoba</option>
                          <option value='Cuenca' >Cuenca</option>
                          <option value='Gerona' >Gerona</option>
                          <option value='Girona' >Girona</option>
                          <option value='LasPalmas' >Las Palmas</option>
                          <option value='Granada' >Granada</option>
                          <option value='Guadalajara' >Guadalajara</option>
                          <option value='Guipuzcoa' >Guipúzcoa</option>
                          <option value='Huelva' >Huelva</option>
                          <option value='Huesca' >Huesca</option>
                          <option value='Jaen' >Jaén</option>
                          <option value='LaRioja' >La Rioja</option>
                          <option value='Leon' >León</option>
                          <option value='Lleida' >Lleida</option>
                          <option value='Lugo' >Lugo</option>
                          <option value='Madrid' >Madrid</option>
                          <option value='Malaga' >Málaga</option>
                          <option value='Mallorca' >Mallorca</option>
                          <option value='Melilla' >Melilla</option>
                          <option value='Murcia' >Murcia</option>
                          <option value='Navarra' >Navarra</option>
                          <option value='Orense' >Orense</option>
                          <option value='Palencia' >Palencia</option>
                          <option value='Pontevedra'>Pontevedra</option>
                          <option value='Salamanca'>Salamanca</option>
                          <option value='Segovia' >Segovia</option>
                          <option value='Sevilla' >Sevilla</option>
                          <option value='Soria' >Soria</option>
                          <option value='Tarragona' >Tarragona</option>
                          <option value='Tenerife' >Tenerife</option>
                          <option value='Teruel' >Teruel</option>
                          <option value='Toledo' >Toledo</option>
                          <option value='Valencia' >Valencia</option>
                          <option value='Valladolid' >Valladolid</option>
                          <option value='Vizcaya' >Vizcaya</option>
                          <option value='Zamora' >Zamora</option>
                          <option value='Zaragoza'>Zaragoza</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-6">
                        <label>Direccion (*)</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" required>
                      </div>

                      <div class="form-group col-lg-6">
                        <label>Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" maxlength="9">
                      </div>

                      <p><button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                      <p>Las casillas marcadas con (*) son obligatorias.

                    </div>

                    <div>
                      <h4 style="margin-botton:-10px">Zona Administración</h4>
                      <a href="listausuarios.php" class="btn btn-warning">Lista Usuarios</a>
                      <a href="listaarticulos.php" class="btn btn-warning">Lista Articulos</a>
                      <p>(Solo podras acceder si eres administrador)</p>

                    </div>

                  </div>
                </section>
              </div>
            </form>

            <?php
                }else {
                    echo "<h2>Estás accediendo a una página restringida, para ver su contenido debes estar registrado</h2>";
                }
            ?>

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
