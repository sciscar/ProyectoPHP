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
    <form id="registro" method="post" action="insert_registro.php">
    <div class="container-fluid">
        <section class="container">
    		<div class="container-page">
    			<div class="col-md-6">
    				<h3 class="dark-grey">Introduce tus Datos</h3>

            <div class="form-group col-lg-6">
    					<label>Email (*)</label>
    					<input type="Email" name="Email" class="form-control" id="Email" required>
    				</div>

    				<div class="form-group col-lg-6">
    					<label>Repite Email (*)</label>
    					<input type="Email" name="Email" class="form-control" id="Email" required>
    				</div>

    				<div class="form-group col-lg-6">
    					<label>Contraseña (*)</label>
    					<input type="password" name="password" class="form-control" id="password" required>
    				</div>

    				<div class="form-group col-lg-6">
    					<label>Repite Contraseña (*)</label>
    					<input type="password" name="password" class="form-control" id="password" required>
    				</div>

            <div class="form-group col-lg-6">
              <label>Nombre (*)</label>
              <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>

            <div class="form-group col-lg-6">
              <label>Apellidos (*)</label>
              <input type="text" name="apellidos" class="form-control" id="apellidos" required>
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

    				<p><button type="submit" class="btn btn-primary">Registro</button>
              <a href="index.php" class="btn btn-danger" role="button">Volver Inicio</a>
            <p>Las casillas marcadas con (*) son obligatorias.

          </div>

    		</div>
    	</section>
    </div>
  </form>
  </body>
</html>
