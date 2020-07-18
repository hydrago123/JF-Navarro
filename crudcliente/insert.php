<?php 
    // se llama el archivo que conecta a la base de datos que es "conexion.php"
	include_once 'conexion.php';
    
    // se crean las variables que usaremos en esta vista
	if(isset($_POST['guardar'])){
		$nombres=$_POST['nombres'];
		$apellidos= $_POST['apellidos'];
		$email=$_POST['email'];
        $numero_telefonico=$_POST['numero_telefonico'];
        $fechanacimiento=$_POST['fechanacimiento'];
        $edad=$_POST['edad'];
        $genero=$_POST['genero'];
        $tipodeusuario=$_POST['tipodeusuario'];
        
        // se crea un condicional para comparar si todos los campos están llenos
		if(!empty($nombres) && !empty($apellidos)  && !empty($email) && !empty($numero_telefonico)&& !empty($fechanacimiento)&& !empty($edad)&& !empty($genero)&& !empty($tipodeusuario) ){
		
				$consulta_insert=$con->prepare('INSERT INTO cliente(nombres,apellidos,email,numero_telefonico,fechanacimiento,edad,genero,tipodeusuario) VALUES(:nombres,:apellidos,:email,:numero_telefonico,:fechanacimiento,:edad,:genero,:tipodeusuario)');
				$consulta_insert->execute(array(
					':nombres' =>$nombres,
					':apellidos' =>$apellidos,
					':email' =>$email,
                    ':numero_telefonico' =>$numero_telefonico,
                    ':fechanacimiento' =>$fechanacimiento,
                    ':edad' =>$edad,
                    ':genero' =>$genero,
                    ':tipodeusuario' =>$tipodeusuario
				));
				header('Location: index.php');
			//de lo contrario al if , sale un mensaje diciendo que estan vacios los campos.
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
	}	}

	


?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="css/estiloo.css">     
	<div class="contenedor">
		<h2>Nuevo Cliente</h2>
		<form action="" id="form-registro" method="post">
			<div class="form-group">
				<input type="text" name="nombres" placeholder="nombres" class="input__text">
                <input type="text" name="apellidos" placeholder="apellidos" class="input__text"> 
                <input type="email" name="email" placeholder="email" class="input__text"> 
                <input type="text" name="numero_telefonico" placeholder="numero_telefonico" class="input__text"> 
                <input type="text" name="fechanacimiento" placeholder="fechanacimiento" class="input__text"> 
                <input type="text" name="edad" placeholder="edad" class="input__text"> 

                <select name="genero" id="">
                    <option value="">Genero</option>
                    <option value="FEMENINO">Femenino</option>
                    <option value="MASCULINO">Masculino</option>
                </select>

                <br>
                <br>
                <br>
                <div>
			        <select name="Tipo de Usuario">
                    <option value="">Tipo de Usuario:</option>
                    <?php
                        $query = $con -> prepare ("SELECT * FROM usuarios where rol = 2" );
                        $query->execute();
                        foreach ($query as $valores) {
                        echo '<option value="'.$valores[rol].'">'.$valores[rol].'</option>';
                    }
                        ?>
                    </select>
                </div>




			
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" id="registrar" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/functions.js"></script>

</body>
</html>
