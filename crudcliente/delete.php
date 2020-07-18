<?php 

// el archivo delete.php se encarga de borrar los usuarios en este caso de la tabla.
	include_once 'conexion.php';
	if(isset($_GET['id_cliente'])){
		$id_cliente=(int) $_GET['id_cliente'];
		$delete=$con->prepare('DELETE FROM cliente WHERE id_cliente=:id_cliente');
		$delete->execute(array(
			':id_cliente'=>$id_cliente
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>