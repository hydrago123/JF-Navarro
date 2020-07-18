<?php
	include_once 'conexion.php';

	if(isset($_GET['id_cliente'])){
		$id=(int) $_GET['id_cliente'];

		$buscar_id=$con->prepare('SELECT * FROM cliente WHERE id_cliente=:id_cliente  LIMIT 1');
		$buscar_id->execute(array(
			':id_cliente'=>$id_cliente 
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
        $numero_telefonico=$_POST['numero_telefonico'];
        $fechanacimiento=$_POST['fechanacimiento'];
        $edad=$_POST['edad'];
        $genero=$_POST['genero'];
        $tipodeusuario=$_POST['tipodeusuario'];

		$id=(int) $_GET['id_cliente'];

			if(!empty($nombres) && !empty($apellidos) && !empty($email) && !empty($numero_telefonico)&& !empty($fechanacimiento)&& !empty($edad)&& !empty($genero)&& !empty($tipodeusuario) ){

				$consulta_update=$con->prepare(' UPDATE cliente SET  
					nombres=:nombres,
					apellidos=:apellidos,
					email=:email,
					numero_telefonico=:numero_telefonico,
                    fechanacimiento=:fechanacimiento,
                    edad=:edad,
                    genero=:genero,
                    tipodeusuario=:tipodeusuario

					WHERE id_cliente=:id_cliente;'
				);
				$consulta_update->execute(array(
					':nombres' =>$nombres,
					':apellidos' =>$apellidos,
					':email' =>$email,
                    ':numero_telefonico' =>$numero_telefonico,
                    ':fechanacimiento' =>$fechanacimiento,
                    ':edad' =>$edad,
                    ':genero' =>$genero,
                    ':tipodeusuario' =>$tipodeusuario,

					':id_cliente' =>$id_cliente
				));
				header('Location: index.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Usuario</title>
	<link rel="stylesheet" href="css/estiloo.css">
</head>
<body>
	<script>
        // Funcion para limitar el numero de caracteres de un textarea o input
        // Tiene que recibir el evento, valor y número máximo de caracteres
        function limitar(e, contenido, caracteres)
        {
            // obtenemos la tecla pulsada
            var unicode=e.keyCode? e.keyCode : e.charCode;
 
            // Permitimos las siguientes teclas:
            // 8 backspace
            // 46 suprimir
            // 13 enter
            // 9 tabulador
            // 37 izquierda
            // 39 derecha
            // 38 subir
            // 40 bajar
            if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
                return true;
 
            // Si ha superado el limite de caracteres devolvemos false
            if(contenido.length>=caracteres)
                return false;
 
            return true;
        }
   

  

         function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }



        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }



    function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    patron =/[0-9]/;
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
 
    </script>

	<div class="contenedor">
		<h2>Editar Cliente</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombres" value="<?php if($resultado) echo $resultado['nombres']; ?>" class="input__text">
                <input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="input__text">
                <input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
                <input type="text" name="numero_telefonico" value="<?php if($resultado) echo $resultado['numero_telefonico']; ?>" class="input__text">
                <input type="text" name="fechanacimiento" value="<?php if($resultado) echo $resultado['fechanacimiento']; ?>" class="input__text">
                <input type="text" name="edad" value="<?php if($resultado) echo $resultado['edad']; ?>" class="input__text">

                <select name="genero" id="">
                    <option value="">Genero</option>
                    <option value="FEMENINO">Femenino</option>
                    <option value="MASCULINO">Masculino</option>
                </select>

                <div>
			        <select name="tipodeusuario">
                    <option value="0">Tipo de Usuario:</option>
                    <?php
                        $query = $con -> prepare ("SELECT * FROM cliente where tipodeusuario = 2" );
                        $query->execute();
                        foreach ($query as $valores) {
                        echo '<option value="'.$valores[tipodeusuario].'">'.$valores[tipodeusuario].'</option>';
                    }
                        ?>
                    </select>
                </div>

			</div>

			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
