<?php
// datos para la conexion a mysql
define('DB_SERVER','localhost');
define('DB_NAME','hookahsolid');
define('DB_USER','root');
define('DB_PASS','solidwork');

$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
mysql_select_db(DB_NAME,$con); 
?>
