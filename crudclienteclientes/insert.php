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
		
				$consulta_insert=$con->prepare('INSERT INTO cliente(nombres,apellidos,email,numero_telefonico_fechanacimiento,edad,genero,tipodeusuario) VALUES(:nombres,:apellidos,:email,:numerotelefonico,:fechanacimiento,:edad,:genero,:tipodeusuario)');
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
<head>
	<meta charset="UTF-8">
	<title>Nuevos empleados</title>
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
		<h2>Nuevo Cliente</h2>
		<form action="" id="form-registro" method="post">
			<div class="form-group">
				<input type="text" name="nombres" placeholder="nombres" class="input__text">
                <input type="text" name="apellidos" placeholder="apellidos" class="input__text"> 
                <input type="text" name="email" placeholder="email" class="input__text"> 
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
				<input type="submit" id="registrar" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/functions.js"></script>

</body>
</html>
