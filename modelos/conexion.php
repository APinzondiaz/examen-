<?php
class conexion{
    public static function conectar (){
        $con = new PDO("mysql:host=localhost;dbname=examen;charset=utf8","root","");
        return $con;
    }
}