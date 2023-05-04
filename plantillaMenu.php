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
                <img src="images/logo.png" alt="Logo" width="130" height="50" class="d-inline-block align-text-top logo-img">
            </a>
            <!-- Botón para menú responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                $username = isset($_SESSION["nombre_usuario"]) ? $_SESSION["nombre_usuario"] : null;
                $profile_picture = isset($_SESSION["fotoperfil"]) ? $_SESSION["fotoperfil"] : $username;
                $nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : null;
                $credenciales = isset($_SESSION["passwd"]) ? $_SESSION["passwd"] : null;
                $email = isset($_SESSION["correoelec"]) ? $_SESSION["correoelec"] : null;

                if (isset($username) && strlen($profile_picture) > 0) {
                    // Si ha iniciado sesión, muestra el nombre de usuario y un desplegable para cerrar sesión
                    echo '<ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                    if ($profile_picture === null) { // corrige el condicional
                        echo '<img src="images\default_avatar.jpg" alt="Estas aqui" class="rounded-circle" style="width: 25px; height: 25px;">'; // corrige la ruta

                    } else {
                        echo '<img src="data:image/jpg;base64,' . base64_encode($profile_picture) . '" class="rounded-circle" style="width: 25px; height: 25px;">';
                    }
                    echo '<span id="nombre-usuario">' . $username . '</span>
                        </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="miperfil.php">Mi perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="misentradas.php">Mis Entradas</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                </ul>
                </li>
                </ul>';
                } else {
                    // Si no ha iniciado sesión, muestra el enlace para iniciar sesión o registrarse
                    echo '<ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Inicia sesión o Regístrate</a>
                    </li>
                </ul>';
                }
                ?>
                <script>
                    // Comprueba si hay un usuario registrado en la sesión
                    var username = '<?php echo $username; ?>';
                    if (username) {
                        // Actualiza el contenido de la etiqueta con el nombre de usuario
                        document.getElementById('nombre-usuario').innerHTML = username;
                    }
                </script>
            </div>
        </div>
    </nav>
</body>

</html>