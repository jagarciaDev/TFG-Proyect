<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
    include("gira.php");
    ?>
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
                    <form id="concertForm" method="POST" action="insertarConcierto.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="concertName">Lugar del concierto</label>
                                <input type="text" class="form-control" id="concertName" name="concertName" placeholder="Ingrese el nombre del concierto">
                            </div>
                            <div class="form-group">
                                <label for="concertDate">Fecha del concierto</label>
                                <input type="date" class="form-control" id="concertDate" name="concertDate" min="<?= date('Y-m-d') ?>">
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

    <script>
        document.getElementById('saveChangesBtn').addEventListener('click', function() {
            var concertName = document.getElementById('concertName').value;
            var concertDate = document.getElementById('concertDate').value;

            // Redirigir al usuario a la página PHP para insertar los datos
            window.location.href = 'insertar_concierto.php?name=' + encodeURIComponent(concertName) + '&date=' +
                encodeURIComponent(concertDate);
        });
    </script>
</body>

</html>