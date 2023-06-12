<?php
ob_start(); // Iniciar el búfer de salida

include("plantillaMenu.php");

if (!isset($_SESSION['nombre_usuario']) || $_SESSION['nombre_usuario'] !== "admin") {
    header("Location: login.php");
    exit;
}

ob_end_flush(); // Enviar la salida almacenada en el búfer al navegador

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
        <title>Gira (Administrador) | Melendi Página Oficial</title>


        <link rel="stylesheet" type="text/css" href="css/index.css">
        <!-- Icono página -->
        <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
        <!-- Link Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script>
            document.addEventListener('dragstart', function(evt) {
                if (evt.target.tagName == 'IMG') {
                    evt.preventDefault();
                }
            });
        </script>
        <style>
            * {

                font-family: "Pathway Gothic One";
                font-size: 22px;
            }
        </style>
    </head>

    <body>
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
        <center>
            <!-- Boton MODAL -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar concierto
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar concierto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="concertForm" method="POST" action="insertarConcierto.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="concertName">Lugar del concierto</label>
                                    <input type="text" class="form-control" id="concertName" name="concertName" placeholder="Ingrese el nombre del concierto">
                                </div>
                                <div class="form-group">
                                    <label for="concertDate">Fecha del concierto</label>
                                    <input type="date" class="form-control" id="concertDate" name="concertDate" min="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Cartel del concierto</label>
                                    <input class="form-control" type="file" id="imagen" accept="image/*" name="imagen">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </center><br>
        <footer class="bg-dark text-light py-3" style="position: relative;">
            <div class="container text-center">
                <p>&copy; Copyright 2023 Sony Music Entertainment España, S.L.
                    Reservados todos los derechos | Protección de datos | Condiciones generales
                </p>
            </div>
        </footer>
    </body>

    </html>