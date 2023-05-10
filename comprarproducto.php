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
    <title>Document</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <?php
        if (isset($_POST['nombre_producto']) && isset($_POST['precio_producto'])) {
            $nombre = $_POST['nombre_producto'];
            $precio = $_POST['precio_producto'];
        }
        ?>
        <h1>Detalle del Producto</h1>
    </div>
    <br>
    <div class="container d-flex justify-content-center">
        <p>Nombre: <?php echo $nombre ?></p>
    </div>
    <div class="container d-flex justify-content-center">
        <p>Precio: <?php echo $precio ?> euros</p>
        <!-- Aquí podrías agregar más información del producto, como descripción, imagen, etc. -->
    </div>
</body>


</html>