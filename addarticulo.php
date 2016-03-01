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
  else {
        header("Location: index.php");
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
    <title></title>
  </head>
  <body>
    <form id="registro" method="post" action="insert_articulo.php">
    <div class="container-fluid">
        <section class="container">
    		<div class="container-page">
    			<div class="col-md-6">
    				<h3 class="dark-grey">Introduce los datos del Producto</h3>

            <div class="form-group col-lg-6">
    					<label>Nombre (*)</label>
    					<input type="text" name="nombreprod" class="form-control" id="nombreprod" required>
    				</div>

    				<div class="form-group col-lg-6">
    					<label>Tipo (*)</label>
              <select class="form-control" id="ciudad" name="tipo" required>
                <option value='selecciona'>Selecciona</option>
                <option value='cachimba'>Cachimba</option>
                <option value='carbon'>Carbon</option>
                <option value='articulo'>Articulo</option>
              </select>
    				</div>

    				<div class="form-group col-lg-6">
    					<label>Precio (*)</label>
    					<input type="number" name="precio" class="form-control" id="precio" required>
    				</div>

            <div class="form-group col-lg-6">
              <label>Descripcion</label>
              <input type="text" name="descripcion" class="form-control" id="descripcion" required>
            </div>

            <div class="form-group col-lg-6">
              <label>Marca</label>
              <input type="text" name="marca" class="form-control" id="marca" required>
            </div>

    				<p><button type="submit" class="btn btn-primary">Añadir</button>
              <a href="listaarticulos.php" class="btn btn-danger" role="button">Volver</a>
            <p>Las casillas marcadas con (*) son obligatorias.

          </div>

    		</div>
    	</section>
    </div>
  </form>
  </body>
</html>
