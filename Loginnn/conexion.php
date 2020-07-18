<?php
// conexion con la base de datos.

		$mysqli = new MySQLi("localhost", "root","", "proyecto_final2");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else

?>