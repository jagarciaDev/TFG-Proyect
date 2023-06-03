<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SELECT para recuperar los datos de la tabla
$sql = "SELECT id, fecha, lugar FROM gira WHERE YEAR(fecha) = 2023 ORDER BY fecha ASC";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gira | Melendi Página Oficial</title>

        <!-- Icono página -->
        <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
    </head>

    <body>
        <?php include("plantillaMenu.php"); ?>
        <center>
            <h1>Gira Festivales 2023</h1><br>

        </center>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <?php
                setlocale(LC_ALL, 'es_ES');
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<table class="table text-center">';
                    echo "<tr>
                        <td>" . date('d M Y', strtotime($fila["fecha"])) . "</td>
                        <td>" . $fila["lugar"] . "</td>
                        <td>
                        <td>
                        <td>
                        <button type='button' class='btn btn-outline-dark'><a href='entradasFestivales.php?id=$fila[id]'
                    style='text-decoration:none; color:inherit;'>Comprar Entradas 🎟️</a></button>

                    </td>

                    </td>

                    </td>
                    </tr>";
                }
            } else {
                echo "No se encontraron resultados.";
            }
                ?>
                </table>
                </div>
            </div>
        </div>

        <center>
            <hr>
            <h1>Gira 20º Aniversario</h1><br>
        </center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table text-center">
                        <?php
                        $sql1 = "SELECT id, fecha, lugar FROM gira WHERE YEAR(fecha) <> 2023 ORDER BY fecha ASC";
                        $resultado1 = $conn->query($sql1);
                        if ($resultado1->num_rows > 0) {
                            while ($fila = $resultado1->fetch_assoc()) {
                                echo "<tr>
                        <td>" . date('d M Y', strtotime($fila["fecha"])) . "</td>
                        <td>" . $fila["lugar"] . "</td>
                        <td>
                        <button type='button' class='btn btn-outline-dark'><a href='entradasFestivales.php?id=$fila[id]'
                    style='text-decoration:none; color:inherit;'>Comprar Entradas 🎟️</a></button>
                        </td>
                        </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No se encontraron resultados.";
                        }

                        // Cerrar la conexión a la base de datos
                        $conn->close();
                        ?>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-light py-3" style="position: relative;">
            <div class="container text-center">
                <p>&copy; Copyright 2023 Sony Music Entertainment España, S.L.
                    Reservados todos los derechos | Protección de datos | Condiciones generales
                </p>
            </div>
        </footer>
    </body>

    </html>