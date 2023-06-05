<?php
include("plantillaMenu.php");

if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <?php
        if (isset($_GET['productos'])) {
            $productos = $_GET['productos'];
            $productosArray = explode(",", $productos);
            echo "<h2>Carrito de Compras:</h2>";
            echo "<ul>";
            foreach ($productosArray as $producto) {
                $productoInfo = explode(":", $producto);
                $nombre = $productoInfo[0];
                $precio = $productoInfo[1];

                echo "<li>$nombre - Precio: $precio €</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>

</html>