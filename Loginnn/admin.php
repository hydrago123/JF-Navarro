<html>
    
    <head>
        
        <title>interfaz admin</title>
        
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
<link href="css/estilo.css" rel="stylesheet">
        

        
    </head>
    
    <body class="bg-admin">

    <?php
// Interfaz principal de usuario ADMINISTRADOR, se insertan las librerias de bootstrap y el estilo css


    if($_SESSION["rol"] = '1'){
        echo '<script>alert("ADMINISTRADOR")</script> ';
        
    }else{

        echo '<script>alert("CLIENTE")</script> ';

    }

    ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      <center>
          
         <p>
             <br>
             <div class="menuprincipaladmin">
             <h1>ADMINISTRADOR</h1>
             <br>
             <br>
            <h1>Menú principal </h1> 
            </div>
         </p> 
         
         <br>
         <br>
         <br>
         <p>
          
        <div class="menuadmin">
            <button class="btn btn "><a href="desconectar.php">Cerrar</a></button>
            <button class="btn btn "><a href="../crudusuarios/index.php">Curd Usuarios</a></button>
            <button class="btn btn "><a href="../crudservicios/index.php">Crud Servicios</a></button>
            <button class="btn btn "><a href="../crudinsumo/index.php">Crud Insumo</a></button>
            <button class="btn btn "><a href="../crudcotizacion/index.php">Crud Cotizacion</a></button>
            <button class="btn btn "><a href="../crudcliente/index.php">Crud Cliente</a></button>


            <div class="nickuseradmin">
              <?php
                session_start();
                echo $_SESSION['user'];
              ?>
            </div>

        </div>
             
             
         </p>
          
          
          
          
          
      </center>  
        
        
        
        
        
        
        
    </body>
    
    
    
</html>