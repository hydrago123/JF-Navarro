<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_servicio'])){
		$id_servicio=(int) $_GET['id_servicio'];
		$delete=$con->prepare('DELETE FROM servicios WHERE id_servicio=:id_servicio');
		$delete->execute(array(
			':id_servicio'=>$id_servicio 
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>