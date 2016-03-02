<?php
ob_start();
session_start();
if (isset($_SESSION["email"])) {

      include("conexion.php");
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
    <title>Hookah Solid</title>
    <link rel="shortcut icon" href="img/icono.png" type="image/png">
  </head>
  <body>
    <a href='index.php'><button type='button' class='btn btn-danger'>Volver Inicio</button></a>
    <a href='pedido.php?hacerpedido=yes'><button type='button' class='btn btn-success'>Realizar Pedido</button></a>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </thead>
<?php

    $user=$_SESSION["email"];
    $consulta = "SELECT * FROM usuario, cesta, producto WHERE usuario.id_usuario = cesta.id_usuario AND cesta.id_producto = producto.id_producto AND usuario.correo = '".$user."';";

    if($result = $connection->query($consulta)){
          if($result->num_rows==0){
          }else{
              while($obj=$result->fetch_object()){
                echo "<tr align='center'>";
                echo "<td>".$obj->nombreprod."</td>";
                echo "<td>".$obj->precio."</td>";
                echo "<td>".$obj->cantidad."</td>";
                echo "<td><a href='pedido.php?codproducto=".$obj->id_producto."'><button type='button' class='btn btn-danger'>Borrar Producto</button></a></td>";
                echo "</tr>";
              }
          }
    }
     ?>

</table>

     <?php
         if(isset($_GET["hacerpedido"])){
           include("conexion.php");
           $consultaRecuperarIdUsuario="SELECT id_usuario FROM usuario WHERE correo='".$_SESSION["email"]."'";
           $result= $connection->query($consultaRecuperarIdUsuario);
           $fila=$result->fetch_object();
           $idusuario=$fila->id_usuario;
           $consultaRecogerCestaUsuario="SELECT cesta.cantidad, producto.precio,producto.id_producto,cesta.id_producto
            FROM cesta,producto
            WHERE cesta.id_producto=producto.id_producto AND cesta.id_usuario='".$idusuario."'";
           if($result2=$connection->query($consultaRecogerCestaUsuario)){
             if($result2->num_rows==0){
               echo "No hay productos en la cesta para realizar el pedido";
             }else{
               $consultaPedido="INSERT INTO `pedido`(`id_usuario`, `fecha`, `preciototal`) VALUES ($idusuario,CURRENT_TIMESTAMP(),0)";
               $result= $connection->query($consultaPedido);
               $consultaRecuperarMaxIdPedido="SELECT *  FROM pedido ORDER BY id_pedido DESC LIMIT 1;";
               $result3= $connection->query($consultaRecuperarMaxIdPedido);
               $idNuevoPedido=0;
               while($f=$result3->fetch_object()){
                 $idNuevoPedido=$f->id_pedido;
               }
               echo $idNuevoPedido;
               $precioTotalPedido=0;
               while($fila=$result2->fetch_object()){
                 $consultaInsertDetallesLineaPedido="INSERT INTO `contiene`(`cantidad`, `id_pedido`, `id_producto`)
                  VALUES (".$fila->cantidad.",$idNuevoPedido,".$fila->id_producto.")";
                 $connection->query($consultaInsertDetallesLineaPedido);
                 $cant=$fila->cantidad;
                 $precio=$fila->precio;
                 $precioTotalPedido= $precioTotalPedido +($cant*$precio);
               }
               $connection->query("UPDATE pedido SET preciototal = $precioTotalPedido WHERE id_pedido=$idNuevoPedido");
               $connection->query("DELETE FROM cesta WHERE id_usuario=$idusuario");
               header("Location: historialpedidos.php");
             }
           }else{
             echo $connection->error;
           }
         }
     ?>

     <?php
         if(isset($_GET["codproducto"])){
           $idproducto=$_GET["codproducto"];
           include("conexion.php");
           $consultaRecuperarIdUsuario="SELECT id_usuario FROM usuario WHERE correo='".$_SESSION["email"]."'";
           $result= $connection->query($consultaRecuperarIdUsuario);
           $fila=$result->fetch_object();
           $idusuario=$fila->id_usuario;
           $consultaBorrarCesta="DELETE FROM cesta WHERE id_producto=$idproducto
           AND id_usuario=$idusuario";
           $connection->query($consultaBorrarCesta);
           echo  $connection->error;
           echo  $consultaBorrarCesta;
           header("Location: pedido.php");
         }
      ?>


  </body>
  </html>
