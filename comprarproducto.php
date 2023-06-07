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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <form action="crearPedido.php" method="POST">

        <div class="container text-center">
            <?php
            if (isset($_GET['productos'])) {
                $productos = $_GET['productos'];
                $productosArray = explode(",", $productos);

                if (count($productosArray) > 0) {
                    echo "<h2>Carrito de Compras:</h2>";
                    foreach ($productosArray as $producto) {
                        $productoInfo = explode(":", $producto);
                        $nombre = $productoInfo[0];
                        $precio = $productoInfo[1];

                        echo "<p>$nombre - Precio: $precio €</p>";
                    }

                    $total = 0; // Variable para almacenar el total
                    foreach ($productosArray as $producto) {
                        $productoInfo = explode(":", $producto);
                        $precio = $productoInfo[1];
                        $total += $precio; // Sumar al total el precio del producto actual
                    }

                    echo "<br>";
                    echo "<h3>Total a pagar: $total €</h3>"; // Mostrar el total a pagar
                } else {
                    echo "<h2>Carrito de Compras:</h2>";
                    echo "No hay productos para mostrar.";
                }
            } else {
                echo "<h2>Carrito de Compras:</h2>";
                echo "No hay productos para mostrar.";
            }
            ?>
        </div>
        <hr>

        <div class="container" style="max-width: 900px;">
            <div class="mb-3">
                <label for="card_number" class="form-label">Número de tarjeta:</label>
                <input type="text" class="form-control" id="card_number" name="card_number" pattern="[0-9]{16}" inputmode="numeric" placeholder="Introduce 16 digitos" required>
            </div>

            <div class="mb-3">
                <label for="card_expiry" class="form-label">Fecha de vencimiento:</label>
                <input type="date" class="form-control" id="card_expiry" name="card_expiry" min="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="mb-3">
                <label for="card_cvv" class="form-label">CVV:</label>
                <input type="text" class="form-control" id="card_cvv" name="card_cvv" pattern="[0-9]{3}" inputmode="numeric" placeholder="Introduce 3 digitos" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="comprar" id="comprarEntradasBtn" disabled>Comprar productos</button>
        <button type='button' class='btn btn-warning' onclick='window.history.back()'>Volver</button>
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/validacionTarjetaCredito.js"></script>
</body>

</html>