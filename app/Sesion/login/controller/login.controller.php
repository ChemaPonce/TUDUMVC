<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/Sesion/login/view/login.php");
        break;
    
        case 'POST':
            require_once("./app/Sesion/repository/login.repository.php");
            

            $correo = $_POST['email'];
            $contraseña = $_POST['pswd'];

            if (isset($_POST['pswd'])) {
                $pswd = $_POST['pswd']; 
            } else {
            
            }
            
            

            if (!UsuariosRepository::getInstance()->validarCorreo($correo)) {
                $fallo = "Correo no registrado, Intenta con otro correo.";
                include_once("./app/Sesion/login/view/login.php");
                exit(); // Salir para evitar redirección
            }
    
            // Validar la contraseña
            if (!UsuariosRepository::getInstance()->validarPassword($correo, $pswd)) {
                $fallo = "La contraseña es incorrecta. Intenta nuevamente.";
                include_once("./app/Sesion/login/view/login.php");
                exit(); // Salir para evitar redirección
            }
            
            $usuarios = new Usuario (0, '', $correo, $pswd);

            $infousuario = UsuariosRepository::getInstance()->getAllUsuarios($usuarios);
            //var_dump($infousuario);
             $_SESSION["usuarios"] =  $infousuario["idusuario"];
             $_SESSION["nombreusuario"] =  $infousuario["nombre"];

            
            header("Location: /MVC/tareas");
            exit(); // Salir después de la redirección

            // aqui van air los metodos de validacion si yo quiero 
           


    default:
       header("Location .");
        break;
}