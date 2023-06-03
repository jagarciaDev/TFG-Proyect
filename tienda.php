<?php
include("plantillaMenu.php");

if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php");
    exit();
};

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta SQL para obtener los datos de la tabla de productos para mostrar CAMISETAS
$sql = "SELECT * FROM productos WHERE descripcion = 'Camiseta'";

// Ejecutar la consulta y obtener el resultado
$result = mysqli_query($conn, $sql);

// Verificar si el carrito existe en la sesión
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}

// Obtener el contenido del carrito
$carrito = $_SESSION["carrito"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Melendi Página Oficial</title>

    <link rel="stylesheet" type="text/css" href="css/tienda.css">

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <center>
        <h1>Bienvenidos a la Tienda Oficial de Melendi</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-basket-fill"></i>
        </button>
    </center>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="borrarCarrito()"></button>
                </div>
                <div class="modal-body" id="carritoModalBody">
                    <?php if (empty($carrito)) : ?>
                        <p>No hay productos en el carrito.</p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($carrito as $producto) : ?>
                                <li><?php echo $producto["nombre"]; ?> - <?php echo $producto["precio"]; ?>€</li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <?php if (!empty($carrito)) : ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="borrarCarrito()">Eliminar productos</button>
                        <form action="comprarproducto.php" method="POST">
                            <?php foreach ($carrito as $producto) : ?>
                                <input type="hidden" name="nombre_producto[]" value="<?php echo $producto["nombre"]; ?>">
                                <input type="hidden" name="precio_producto[]" value="<?php echo $producto["precio"]; ?>">
                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-primary">Realizar Compra</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function borrarCarrito() {
            // Aquí puedes agregar el código para borrar el contenido del carrito, por ejemplo:
            <?php $_SESSION["carrito"] = array(); ?>
        }
    </script>

    <hr>
    <main>
        <section id="fotos" class="py-2">
            <h2 class="text-center mb-4">Nuestras camisetas</h2>
            <div class="row justify-content-center">
                <?php
                // Verificar si hay registros devueltos
                if (mysqli_num_rows($result) > 0) {
                    // Recorrer los registros y mostrar los datos
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card">
                                <img src="images/tienda/<?php echo $row["nombre_producto"]; ?>.jpg" class="card-img-top" alt="Camiseta 1">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $row["nombre_producto"]; ?></h5>
                                    <p class="card-text text-center"><?php echo $row["precio"]; ?>€</p>
                                    <div class="card-body text-center">
                                        <form action="agregar_al_carrito.php" method="POST" class="d-grid">
                                            <input type="hidden" name="nombre_producto" value="<?php echo $row["nombre_producto"]; ?>">
                                            <input type="hidden" name="precio_producto" value="<?php echo $row["precio"]; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-bag-heart-fill"></i> Agregar al carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No se encontraron productos.";
                }
                ?>
            </div>
        </section>
    </main>
    <main>
        <section id="discos" class="py-2">
            <h2 class="text-center mb-4">Compra los discos de Melendi</h2>
            <div class="row justify-content-center">
                <?php
                // Consulta SQL para obtener los datos de la tabla de productos para mostrar DISCOS
                $sql1 = "SELECT * FROM productos WHERE descripcion = 'Disco'";

                // Ejecutar la consulta y obtener el resultado
                $result1 = mysqli_query($conn, $sql1);
                // Verificar si hay registros devueltos
                if (mysqli_num_rows($result1) > 0) {
                    // Recorrer los registros y mostrar los datos
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card">
                                <img src="images/tienda/<?php echo $row["nombre_producto"]; ?>.jpg" class="card-img-top" alt="Discos">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $row["nombre_producto"]; ?></h5>
                                    <p class="card-text text-center"><?php echo $row["precio"]; ?>€</p>
                                    <div class="card-body text-center">
                                        <form action="agregar_al_carrito.php" method="POST" class="d-grid">
                                            <input type="hidden" name="nombre_producto" value="<?php echo $row["nombre_producto"]; ?>">
                                            <input type="hidden" name="precio_producto" value="<?php echo $row["precio"]; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-bag-heart-fill"></i> Agregar al carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No se encontraron productos.";
                }
                ?>
            </div>
        </section>
        <footer class="bg-dark text-light py-3" style="position: relative;">
            <div class="container text-center">
                <p>&copy; <?php echo date("Y"); ?> Sony Music Entertainment España, S.L. Reservados todos los derechos |
                    Protección de datos | Condiciones generales</p>
            </div>
        </footer>
    </main>
    <script src="js/tienda.js"></script>
</body>

</html>