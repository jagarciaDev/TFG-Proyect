<?php
session_start();

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = $_POST["nombre_producto"];
    $precioProducto = $_POST["precio_producto"];

    // Agregar el producto al carrito
    $producto = array(
        "nombre" => $nombreProducto,
        "precio" => $precioProducto
    );
    $_SESSION["carrito"][] = $producto;

    // Redireccionar a la página de la tienda o mostrar un mensaje de éxito
    header("Location: tienda.php");
    exit();
}
