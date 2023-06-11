<?php
ob_start();
include("plantillaMenu.php");

// Check if the user is logged in
if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php");
    exit();
}

// Database connection (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$idUsuario = $_SESSION['id'];

// Insert into "pedidos" table
if (isset($_POST["comprar"])) {
    $productos = $_GET['productos'];
    $productosArray = explode(",", $productos);

    $total = 0;
    $pedidoInfo = '';

    foreach ($productosArray as $producto) {
        $productoInfo = explode(":", $producto);
        $nombre = $productoInfo[0];
        $precio = $productoInfo[1];
        $total += $precio;

        $pedidoInfo .= "$nombre - Precio: $precio €\n";
    }

    // Get the current date and time
    $fechaCompra = date('Y-m-d H:i:s');

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO pedidos (id_usuario, nombre_producto, precio, fecha_compra) VALUES ('$idUsuario',?, ?, ?)");
    $stmt->bind_param("sds", $pedidoInfo, $total, $fechaCompra);
    $stmt->execute();
    $stmt->close();

    // Redireccionar a la página "compraaceptada.php"
    header("Location: tienda.php");
    exit();
}
ob_end_flush();
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
    <form action="" method="POST">

        <div class="container text-center">
            <?php
            if (isset($_GET['productos'])) {
                $productos = $_GET['productos'];
                $productosArray = explode(",", $productos);

                if (count($productosArray) > 0) {
                    echo "<h2>Carrito de Compras:</h2>";
                    $total = 0; // Variable para almacenar el total a pagar

                    foreach ($productosArray as $producto) {
                        $productoInfo = explode(":", $producto);
                        $nombre = $productoInfo[0];
                        $precio = $productoInfo[1];
                        $total += $precio; // Sumar el precio del producto al total

                        echo "<p>$nombre - Precio: $precio €</p>";
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
            <button type="submit" class="btn btn-primary" name="comprar" id="comprarEntradasBtn">Comprar productos</button>
            <button type='button' class='btn btn-warning' onclick='window.history.back()'>Volver</button>
        </div>
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/validacionTarjetaCredito.js"></script>
</body>

</html>