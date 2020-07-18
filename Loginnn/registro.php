<?php
    session_start();
//definicion de variables para el login
    if (isset($_POST['validar'])) {
        $_SESSION['docU'] = $_POST['docU'];
        $_SESSION['nombreU'] = $_POST['nombreU'];
        $_SESSION['contrasenaU'] = $_POST['contrasenaU'];
        $_SESSION['perfilU'] = $_POST['perfilU'];
        $_SESSION['estadoU'] = $_POST['estadoU'];

        exit("success");
    }
?>

<!DOCTYPE>
<head>
<title>Login</title>

  <meta charset="utf-8">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="css/estilo.css" rel="stylesheet"> 

</head>


<body class="bg-registro">

    <div class="container formulario">
    

<br>
<br>
<br>
<center><h1>REGISTRO</h1></center>
<br>
<br>
<br>
   <center> 


                
                <form action="registrar.php" id="form-registro" method="post" >
                    
                    <div class="form-group">
                       <img src="img/nombre.png" border="1"  width="50" height="40">
                        <label class="col-xs-12" for="usuario"><h3>Nombre</h3></label>
                         <div class="col-xs-10 col-xs-offset-1">
                          <input type="text" name="realname" class="form-control Input" required placeholder="">
                        
                        </div>
                    </div>




                    <div class="form-group">
                        <img src="img/usuario.png" border="1"  width="50" height="40">
                         <label class="col-xs-12" for="password"><h3>Correo Electronico</h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                            <input type="text" name="nick" id="email" class="form-control col-xs-12 Input" required placeholder="">

                        </div>
                    </div>


                    <div class="form-group">
                       <img src="img/pass.png" border="1"  width="50" height="40">
                         <label class="col-xs-12" for="password"><h3>Contraseña</h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                            <input type="password" name="pass" class="form-control col-xs-12 Input" required placeholder="">

                        </div>
                    </div>

                    <div class="form-group">
                         <label class="col-xs-12" for="password"><h3>Tipo de Usuario</h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                        <select name="rol" id="">
                        <option value="1">Admin</option>
                        <option value="2">Cliente</option>
                        </select>
                        </div>
                    </div>
                    
                

                    <div class="form-group">
                        <button type="submit" id="registrar" class="btn btn-primary center-block btn-lg">Registrar</button>
                         <button type="reset" class="btn center-block btn-lg"><a href="index.php">Volver</a></button>
                              <button type="reset" class="btn btn-danger center-block btn-lg">Eliminar</button>
                    </div>
                 


                </form>
            </center>
          </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/functions.js"></script>

</body>
</html>




