	<?php
	include_once 'conexion.php';

	if(isset($_GET['id_insumo'])){
		$id_insumo=(int) $_GET['id_insumo'];

		$buscar_id_insumo=$con->prepare('SELECT * FROM insumos WHERE id_insumo=:id_insumo  LIMIT 1');
		$buscar_id_insumo->execute(array(
			':id_insumo'=>$id_insumo 
		));
		$resultado=$buscar_id_insumo->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$descripcion=$_POST['descripcion'];
		$tipo_insumo=$_POST['tipo_insumo'];
        $destino_insumo=$_POST['destino_insumo'];
		$id_insumo=(int) $_GET['id_insumo'];

			if(!empty($descripcion) && !empty($tipo_insumo)  && !empty($destino_insumo) ){

				$consulta_update=$con->prepare(' UPDATE insumos SET  
					descripcion=:descripcion,
					tipo_insumo=:tipo_insumo,
					destino_insumo=:destino_insumo
					WHERE id_insumo=:id_insumo;'
				);
				$consulta_update->execute(array(
					':descripcion' =>$descripcion,
					':tipo_insumo' =>$tipo_insumo,
                    ':destino_insumo' =>$destino_insumo,
					':id_insumo' =>$id_insumo
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
	<title>Editar Insumo</title>
	<link rel="stylesheet" href="csss/estilo.css">
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
		<h2>Editar Insumo</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="descripcion" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text">
				<input type="text" name="tipo_insumo" value="<?php if($resultado) echo $resultado['tipo_insumo']; ?>" class="input__text">
			</div>	
			<div class="form-group">
				<input type="text" name="destino_insumo" value="<?php if($resultado) echo $resultado['destino_insumo']; ?>" class="input__text">
			</div>	
			
						
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
