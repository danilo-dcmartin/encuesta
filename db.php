<?php
class Conectar{
    public static function conexion()
    {
        $conexion=new mysqli("127.0.0.1","usuario","usuario1234","encuestas");
        $conexion->query("SET NAMES 'utf8'");
        if ($conexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $conexion->connect_error;
            exit();
          }
        return $conexion;
    }
}
?>