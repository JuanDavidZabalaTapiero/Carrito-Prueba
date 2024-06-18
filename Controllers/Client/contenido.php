<?php

session_start();

function showHeader()
{
    echo '
    <header class="mainHeader">
        <nav>
            <a href="home.php">Logo</a>
            <a href="../../index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </nav>
    </header>
    ';
}

function showCart()
{

    $objConsultasCliente = new ConsultasCliente();

    $codUser = $_SESSION["idUser"];

    // Items del carrito
    $fItemsCarrito = $objConsultasCliente->consultarCarrito($codUser);

    $total = 0;

    foreach ($fItemsCarrito as $item) {

        $idProducto = $item["codProducto"];

        // Productos
        $tblProductos = $objConsultasCliente->consultarProducto($idProducto);

        echo '
        <tr>
            <td><h2>' . $tblProductos["nombre"] . '</h2></td>
            <td><p>' . $tblProductos["precio"] . '<p></td>
        </tr>
        ';

        $total = $total + $tblProductos["precio"];
    }

    echo '

    <tr>
        <td><p>Total</p></td>
        <td><p>' . $total . '</p></td>
    </tr>

    ';
}