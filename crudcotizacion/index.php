<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM cotizaciones ORDER BY id_cotizaciones  DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM cotizaciones WHERE id_cliente  LIKE :campo OR id_servicio  LIKE :campo;'
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
	<link rel="stylesheet" href="css/estiloo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Cotizaciones</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar id_cliente o id_servicio " 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
				<a href="../Loginnn/admin.php" class="btn btn__nuevo">Volver</a>

				<input type="button" value="Imprimir" onclick="window.print()" class="btn btn-secondary">
			
			
			</form>
		</div>
		<table>
			<tr class="head">
				<td>id_cotizaciones</td>
				<td>Nombre Cliente</td>
				<td>Nombre Servicio</td>
				<td>Nombre Insumo</td>
				<td>fecha_cotizacion</td>
				<td>valor</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr>
					<td><?php echo $fila['id_cotizaciones'];?></td>
					
		<?php 
			$query = $con -> prepare ("SELECT * FROM cliente");
           	$query->execute();
           	foreach ($query as $valores) {
           	if ($fila['id_cliente']==$valores['id_cliente']){
				   $doc=$valores['nombres'];
           	}
           
          }
		?>
		<td><?php echo $doc; ?></td>

		<?php 
			$query = $con -> prepare ("SELECT * FROM servicios");
           	$query->execute();
           	foreach ($query as $valores) {
           	if ($fila['id_servicio']==$valores['id_servicio']){
           		$servicio=$valores['nombre'];
           	}
           
          }
		  ?>
		  <td><?php echo $servicio; ?></td>

		  <?php 
				$query = $con -> prepare ("SELECT * FROM insumos");
           		$query->execute();
           		foreach ($query as $valores) {
           		if ($fila['id_insumo']==$valores['id_insumo']){
           			$insumo=$valores['descripcion'];
           	}
           
          }
		  ?>
		  <td><?php echo $insumo; ?></td>

		<td><?php echo $fila['fecha_cotizacion']; ?></td>
		<td><?php echo $fila['valor']; ?></td>

					<td><a href="update.php?id_cotizaciones=<?php echo $fila['id_cotizaciones']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_cotizaciones=<?php echo $fila['id_cotizaciones']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>