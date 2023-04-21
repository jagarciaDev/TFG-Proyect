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
    <title>Tienda | Melendi Página Oficial</title>

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <footer class="bg-dark text-light py-3" style="position: relative;">
        <div class="container text-center">
            <p>&copy; Copyright 2023 Sony Music Entertainment España, S.L.
                Reservados todos los derechos | Protección de datos | Condiciones generales</p>
        </div>
    </footer>
</body>

</html>