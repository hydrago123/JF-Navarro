<?php
// conexion.php es el archivo encargado de conectar con base de datos.
	$database="proyecto_final2";
	$user='root';
	$password='';


try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>