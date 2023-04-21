<?php
include("plantillaMenu.php");

if (!isset($_SESSION["nombre_usuario"])) {
    // El usuario no está logueado, deshabilitar el select
    echo "<script>
    document.getElementById('select1').setAttribute('disabled', true);
    </script>";
} else {
    // El usuario está logueado, habilitar el select
    echo "<script>document.getElementById('select1').removeAttribute('disabled');
    </script>";
}

//Conexión a BD
$conexion = mysqli_connect("localhost", "root", "", "tfg");

$id = $_GET['id'];
$sql = "SELECT * FROM gira WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas | Melendi Página Oficial</title>

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />

</head>

<body>
    <?php
    $lugar = $fila['lugar'];
    echo "<center><h1>Melendi en " . $lugar;
    ?>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form>
                    <div class="mb-3">
                        <label for="select1" class="form-label">Front Stage</label>
                        <select class="form-select float-start" id="select1" name="select1">
                            <option value="" selected>Selecciona número de entradas...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                    </div><br><br>
                    <button type="submit" class="btn btn-primary">Comprar Entradas</button>
                    <button type="submit" class="btn btn-warning" formaction="gira.php">Volver</button>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="float-end">
                    <?php
                    $ruta_imagen = $fila['foto'];
                    echo '<img src="data:image/jpg;base64,' . base64_encode($ruta_imagen) . '" alt="Imagen"  style="width: 400px; float: right;">';
                    mysqli_close($conexion);
                    ?>

                </div>
            </div>
        </div>
    </div>

    <br>
    <footer class="bg-dark text-light py-3 fixed-bottom">
        <div class="container text-center">
            <p>&copy; Copyright 2023 Sony Music Entertainment España,
                S.L. Reservados todos los derechos | Protección de datos |
                Condiciones generales</p>
        </div>
    </footer>
</body>

</html>