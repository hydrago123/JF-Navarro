<?php
	include_once 'conexion.php';

	if(isset($_GET['id_cotizaciones'])){
		$id_cotizaciones=(int) $_GET['id_cotizaciones'];

		$buscar_id_cotizaciones=$con->prepare('SELECT * FROM cotizaciones WHERE id_cotizaciones=:id_cotizaciones  LIMIT 1');
		$buscar_id_cotizaciones->execute(array(
			':id_cotizaciones'=>$id_cotizaciones 
		));
		$resultado=$buscar_id_cotizaciones->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$id_cliente=$_POST['id_cliente'];
		$id_servicio=$_POST['id_servicio'];
		$fecha_cotizacion=$_POST['fecha_cotizacion'];
		$valor=$_POST['valor'];
        $id_insumo=$_POST['id_insumo'];
		$id_cotizaciones=(int) $_GET['id_cotizaciones'];

		if(!empty($id_cliente) && !empty($id_servicio)  && !empty($fecha_cotizacion) && !empty($valor) &&!empty($id_insumo) ){
		

				$consulta_update=$con->prepare(' UPDATE cotizaciones SET  
					id_cliente=:id_cliente,
					id_servicio=:id_servicio,
					fecha_cotizacion=:fecha_cotizacion,
					valor=:valor,
					id_insumo=:id_insumo
					WHERE id_cotizaciones=:id_cotizaciones;'
				);
				$consulta_update->execute(array(
					':id_cliente' =>$id_cliente,
					':id_servicio' =>$id_servicio,
					':fecha_cotizacion' =>$fecha_cotizacion,
					':valor' =>$valor,
                    ':id_insumo' =>$id_insumo,
					':id_cotizaciones' =>$id_cotizaciones
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
	<title>Editar Servico</title>
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
		<h2>Editar Servicios</h2>
		<form action="" method="post">
			<div class="form-group">
				<select name="id_cliente">
				 <option value="0">docA:</option>
				<?php
          $query = $con -> prepare ("SELECT * FROM cliente");
           $query->execute();
           foreach ($query as $valores) {
            echo '<option value="'.$valores[id_cliente].'">'.$valores[id_cliente].'</option>';
          }
        	if($resultado) echo $resultado['id_cliente']; ?>			
    </select>
				<select name="id_servicio">
				 <option value="0">docA:</option>
				<?php
          $query = $con -> prepare ("SELECT * FROM servicios");
           $query->execute();
           foreach ($query as $valores) {
            echo '<option value="'.$valores[id_servicio].'">'.$valores[id_servicio].'</option>';
          }
        	if($resultado) echo $resultado['id_servicio']; ?>			
    </select>
			</div>
			<div class="form-group">
			<input type="text" name="fecha_cotizacion" value="<?php if($resultado) echo $resultado['fecha_cotizacion']; ?>" class="input__text">
				<input type="text" name="valor" value="<?php if($resultado) echo $resultado['valor']; ?>" class="input__text">	
						<select name="id_insumo">
				 <option value="0">docA:</option>
				<?php
          $query = $con -> prepare ("SELECT * FROM insumos");
           $query->execute();
           foreach ($query as $valores) {
            echo '<option value="'.$valores[id_insumo].'">'.$valores[id_insumo].'</option>';
          }
        	if($resultado) echo $resultado['id_insumo']; ?>			
    </select>

			</div>


			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
