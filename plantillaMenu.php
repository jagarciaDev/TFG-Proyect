<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Melendi Página Oficial</title>

    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    document.addEventListener('dragstart', function(evt) {
        if (evt.target.tagName == 'IMG') {
            evt.preventDefault();
        }
    });
    </script>

    <style>
    * {
        user-select: none;
        font-family: "Pathway Gothic One";
        font-size: 22px;
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid">
            <!-- Imagen centrada en la izquierda -->
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Logo" width="130" height="50"
                    class="d-inline-block align-text-top logo-img">
            </a>
            <!-- Botón para menú responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="gira.php">Gira</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tienda.php">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="discografia.php">Discografía</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <?php
                session_start();

                // Verifica si el usuario ha iniciado sesión
                if (isset($_SESSION['username'])) {
                    // Si ha iniciado sesión, muestra el nombre de usuario
                    echo '<ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="login.php">' . $_SESSION['username'] . '</a>
            </li>
          </ul>';
                } else {
                    // Si no ha iniciado sesión, muestra el enlace para iniciar sesión o registrarse
                    echo '<ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Inicia sesión o Registrate</a>
            </li>
          </ul>';
                }
                ?>
            </div>

        </div>
    </nav>
</body>

</html>