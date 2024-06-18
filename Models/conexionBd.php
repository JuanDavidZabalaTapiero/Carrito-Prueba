<?php

class ConexionBd{
    public function getConexion() {

        $host = "";
        $dbName = "tienda";
        $user = "root";
        $pass = "";

        $conexion = new PDO("mysql:host=$host;dbname=$dbName;", $user, $pass);

        return $conexion;
    }
}