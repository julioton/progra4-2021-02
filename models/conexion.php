<?php

class Conexion{
    public static function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=id17237206_pdophp","id17237206_progra4","HonC7-Y{AiAZ/\$JQ");
        //var_dump($link);
        return $link;
    }
}
/*

class Conexion{
    public static function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=pdophp","root","");
        //var_dump($link);
        return $link;
    }
}


$a = new Conexion();
$a -> conectar();
*/