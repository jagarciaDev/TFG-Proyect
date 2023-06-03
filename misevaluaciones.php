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
    include("plantillaMenu.php");
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Estrellas</th>
                <th>Nombre del Disco</th>
            </tr>
        </thead>
        <tbody>
            <?php
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

            $sql = "SELECT nombre_disco, estrellas, usuarios.usuario 
                    FROM tabla_evaluaciones 
                    INNER JOIN usuarios ON tabla_evaluaciones.id_usuario = usuarios.id_usuario
                    WHERE tabla_evaluaciones.id_usuario = $idUsuario 
                    ORDER BY estrellas DESC";

            $result = $conn->query($sql);

            // Recorrer los resultados y mostrar los datos en la tabla
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["estrellas"] . "⭐</td>";
                    echo "<td>" . $row["nombre_disco"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay evaluaciones disponibles</td></tr>";
            }
            // Cerrar la conexión a la base de datos
            $conn->close();
            ?>
        </tbody>
    </table>
</body>

</html>