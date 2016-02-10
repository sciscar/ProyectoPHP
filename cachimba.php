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
                    <form id="signin" class="navbar-form navbar-right" role="form">
                      <div class="input-group">
                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email">
                      </div>
                      <div class="input-group">
                        <input id="password" type="password" class="form-control" name="password" value="" placeholder="Contraseña">
                      </div>
                      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
                      <a href="registro.php" class="btn btn-primary" role="button">Registrate</a>
                   </form>
                  </div>
                </div>
              </nav>
        </div>
      </div>
        <div id="contenido">
            <h2>CACHIMBAS</h2>
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
