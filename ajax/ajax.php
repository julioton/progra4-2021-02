<?php
require_once "../controllers/controller.php";
require_once "../models/crud.php";

class Ajax{
    public $validar_usuario;

    public function validarUsuarioAjax(){
        $datos = $this->validar_usuario;

        $respuesta = MvcController::validarUsuarioController($datos);
        //$respuesta = "Success";

        echo $respuesta;
    }
}

if( isset( $_POST["nombre"] ) ){
    $a = new Ajax();
    $a -> validar_usuario = $_POST["nombre"];
    $a -> validarUsuarioAjax();
}

if( isset( $_FILES["file"] ) ){
    if( !empty( $_FILES["file"] ) ){
        if( is_uploaded_file( $_FILES["file"]["tmp_name"] ) ){
            $dir_destino = "../uploads/";
            $tamano = $_FILES["file"]["size"];
            $tipo = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $nombre = time()."_".rand(1000000, 9999999).".".$tipo;
            $destino = $dir_destino.$nombre;
            if( $tipo != "jpg" && $tipo != "jpeg" && $tipo != "png" && $tipo != "gif" ){
                echo "300";
            }else if( $tamano > 26214400){ //Bytes 8 bits | kilobyte=1024 Bytes | megabyte=1048576 Bytes
                echo "301";
            }else{
                move_uploaded_file($_FILES["file"]["tmp_name"], $destino);
                echo $nombre;
            }
        }else{
            echo "302";
        }
    }else{
        echo "303";
    }
}