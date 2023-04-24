<?php
include("plantillaMenu.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <center>
        <h1>Bienvenido a tu perfil, <?php echo $nombre ?>.</h1>
        <br><br>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php echo '<img src="data:image/jpg;base64,' . base64_encode($profile_picture) . '" alt="' . $username . '" class="img-fluid rounded-circle" style="width: 300px; height: 300px;">' ?>
                <hr>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fileToUpload" class="form-label">Cambiar foto de perfil</label>
                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
                    </div>
                    <button type="submit" class="btn btn-primary">Subir</button>
                </form>
            </div>
            <div class="col-md-9">
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