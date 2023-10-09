<?php
if (!isset($path_components[2])) {
    $path_components[2]='';

    switch ($$path_components[2]) {
        case '':
          
        case 'login':
            require_once("app/Sesio/login/controller/login.controller.php")
            break;

            case 'registro':
                require_once("./app/Sesion/registro/controller/registro.controller.php")
                break;

        default:
            header("Location /MVC/login");
            break;
    }
}