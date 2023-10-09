<?php
include_once("./app/Sesion/model/login.model.php");

class UsuariosRepository{
    private static $_intace = [];

    private mysqli $mysqli;

    private function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "tudu");
    }
    

    public static function getInstance(): UsuariosRepository {
        $class = static::class;
        if ( !isset( $_intance[ $class ] ) ){
            $_intance[ $class ] = new static();
        }

        return $_intance[ $class ];
    }

    public function getDBConex(): mysqli{
        return $this->mysqli;
    }

    public function getAllUsuarios(Usuario $usuario ): array {
        $usuarios;
        $query = "SELECT idusuario, nombre FROM usuarios  where correo= ? and contraseña= ?";

        $sentencia = $this->mysqli->prepare($query);
         
        $correo = $usuario -> getCorreo();
        $contraseña = $usuario ->  getPassword();

        $sentencia -> bind_param("ss", $correo, $contraseña);

        $sentencia->execute();

        $sentencia->bind_result( $id, $nombre);
        while ($sentencia->fetch() ){
            $usuarios  = array('idusuario' => $id, 'nombre' => $nombre);
        }
        return $usuarios;
    }

    public function registrarUsuario(Usuario $usuario):bool{
        $this->mysqli->begin_transaction();

        $query="INSERT INTO usuarios (nombre, correo, contraseña) VALUES(?,?,?)";
        $sentencia=$this->mysqli->prepare($query);

        $nombre=$usuario->getNombre();
        $correo=$usuario->getCorreo();
        $pswd=$usuario->getPassword();

        $sentencia->bind_param("sss",$nombre,$correo,$pswd);

        if (!$sentencia->execute()) {
            $this->mysqli->rollback();
            return false;
        }

        $this->mysqli->commit();
        return true;
    }

    public function validarCorreo($correo): bool {
        $query = "SELECT COUNT(*) FROM usuarios WHERE correo = ?";
        $sentencia = $this->mysqli->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $sentencia->bind_result($count);
        $sentencia->fetch(); 
        $sentencia->close();
    
        return $count>0;
    }

    public function validarPassword($correo, $pwsd): bool {
        $query = "SELECT contraseña FROM usuarios WHERE correo = ?";
        $sentencia = $this->mysqli->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $sentencia->bind_result($pswd_tudu);
        $sentencia->fetch();
        $sentencia->close();
    
        return $pwsd === $pswd_tudu;
    }
    
}