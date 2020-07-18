

<html>
    
    <head>
        
        <title>user</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
<link href="css/estilo.css" rel="stylesheet">        
        
    </head>
    
    <body class="bg-cliente">
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
         <div class="menuprincipalcliente">
             <h1>CLIENTE</h1>
             <br>
             <br>
            <h1>Menú principal </h1> 
        </div>
        
         </p> 
         
         <br>
         <br>
         <br>
         <p>
            
        <div class="menucliente">
            <button class="btn btn "><a href="desconectar.php">Cerrar</a></button>
            <button class="btn btn "><a href="../crudclienteclientes/index.php">Consultar Clientes</a></button>
            <button class="btn btn "><a href="../crudserviciosclientes/index.php">Consultar Servicios</a></button>
            <button class="btn btn "><a href="../crudinsumoclientes/index.php">Consultar Insumos</a></button>
            <button class="btn btn "><a href="../crudcotizacionclientes/index.php">Consultar cotizacion</a></button>


            <div class="nickusercliente">
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