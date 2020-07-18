<?php
// como su nombre lo dice, validar.php es el archivo que se encarga de realizar las pantallas emergentes con sus validaciones
session_start();
	require("conexion.php"); //llama un archivo php

	$username=$_POST['mail'];
	$pass= md5($_POST['pass']); //se usa md5() para encriptar las contraseñas

	$query= "SELECT * FROM usuarios WHERE email='$username' AND password='$pass'" or die("Error in the consult.." . mysqli_error($link));
    $result= mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($result);
    $totalRows = mysqli_num_rows($result);
	if($totalRows > 0){

			$_SESSION['id']=$row['id'];
			$_SESSION['user']=$row['user'];
			$_SESSION['rol']=$row['rol'];

			if($_SESSION["rol"] == '1'){
				echo '<script>alert("ADMINISTRADOR")</script> ';
	
				header("Location: admin.php");
				
			}else{
		
				echo '<script>alert("CLIENTE")</script> ';
	
				header("Location: index2.php");
			}
				
		}else{
		
		echo '<script>alert("CUENTA NO EXISTENTE/REGISTRATE")</script> ';
		
		echo "<script>location.href='registro.php'</script>";	

	}


?>