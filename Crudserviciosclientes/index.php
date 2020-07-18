<?php
	include_once 'conexion.php';

	$sentencia_select= $con	->prepare('SELECT *FROM servicios ORDER BY id_servicio  DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM servicios WHERE nombre LIKE :campo OR nombre LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}
//<a href="insert.php" class="btn btn__nuevo">Nuevo</a> linea 40
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="csss/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Servicios</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o nombre" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				
				<a href="../Loginnn/index2.php" class="btn btn__nuevo">Volver</a>
			
			</form>
		</div>
		<table>
			<tr class="head">
				<td>id_servicio</td>
				<td>nombre</td>
				

			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_servicio'];?></td>
					<td><?php echo $fila['nombre']; ?></td>

				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>