<?php
include("plantillaMenu.php");

if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php");
    exit();
}
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
    </center>
    <hr>
    <main>
        <section id="fotos" class="py-5">
            <h2 class="text-center mb-4">Nuestras camisetas</h2>
            <div class="row justify-content-center">
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="images\tienda\camiseta-lagrimas-des.jpg" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body">
                            <h5 class="card-title text-center">Camiseta "Lágrimas desordenadas"</h5>
                            <p class="card-text text-center">20€</p>
                            <div class="card-body text-center">
                                <form action="comprarproducto.php" method="POST" class="d-grid">
                                    <input type="hidden" name="nombre_producto" value='Camiseta "Lágrimas desordenadas"'>
                                    <input type="hidden" name="precio_producto" value="20€">
                                    <button type="submit" class="btn btn-primary">Comprar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="images\tienda\camiseta-la-promesa.jpg" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body">
                            <h5 class="card-title text-center">Camiseta "La Promesa"</h5>
                            <p class="card-text text-center">15€</p>
                            <div class="card-body text-center">
                                <form action="comprarproducto.php" method="POST" class="d-grid">
                                    <input type="hidden" name="nombre_producto" value='Camiseta "La Promesa"'>
                                    <input type="hidden" name="precio_producto" value="15€">
                                    <button type="submit" class="btn btn-primary">Comprar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="images\tienda\camiseta-guerrero.jpg" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body">
                            <h5 class="card-title text-center">Camiseta "¡Guerrero!</h5>
                            <p class="card-text text-center">30€</p>
                            <div class="card-body text-center">
                                <form action="comprarproducto.php" method="POST" class="d-grid">
                                    <input type="hidden" name="nombre_producto" value="Camiseta ¡Guerrero!">
                                    <input type="hidden" name="precio_producto" value="30€">
                                    <button type="submit" class="btn btn-primary">Comprar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>




    <footer class="bg-dark text-light py-3" style="position: relative;">
        <div class="container text-center">
            <p>&copy; Copyright 2023 Sony Music Entertainment España, S.L.
                Reservados todos los derechos | Protección de datos | Condiciones generales</p>
        </div>
    </footer>
</body>

</html>