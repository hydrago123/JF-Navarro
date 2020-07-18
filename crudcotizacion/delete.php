<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_cotizaciones'])){
		$id_cotizaciones=(int) $_GET['id_cotizaciones'];
		$delete=$con->prepare('DELETE FROM cotizaciones WHERE id_cotizaciones=:id_cotizaciones');
		$delete->execute(array(
			':id_cotizaciones'=>$id_cotizaciones
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>