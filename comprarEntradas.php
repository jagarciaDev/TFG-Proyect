<?php
include("plantillaMenu.php");

if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: index.php");
    exit();
};

$precioTotal = $_POST['totalPrice'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Melendi Página Oficial</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <div class="container">
        <h2 class="text-center">Resumen de la compra de entradas</h2>
        <hr>
        <?php
        // Obtener las cantidades seleccionadas del formulario
        $cantidad1 = intval($_POST['select1']);
        $cantidad2 = intval($_POST['select2']);
        $cantidad3 = intval($_POST['select3']);

        // Mostrar las cantidades solo si hay entradas seleccionadas (cantidad mayor que cero)
        if ($cantidad1 > 0) {
            echo "<i class='bi bi-ticket-fill'></i> x" . $cantidad1 . " Front Stage<br>";
        }
        if ($cantidad2 > 0) {
            echo "<i class='bi bi-ticket-fill'></i> x" . $cantidad2 . " Grada general<br>";
        }
        if ($cantidad3 > 0) {
            echo "<i class='bi bi-ticket-fill'></i> x" . $cantidad3 . " Anfiteatro<br>";
        }

        // Calcular el precio total
        $precioEntrada1 = 55;
        $precioEntrada2 = 40;
        $precioEntrada3 = 35;
        $precioTotal = ($cantidad1 * $precioEntrada1) + ($cantidad2 * $precioEntrada2) + ($cantidad3 * $precioEntrada3);

        // Mostrar el precio total solo si hay entradas seleccionadas (cantidad mayor que cero)
        if ($precioTotal > 0) {
            echo "El precio total de las entradas es de: " . $precioTotal . "€ <br>";
            echo "<form action='generarEntradas.php' method='POST'>";
            echo "<input type='hidden' name='select1' value='$cantidad1'>";
            echo "<input type='hidden' name='select2' value='$cantidad2'>";
            echo "<input type='hidden' name='select3' value='$cantidad3'>";
            echo "<input type='hidden' name='precio_entrada1' value='$precioEntrada1'>";

            echo "<h3 class='mt-4'>Datos de la tarjeta de crédito:</h3>";

            // Número de tarjeta
            echo "<div class='mb-3'>";
            echo "<label for='card_number' class='form-label'>Número de tarjeta:</label>";
            echo "<input type='text' class='form-control' id='card_number' name='card_number' pattern='[0-9]*' inputmode='numeric' required>";
            echo "</div>";

            // Fecha de vencimiento
            echo "<div class='mb-3'>";
            echo "<label for='card_expiry' class='form-label'>Fecha de vencimiento:</label>";
            echo "<input type='text' class='form-control' id='card_expiry' name='card_expiry' pattern='[0-9]*' inputmode='numeric' required>";
            echo "</div>";

            // CVV
            echo "<div class='mb-3'>";
            echo "<label for='card_cvv' class='form-label'>CVV:</label>";
            echo "<input type='text' class='form-control' id='card_cvv' name='card_cvv' pattern='[0-9]*' inputmode='numeric' required>";
            echo "</div>";

            echo "<button type='submit' class='btn btn-primary' id='comprarEntradasBtn' disabled>Comprar entradas</button>";
            echo "</form>";
        } else {
            echo "No se han seleccionado entradas.
            <br><br>
            <button type='button' class='btn btn-warning' onclick='window.history.back()'>Volver</button>";
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/validacionTarjetaCredito.js"></script>
</body>

</html>