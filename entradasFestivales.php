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
                <br>
                <form action="comprarEntradas.php" method="POST" onsubmit="return validarFormulario()">
                    <input type="hidden" name="totalPrice" id="totalPriceInput" value="0">
                    <div class="mb-3">
                        <input type="hidden" name="precio_entrada1" value="55">
                        <label for="select1" class="form-label">Front Stage (55€)</label>
                        <select class="form-select float-start" id="select1" name="select1" onchange="calcularPrecio()">
                            <option value="" selected>Selecciona número de entradas...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div><br><br>

                    <div class="mb-3">
                        <label for="select2" class="form-label">Grada general (40€)</label>
                        <select class="form-select float-start" id="select2" name="select2" onchange="calcularPrecio()">
                            <option value="" selected>Selecciona número de entradas...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div><br><br>

                    <div class="mb-3">
                        <label for="select3" class="form-label">Anfiteatro (35€)</label>
                        <select class="form-select float-start" id="select3" name="select3" onchange="calcularPrecio()">
                            <option value="" selected>Selecciona número de entradas...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <br><br>
                    <!-- Mostrar dinámicamente el precio total -->
                    <p>Precio total: <span id="totalPrice">0</span>€</p>
                    <button type="submit" class="btn btn-primary">Realizar Compra</button>
                    <button type="button" class="btn btn-warning" onclick="window.history.back()">Volver</button>
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
    <script src="js/precioEntradas.js"></script>
</body>

</html>