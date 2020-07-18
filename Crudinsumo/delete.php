<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_insumo'])){
		$id_insumo=(int) $_GET['id_insumo'];
		$delete=$con->prepare('DELETE FROM insumos WHERE id_insumo=:id_insumo');
		$delete->execute(array(
			':id_insumo'=>$id_insumo 
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>