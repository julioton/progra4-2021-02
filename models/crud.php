<?php
require_once "conexion.php";

class Datos extends Conexion{

    public static function registroUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, password, email) VALUES (:nombre, :password, :email)");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if($stmt -> execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }
    }

    public static function vistaUsuariosModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla ");
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    public static function borrarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if($stmt -> execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }
    }

    public static function editarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla WHERE id = :id ");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch();
    }

    public static function actualizarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, email = :email WHERE id = :id ");
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if($stmt -> execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }
    }

    public static function ingresarUsuarioModel( $datos, $tabla ){
        $stmt = Conexion::conectar()->prepare("SELECT nombre, password FROM $tabla WHERE nombre = :nombre ");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch();
    }

    public static function validarUsuarioModel($datos){
        $stmt = Conexion::conectar()->prepare("SELECT count(nombre) FROM usuarios WHERE nombre = :nombre || email = :nombre");
        $stmt -> bindParam(":nombre", $datos, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch();
    }

    public static function subirFotoModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, ruta) VALUES (:nombre, :ruta)");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        if($stmt -> execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }
    }

    public static function mostrarFotosModel($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, ruta FROM $tabla ");
        $stmt -> execute();
        return $stmt->fetchAll();
    }
}