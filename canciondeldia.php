<?php
session_start();

// Palabras para adivinar
$palabras = array("melendi");

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
        echo '¡Has perdido! La palabra era: ' . $palabra;
        session_destroy();
    } elseif (mostrarPalabra() == $palabra) {
        echo '¡Felicidades! Has adivinado la palabra: ' . $palabra;
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
echo 'Palabra: ' . mostrarPalabra() . '<br>';
echo 'Intentos restantes: ' . (6 - $_SESSION['intentos']) . '<br>';

// Mostrar el formulario para ingresar una letra
?>
<form method="post" action="">
    <input type="text" name="letra" maxlength="1" required>
    <input type="submit" value="Adivinar">
</form>

<?php
verificarEstado();
?>