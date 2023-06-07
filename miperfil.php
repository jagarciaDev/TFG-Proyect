<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil | Melendi Página Oficial</title>

    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
</head>

<body>
    <?php
    include("plantillaMenu.php");
    ?>

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="imagen-perfil">
                <br>
                <?php echo '<img id="profileImage" src="data:image/jpg;base64,' . base64_encode($profile_picture) . '" alt="' . $username . '" class="img-fluid rounded-circle" style="width: 300px; height: 300px;">'; ?>
                <hr>
                <label class="form-label">Foto de perfil</label><br>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambiar foto de perfil</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar foto de perfil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="fotoperfil" method="POST" action="actualizarFotoPerfil.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" id="imagen" accept="image/*" name="imagen">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-secondary">Cambiar foto de perfil</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9" id="usuario-detalles">
                <center>
                    <h1>Bienvenido a tu perfil, <?php echo $nombre ?>.</h1>
                    <br><br>
                </center>
                <form>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $nombre; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $credenciales; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>