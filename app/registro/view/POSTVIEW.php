<?php 
    
    include_once("./app/registro/model/persona.php");


   
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        $persona= new persona($nombre,$apellido,$edad);

    
       echo "
       <h1>Datos Recibidos</h1>
       <h2><strong>Nombre:</strong>{$persona->nombre}</h2>
       <h2><strong>Apellidos:</strong>{$persona->apellidos}</h2>
       <h2><strong>Edad:</strong>{$persona->edad}</h2>
       ";
       
    ?>