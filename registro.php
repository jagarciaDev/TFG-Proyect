<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Melendi Página Oficial</title>

    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
    include("plantillaMenu.php");
    ?>
    <div class="container">
        <form id="formulario" method="POST" action="inicioSesion.php" onsubmit="return validarFormulario()" enctype="multipart/form-data">

            <label for="nombre_apellidos">Nombre y Apellidos:</label>
            <input type="text" id="nombre_apellidos" name="nombre_apellidos" autocomplete="off">

            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" autocomplete="off">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" autocomplete="off">

            <label for="email">Correo Electrónico:</label>
            <input type="text" id="correo" name="correo" autocomplete="off">

            <label for="imagen" class="form-label">Foto de perfil:</label>
            <input class="form-control" type="file" id="foto_perfil" accept="image/*" name="foto_perfil">

            <br>
            <p>¿Tienes cuenta? <a href="login.php">Inicia Sesión</a>.</p>
            <input type="submit" value="Registrarse">

        </form>
    </div>

    <script>
        function validarFormulario() {
            const form = document.getElementById('formulario');
            const nombreApellidos = document.getElementById('nombre_apellidos');
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const correo = document.getElementById('correo');

            if (
                nombreApellidos.value === '' ||
                username.value === '' ||
                password.value === '' ||
                correo.value === ''
            ) {
                alert('Por favor, completa todos los campos');
                return false;
            }

            if (!validarNombreApellidos(nombreApellidos.value)) {
                alert('El nombre y apellidos solo deben contener letras');
                return false;
            }

            if (!validarUsuario(username.value)) {
                alert('El usuario debe contener solo letras y números, sin espacios');
                return false;
            }

            if (!validarContrasena(password.value)) {
                alert('La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número');
                return false;
            }

            if (!validarCorreoElectronico(correo.value)) {
                alert('Por favor, ingresa un correo electrónico válido');
                return false;
            }

            return true; // Permitir el envío del formulario
        }

        function validarNombreApellidos(nombreApellidos) {
            const regex = /^[a-zA-Z\s]+$/; // Solo letras y espacios
            return regex.test(nombreApellidos);
        }

        function validarUsuario(usuario) {
            const regex = /^[a-zA-Z0-9]+$/; // Solo letras y números, sin espacios
            return regex.test(usuario);
        }

        function validarContrasena(contrasena) {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/; // Al menos 8 caracteres, una mayúscula, una minúscula y un número
            return regex.test(contrasena);
        }

        function validarCorreoElectronico(correo) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Patrón básico de correo electrónico
            return regex.test(correo);
        }
    </script>
</body>

</html>