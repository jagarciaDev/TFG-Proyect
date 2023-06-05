<?php
include("plantillaMenu.php");

if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php");
    exit();
}

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
                    <h5 class="modal-title" id="exampleModalLabel">Carrito de compras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="carrito"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="eliminarCarrito()">Eliminar carrito</button>
                    <button type="button" class="btn btn-primary">Agregar al carrito</button>
                    <button type="button" class="btn btn-success" onclick="comprar()">Comprar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function comprar() {
            const productos = productosEnCarrito.map(producto => `${producto.nombre}:${producto.precio}`);
            const url = "comprarproducto.php?productos=" + encodeURIComponent(productos.join(","));

            window.location.href = url;
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
                                        <form class="d-grid">
                                            <input type="hidden" name="nombre_producto" value="<?php echo $row["nombre_producto"]; ?>">
                                            <input type="hidden" name="precio_producto" value="<?php echo $row["precio"]; ?>">
                                            <button type="button" class="btn btn-primary agregar-carrito" data-producto="<?php echo $row["nombre_producto"]; ?>" data-precio="<?php echo $row["precio"]; ?>"><i class="bi bi-bag-heart-fill"></i> Agregar al carrito</button>
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
                // Consulta SQL para obtener los datos de la tabla de productos para mostrar CAMISETAS
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
                                        <form action="comprarproducto.php" method="POST" class="d-grid">
                                            <input type="hidden" name="nombre_producto" value="<?php echo $row["nombre_producto"]; ?>">
                                            <input type="hidden" name="precio_producto" value="<?php echo $row["precio"]; ?>">
                                            <button type="button" class="btn btn-primary agregar-carrito" data-producto="<?php echo $row["nombre_producto"]; ?>" data-precio="<?php echo $row["precio"]; ?>"><i class="bi bi-bag-heart-fill"></i> Agregar al carrito</button>
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
                <script src="js/tienda.js"></script>
</body>

</html>