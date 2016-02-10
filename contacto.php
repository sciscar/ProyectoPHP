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
    <form id="contacto" method="post">
    <div class="container-fluid">
        <section class="container">
    		<div class="container-page">
    			<div class="col-md-6">
    				<h2 class="dark-grey">Formulario de Contacto</h2>

            <div class="form-group col-lg-11">
    					<label>Email:</label>
    					<input type="Email" name="Email" class="form-control" id="Email">
    				</div>

            <div class="form-group">
              <label for="comment">Consulta:</label>
              <textarea class="form-control" rows="5" id="comentario"></textarea>
            </div>

    				<button type="submit" class="btn btn-primary">Enviar</button>
            <a href="index.php" class="btn btn-danger" role="button">Volver</a>
    		</div>
    	</section>
    </div>
  </form>
  </body>
</html>
