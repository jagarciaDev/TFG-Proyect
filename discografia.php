<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discografía | Melendi Página Oficial</title>
    <link rel="stylesheet" type="text/css" href="css/discografia.css">
    <!-- Icono página -->
    <link rel="shortcut icon" href="images/portadaUltimoDisco.ico" />
    <style>
        #form {
            width: 250px;
            margin: 0 auto;
            height: 50px;
        }

        #form p {
            text-align: center;
        }

        #form label {
            font-size: 20px;
        }

        input[type="radio"] {
            display: none;
        }

        label {
            color: grey;
        }

        .clasificacion {
            direction: rtl;
            unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover~label {
            color: orange;
        }

        input[type="radio"]:checked~label {
            color: orange;
        }
    </style>
</head>

<body>
    <?php include("plantillaMenu.php"); ?>
    <center>
        <h1>Discografia completa de Melendi</h1>
        <b>Álbumes de estudio</b>
        <hr>
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <article>
                <img src="images/2003.jpg">
                <img src="images/disco1.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Sin Noticias de Holanda"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/3iQWCOqfiOEh5bXqbGD9oB?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            <article>
                <img src="images/2005.jpg">
                <img src="images/disco2.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Que el cielo espere sentao"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/1nRo70xzejpUW36UNp0ZF8?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <article>
                <img src="images/2006.jpg">
                <img src="images/disco3.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Mientras no cueste trabajo"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/1PkZwt6uyYDzoI3N87QgDn?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Mientras no cueste trabajo">
                                <div class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio1" class="form-check-label">★</label>
                                    <input id="radio2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio2" class="form-check-label">★</label>
                                    <input id="radio3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio3" class="form-check-label">★</label>
                                    <input id="radio4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio4" class="form-check-label">★</label>
                                    <input id="radio5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <article>
            <img src="images/2008.jpg">
            <img src="images/disco4.jpg">
        </article>
        <article>
            <img src="images/2010.jpg">
            <img src="images/disco5.jpg">
        </article>
        <br><br><br>
        <article>
            <img src="images/2012.jpg">
            <img src="images/disco6.jpg">
        </article>
        <article>
            <img src="images/2014.jpg">
            <img src="images/disco7.jpg">
        </article>
        <article>
            <img src="images/2016.jpg">
            <img src="images/disco8.jpg">
        </article>
        <article>
            <img src="images/2018.jpg">
            <img src="images/disco9.jpg">
        </article>
        <article>
            <img src="images/2019.jpg">
            <img src="images/disco10.jpg">
        </article>
        <br><br><br>
        <article>
            <img src="images/2021.jpg">
            <img src="images/disco11.jpg">
        </article>
        <br><br><br>
    </center>
    <footer class="bg-dark text-light py-3" style="position: relative;">
        <div class="container text-center">
            <p>&copy; Copyright 2023 Sony Music Entertainment España, S.L.
                Reservados todos los derechos | Protección de datos | Condiciones generales
            </p>
        </div>
    </footer>
    <script src="js/discografia.js"></script>
</body>

</html>