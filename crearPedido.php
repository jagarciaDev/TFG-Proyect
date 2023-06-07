<?php

include("plantillaMenu.php");

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['comprar'])) {
    // Obtener los productos del carrito desde el formulario
    $productos = $_POST['productos'];
    $productosArray = explode(",", $productos);

    // Obtener el ID de usuario desde la sesión
    $idUsuario = $_SESSION["id"];

    // Obtener la fecha actual
    $fechaCompra = date('Y-m-d');

    // Recorrer los productos y realizar la inserción en la base de datos
    foreach ($productosArray as $producto) {
        $productoInfo = explode(":", $producto);
        $nombre = $productoInfo[0];
        $precio = $productoInfo[1];

        // Consulta SQL para insertar los datos en la tabla de pedidos (ajusta el nombre de la tabla según corresponda)
        $sql = "INSERT INTO pedidos (id_usuario, nombre_producto, precio, fecha_compra) VALUES ($idUsuario, '$nombre', $precio, '$fechaCompra')";

        // Ejecutar la consulta
        if (mysqli_query($conn, $sql)) {
            echo "Producto insertado en la base de datos: $nombre - Precio: $precio € - Fecha de compra: $fechaCompra<br>";
        } else {
            echo "Error al insertar producto: " . mysqli_error($conn);
        }
    }
}

// Cerrar la conexión
mysqli_close($conn);
