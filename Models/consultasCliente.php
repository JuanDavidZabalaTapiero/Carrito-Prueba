<?php

require_once('conexionBd.php');

class ConsultasCliente{

    public function consultarProducto($idProducto) {
        $sql = "SELECT * FROM productos WHERE id = :idProducto";

        $objConexionBd = new ConexionBd();

        $conexion = $objConexionBd->getConexion();

        $result = $conexion->prepare($sql);

        $result->bindParam(":idProducto", $idProducto);

        $result->execute();

        return $result->fetch();
    }
    public function consultarCarrito($codCliente) {
        $carrito = "SELECT * FROM carrito WHERE codUser = :codUser AND pagada = 0";

        $objConexionBd = new ConexionBd();

        $conexion = $objConexionBd->getConexion();

        $resultCarrito = $conexion->prepare($carrito);
        
        $resultCarrito->bindParam(":codUser", $codCliente);

        $resultCarrito->execute();

        $fCarrito = $resultCarrito->fetch();

        // Items del carrito

        $items = "SELECT * FROM items_carrito WHERE codCarrito = :codCarrito";

        $resultItems = $conexion->prepare($items);
        
        $codCarrito = $fCarrito["id"];

        $resultItems->bindParam(":codCarrito", $codCarrito);

        $resultItems->execute();

        if ($resultItems->rowCount() == 1) {
            return $resultItems->fetch();
        } else {
            return $resultItems->fetchAll();
        }
    }

}