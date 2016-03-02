
<?php
      include("conexion.php");
      session_start();
                    if(isset($_GET["id"])){
                      $idproducto=$_GET["id"];
                      $consultaUser="SELECT id_usuario FROM usuario WHERE correo='".$_SESSION["email"]."'";
                      $result=$connection->query($consultaUser);
                      $fila=$result->fetch_object();
                      $idUsuarioLogeado=$fila->id_usuario;
                      $consulta = "SELECT * FROM cesta,producto WHERE cesta.id_producto = producto.id_producto AND cesta.id_usuario = $idUsuarioLogeado AND cesta.id_producto = $idproducto";
                      if($result = $connection->query($consulta)){
                          if($result->num_rows==0){
                            $consultaInsertarCesta = "INSERT INTO cesta VALUES(".$idUsuarioLogeado.",".$idproducto.",1)";
                            $connection->query($consultaInsertarCesta);
                            header("Location: index.php");
                          }else{
                            $consultaActualizarProductoCesta = "UPDATE cesta SET cantidad = (cantidad + 1) WHERE id_producto = $idproducto AND id_usuario = $idUsuarioLogeado";
                            $connection->query($consultaActualizarProductoCesta);
                            header("Location: index.php");

                          }

                        }
                        else {
                          echo $connection->error;
                        }
                    }

?>
