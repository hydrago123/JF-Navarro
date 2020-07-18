<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM usuarios ORDER BY Id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM usuarios WHERE id LIKE :campo OR user LIKE :campo;'
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
		<h2>Usuarios</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o email" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
				<a href="../Loginnn/admin.php" class="btn btn__nuevo">Volver</a>

				<input type="button" value="Imprimir" onclick="window.print()" class="btn btn-secondary">
			
			
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>user</td>
				<td>password</td>
				<td>email</td>
				<td>rol</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
			
				<tr>
					<td><?php echo $fila['id'];?></td>
					<td><?php echo $fila['user'];?></td>
					<td><?php echo $fila['password']; ?></td>
					<td><?php echo $fila['email']; ?></td>
					<td><?php echo $fila['rol']; ?></td>
					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>