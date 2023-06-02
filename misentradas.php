<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis entradas | Melendi Página Oficial</title>

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <?php
    include("plantillaMenu.php");

    // Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tfg";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    $idUsuario = $_SESSION["id"];

    $sql = "SELECT * FROM entradasconciertos WHERE id_usuario = '$idUsuario' ORDER BY fecha ASC";

    $result = $conn->query($sql);

    // Recorrer los resultados y mostrar los datos en la tabla
    if ($result->num_rows > 0) {
        echo "<table class='table table-hover'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center'>Fecha</th>";
        echo "<th class='text-center'>Lugar</th>";
        echo "<th class='text-center'>Nº Entradas</th>";
        echo "<th class='text-center'>Fecha de compra</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            $fechaConcierto = $row["fecha"];
            $fechaFormateada = date("d M Y", strtotime($fechaConcierto));
            $fechaActual = date('Y-m-d');

            $fechaPedido = $row["fecha_pedido"];
            $fechaPedidoFormateada = date("d/m/Y | H:i:s", strtotime($fechaPedido));

            $diff = date_diff(date_create($fechaActual), date_create($fechaConcierto));
            $diasRestantes = $diff->days;
            $horasRestantes = $diff->h;
            $minutosRestantes = $diff->i;
            $segundosRestantes = $diff->s;

            echo "<tr>";
            echo "<td class='text-center'>" . $fechaFormateada . " <span id='cuenta-regresiva-" . $row["id_pedido"] . "'></span></td>";
            echo "<td class='text-center'>" . $row["lugar"] . "</td>";
            echo "<td class='text-center'>" . $row["num_entradas"] . "</td>";
            echo "<td class='text-center'>" . $fechaPedidoFormateada . "</td>";
            echo "</tr>";

            echo "<script>";
            echo "(function() {"; // Encapsular el código en una función anónima para evitar colisiones de variables
            echo "    var fechaConcierto = new Date('$fechaConcierto');";
            echo "    var cuentaRegresivaId = 'cuenta-regresiva-" . $row["id_pedido"] . "';";
            echo "    function actualizarCuentaRegresiva() {";
            echo "        var fechaActual = new Date();";
            echo "        var diff = fechaConcierto - fechaActual;";
            echo "        var dias = Math.floor(diff / (1000 * 60 * 60 * 24));";
            echo "        var horas = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));";
            echo "        var minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));";
            echo "        var segundos = Math.floor((diff % (1000 * 60)) / 1000);";
            echo "        var cuentaRegresivaElemento = document.getElementById(cuentaRegresivaId);";
            echo "        cuentaRegresivaElemento.textContent = '(' + dias + ' días ' + horas + ' horas ' + minutos + ' minutos ' + segundos + ' segundos)';";
            echo "    }";
            echo "    actualizarCuentaRegresiva();";
            echo "    setInterval(actualizarCuentaRegresiva, 1000);";
            echo "})();"; // Ejecutar la función inmediatamente
            echo "</script>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No hay entradas disponibles</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>

</html>