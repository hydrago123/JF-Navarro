<?php 

// el archivo delete.php se encarga de borrar los usuarios en este caso de la tabla.
	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM usuarios WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>