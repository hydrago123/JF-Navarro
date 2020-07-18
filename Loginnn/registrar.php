<?php
//se realiza las validacion del registro de usuario
	$realname=$_POST['realname'];
	$mail=$_POST['nick'];
	$pass= md5($_POST['pass']); // el md5() se usa para encriptar las contraseñas
	$rol= $_POST['rol'];

	require("conexion.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el email designado para un usuario, verifique sus datos");</script> ';
			}else{
				
				mysqli_query($mysqli,"INSERT INTO usuarios VALUES('','$realname','$pass','$mail','','$rol')");

				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>



<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php"> 