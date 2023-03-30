<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión | Melendi Página Oficial</title>

    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php include("plantillaMenu.php"); ?>
    <div class="container">
        <form id="formulario" action="inicioSesion.php">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" autocomplete="off">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" autocomplete="off">
            <p></p>
            <input type="submit" value="Acceder" onclick="validarFormularioLogin()">
        </form>
    </div>

    <!-- Link Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/validarLogin.js"></script>
</body>

</html>