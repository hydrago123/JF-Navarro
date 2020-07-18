<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM cliente ORDER BY id_cliente DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM cliente WHERE id_cliente LIKE :campo OR nombres LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}
// se inserta el html para la vista
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
		<h2>Clientes</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o email" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="../Loginnn/index2.php" class="btn btn__nuevo">Volver</a>
			
			
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id_cliente</td>
				<td>nombres</td>
				<td>apellidos</td>
                <td>email</td>
                <td>numero_telefonico</td>
				<td>tipodeusuario</td>
			</tr>
			<?php foreach($resultado as $fila):?>
			
				<tr>
					<td><?php echo $fila['id_cliente'];?></td>
					<td><?php echo $fila['nombres'];?></td>
					<td><?php echo $fila['apellidos']; ?></td>
                    <td><?php echo $fila['email']; ?></td>
                    <td><?php echo $fila['numero_telefonico']; ?></td>
                    <td><?php echo $fila['tipodeusuario']; ?></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>