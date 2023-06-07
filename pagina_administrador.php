<?php
include("gira.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gira (Administrador) | Melendi Página Oficial</title>


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

    <center>
        <!-- Boton MODAL -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar concierto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar concierto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="concertForm" method="POST" action="insertarConcierto.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="concertName">Lugar del concierto</label>
                                <input type="text" class="form-control" id="concertName" name="concertName" placeholder="Ingrese el nombre del concierto">
                            </div>
                            <div class="form-group">
                                <label for="concertDate">Fecha del concierto</label>
                                <input type="date" class="form-control" id="concertDate" name="concertDate" min="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Cartel del concierto</label>
                                <input class="form-control" type="file" id="imagen" accept="image/*" name="imagen">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </center>
</body>

</html>