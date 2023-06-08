<?php
include("plantillaMenu.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <title>Adivina la canción | Melendi Página Oficial</title>

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>


    <div class="container">
        <h1>Juego de Adivinar la Canción</h1>

        <?php
        // Palabras para adivinar
        $palabras = array("CaminandoPorlaVida", "ChequealPortamor", "DestinooCasualidad", "LaPromesa");

        // Función para seleccionar una palabra al azar
        function seleccionarPalabra($palabras)
        {
            $indice = array_rand($palabras);
            return $palabras[$indice];
        }

        // Inicializar la sesión del juego
        function iniciarJuego($palabras)
        {
            $_SESSION['palabra'] = seleccionarPalabra($palabras);
            $_SESSION['intentos'] = 0;
            $_SESSION['letras'] = array();
        }

        // Función para mostrar la palabra con las letras adivinadas
        function mostrarPalabra()
        {
            $palabra = $_SESSION['palabra'];
            $letras = $_SESSION['letras'];

            $mostrar = '';
            for ($i = 0; $i < strlen($palabra); $i++) {
                if (in_array($palabra[$i], $letras)) {
                    $mostrar .= $palabra[$i];
                } else {
                    $mostrar .= '_';
                }
            }

            return $mostrar;
        }

        // Función para verificar si la letra adivinada está en la palabra
        function verificarLetra($letra)
        {
            $palabra = $_SESSION['palabra'];
            $_SESSION['letras'][] = $letra;

            if (strpos($palabra, $letra) === false) {
                $_SESSION['intentos']++;
            }
        }

        // Verificar si se ha completado la palabra o si se ha perdido
        function verificarEstado()
        {
            $palabra = $_SESSION['palabra'];
            $intentos = $_SESSION['intentos'];

            if ($intentos >= 6) {
                echo '<div class="alert alert-danger">¡Has perdido! La palabra era: ' . $palabra . '</div>';
                session_destroy();
            } elseif (mostrarPalabra() == $palabra) {
                echo '<div class="alert alert-success">¡Felicidades! Has adivinado la palabra: ' . $palabra . '</div>';
                session_destroy();
            }
        }

        // Manejar la entrada del usuario
        if (isset($_POST['letra'])) {
            $letra = $_POST['letra'];
            verificarLetra($letra);
        }

        // Iniciar el juego si no hay una palabra seleccionada
        if (!isset($_SESSION['palabra'])) {
            iniciarJuego($palabras);
        }

        // Mostrar la palabra y el estado actual del juego
        echo '<p>Palabra: ' . mostrarPalabra() . '</p>';
        echo '<p>Intentos restantes: ' . (6 - $_SESSION['intentos']) . '</p>';
        ?>

        <!-- Formulario para ingresar una letra -->
        <form method="post" action="" class="mb-3">
            <div class="input-group">
                <input type="text" name="letra" maxlength="1" class="form-control" required>
                <button type="submit" class="btn btn-primary">Adivinar</button>
            </div>
        </form>

        <?php
        verificarEstado();
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>