<?php
include("plantillaMenu.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis pedidos | Melendi Página Oficial</title>

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "id20905691_root";
    $password = "javiTFG123@@";
    $dbname = "id20905691_tfg";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $idUsuario = $_SESSION["id"];

    $sql = "SELECT * FROM pedidos WHERE id_usuario= '$idUsuario'";
    $result = $conn->query($sql);
    ?>

    <div class="container">
        <h2>Mis pedidos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Precio</th>
                    <th>Fecha de compra</th>
                    <th>Fecha de llegada <i class="bi bi-box-seam-fill"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $productos = $row['nombre_producto'];
                        $precio = $row['precio'];
                        $fechaCompra = $row['fecha_compra'];

                        // Generar una fecha aleatoria para la llegada de los productos
                        $fechaLlegada = date('Y-m-d', strtotime($fechaCompra . ' + ' . rand(1, 7) . ' days'));
                ?>
                        <tr>
                            <td><?php echo $productos; ?></td>
                            <td><?php echo $precio; ?> €</td>
                            <td><?php echo $fechaCompra; ?></td>
                            <td><?php echo $fechaLlegada; ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No se encontraron pedidos.</td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>