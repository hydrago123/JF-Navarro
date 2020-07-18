<!DOCTYPE>
<head>
<title>Login</title>
 
  <meta charset="utf-8">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="css/estilo.css" rel="stylesheet"> 



</head>


<body class="bg-login">


    <div class="container formulario">

<br>
<br>
<br>
<br>
<br>
<br>
   <center> 


                
                <form action="validar.php" id="form-login" method="post">
                    
                    <div class="form-group">
                       <img src="img/usuario.png" border="1"  width="50" height="40">
                        <label class="col-xs-12" for="usuario"><h3>Correo electrónico</h3></label>
                         <div class="col-xs-10 col-xs-offset-1">
                          <input type="text" name="mail" id="email" class="form-control Input" required placeholder="">
                        
                        </div>
                    </div>




                    <div class="form-group">
                       <img src="img/pass.png" border="1"  width="50" height="40">
                         <label class="col-xs-12" for="password"><h3>Contraseña</h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                            <input type="password" name="pass" id="pass" class="form-control col-xs-12 Input" required placeholder="">

                        </div>
                    </div>



                    <div class="form-group">
                        <button type="submit" name="submit" id="ingresar" class="btn btn-success center-block btn-lg">Ingresar</button>
                        <button type="submit" class="btn btn-muted center-block btn-lg"><a href="registro.php">Registrar</a></button>
                        <button type="reset" class="btn btn-danger center-block btn-lg">Limpiar</button>
                    </div>
                 
  

                </form>
            </center>
          </div>
          <a id="volver" class="btn btn-primary center-block btn-lg" href="../index.html">Volver</a>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="../js/functions.js"></script>


</body>
</html>




