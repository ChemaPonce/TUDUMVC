<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/Sesion/registro/view/login.registro.php");
            break;
            
          
        case 'POST':
         include_once("./app/Sesion/repository/login.repository.php");
            
            $nombre=$_POST['txt'];
            $correo=$_POST['email'];
            $pswd=$_POST['pswd'];
            $confPass=$_POST['confirmar'];

            echo "
            <hi> {$nombre}</h1>
            <hi> {$correo}</h1>
            <hi> {$pswd}</h1>
            <hi> {$confPass}</h1>

            ";

            if (UsuariosRepository::getInstance()->validarCorreo($correo)){
                $fallo="Correo ya registrado";
            }else{
                if($pswd!==$confPass){
                    $fallo="La contraseña no coincide, ingresala bien hijo de Dios";
                }else{
                    $usuario=new Usuario(0, $nombre, $correo, $pswd);
                   
                    if(!UsuariosRepository::getInstance()->registrarUsuario($usuario)){
                        $fallo=UsuariosRepository::getInstance()->getDBConex()->error;    
                             
                    }          
                }
            }

            if(isset( $fallo)){
                echo $fallo;
               require_once("./app/Sesion/registro/view/login.registro.php");
            } else{
                
                header("Location: /MVC/login");
            }
            break;
            
        default:
            header("Location: /MVC/login");
            break;
    }