<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM insumos ORDER BY id_insumo  DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM insumos WHERE tipo_insumo  LIKE :campo OR destino_insumo LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

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
		<h2>Insumos</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar tipo_insumo o destino_insumo" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
				<a href="../Loginnn/admin.php" class="btn btn__nuevo">Volver</a>

				<input type="button" value="Imprimir" onclick="window.print()" class="btn btn-secondary">
			
			</form>
		</div>
		<table>
			<tr class="head">
				<td>id_insumo</td>
				<td>descripcion</td>
				<td>tipo_insumo</td>
				<td>destino_insumo</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_insumo'];?></td>
					<td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['tipo_insumo']; ?></td>
					<td><?php echo $fila['destino_insumo']; ?></td>
					<td><a href="update.php?id_insumo=<?php echo $fila['id_insumo']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_insumo=<?php echo $fila['id_insumo']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>