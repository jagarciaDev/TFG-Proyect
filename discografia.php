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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Sin Noticias de Holanda">
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

        <!-- SEPARACION DISCO -->
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
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Que El Cielo Espere Sentao"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/1nRo70xzejpUW36UNp0ZF8?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Que El Cielo Espere Sentao">
                                <div class="clasificacion">
                                    <input id="radio1_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio1_1" class="form-check-label">★</label>
                                    <input id="radio2_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio2_2" class="form-check-label">★</label>
                                    <input id="radio3_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio3_3" class="form-check-label">★</label>
                                    <input id="radio4_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio4_4" class="form-check-label">★</label>
                                    <input id="radio5_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio5_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
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
                                    <input id="radio2_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio2_1" class="form-check-label">★</label>
                                    <input id="radio2_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio2_2" class="form-check-label">★</label>
                                    <input id="radio2_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio2_3" class="form-check-label">★</label>
                                    <input id="radio2_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio2_4" class="form-check-label">★</label>
                                    <input id="radio2_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio2_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">
            <article>
                <img src="images/2008.jpg">
                <img src="images/disco4.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Curiosa La Cara de tu Padre"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/00UlhRF25elWQ4ImKuj8SI?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Curiosa La Cara de tu Padre">
                                <div class="clasificacion">
                                    <input id="radio3_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio3_1" class="form-check-label">★</label>
                                    <input id="radio3_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio3_2" class="form-check-label">★</label>
                                    <input id="radio3_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio3_3" class="form-check-label">★</label>
                                    <input id="radio3_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio3_4" class="form-check-label">★</label>
                                    <input id="radio3_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio3_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal4">
            <article>
                <img src="images/2010.jpg">
                <img src="images/disco5.jpg">
            </article>
        </a>
        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Volvamos a Emperzar"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/1O2K1CtGy9oNUPkmOKLnAx?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Volvamos a Emperzar">
                                <div class="clasificacion">
                                    <input id="radio4_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio4_1" class="form-check-label">★</label>
                                    <input id="radio4_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio4_2" class="form-check-label">★</label>
                                    <input id="radio4_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio4_3" class="form-check-label">★</label>
                                    <input id="radio4_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio4_4" class="form-check-label">★</label>
                                    <input id="radio4_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio4_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <br><br><br>
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal5">
            <article>
                <img src="images/2012.jpg">
                <img src="images/disco6.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Lagrimas Desordenadas"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/1J83k6qJHhtXaexpnJzoqr?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Lagrimas Desordenadas">
                                <div class="clasificacion">
                                    <input id="radio5_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio5_1" class="form-check-label">★</label>
                                    <input id="radio5_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio5_2" class="form-check-label">★</label>
                                    <input id="radio5_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio5_3" class="form-check-label">★</label>
                                    <input id="radio5_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio5_4" class="form-check-label">★</label>
                                    <input id="radio5_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio5_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal6">
            <article>
                <img src="images/2014.jpg">
                <img src="images/disco7.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Un Alumno Más"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/0Ggp1Xlj8V9dBz1nrQATgo?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Un Alumno Más">
                                <div class="clasificacion">
                                    <input id="radio6_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio6_1" class="form-check-label">★</label>
                                    <input id="radio6_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio6_2" class="form-check-label">★</label>
                                    <input id="radio6_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio6_3" class="form-check-label">★</label>
                                    <input id="radio6_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio6_4" class="form-check-label">★</label>
                                    <input id="radio6_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio6_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal7">
            <article>
                <img src="images/2016.jpg">
                <img src="images/disco8.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Quitate Las Gafas"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/72w6yDcGkl4i5eW5TxJJla?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Quitate Las Gafas">
                                <div class="clasificacion">
                                    <input id="radio7_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio7_1" class="form-check-label">★</label>
                                    <input id="radio7_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio7_2" class="form-check-label">★</label>
                                    <input id="radio7_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio7_3" class="form-check-label">★</label>
                                    <input id="radio7_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio7_4" class="form-check-label">★</label>
                                    <input id="radio7_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio7_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal8">
            <article>
                <img src="images/2018.jpg">
                <img src="images/disco9.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Ahora"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/2cx8aUPxZ0GvVJkJdNXeOM?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Ahora">
                                <div class="clasificacion">
                                    <input id="radio8_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio8_1" class="form-check-label">★</label>
                                    <input id="radio8_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio8_2" class="form-check-label">★</label>
                                    <input id="radio8_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio8_3" class="form-check-label">★</label>
                                    <input id="radio8_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio8_4" class="form-check-label">★</label>
                                    <input id="radio8_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio8_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal9">
            <article>
                <img src="images/2019.jpg">
                <img src="images/disco10.jpg">
            </article>
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "10:20:40"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/309uagfPtaKPwlqZgH16xD?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="10:20:40">
                                <div class="clasificacion">
                                    <input id="radio9_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio9_1" class="form-check-label">★</label>
                                    <input id="radio9_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio9_2" class="form-check-label">★</label>
                                    <input id="radio9_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio9_3" class="form-check-label">★</label>
                                    <input id="radio9_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio9_4" class="form-check-label">★</label>
                                    <input id="radio9_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio9_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEPARACION DISCO -->
        <br><br><br>
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal10">
            <article>
                <img src="images/2021.jpg">
                <img src="images/disco11.jpg">
            </article>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escucha "Likes y Cicatrices"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/450aVb02CfLVugPpSjUlWO?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <div class="modal-footer">
                        <p>Evalua el disco:</p>
                        <form action="guardar_evaluacion.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="nombre_disco" value="Likes y Cicatrices">
                                <div class="clasificacion">
                                    <input id="radio10_1" type="radio" name="estrellas" value="5" class="form-check-input">
                                    <label for="radio10_1" class="form-check-label">★</label>
                                    <input id="radio10_2" type="radio" name="estrellas" value="4" class="form-check-input">
                                    <label for="radio10_2" class="form-check-label">★</label>
                                    <input id="radio10_3" type="radio" name="estrellas" value="3" class="form-check-input">
                                    <label for="radio10_3" class="form-check-label">★</label>
                                    <input id="radio10_4" type="radio" name="estrellas" value="2" class="form-check-input">
                                    <label for="radio10_4" class="form-check-label">★</label>
                                    <input id="radio10_5" type="radio" name="estrellas" value="1" class="form-check-input">
                                    <label for="radio10_5" class="form-check-label">★</label>
                                </div>
                            </div>
                            <input type="submit" value="Guardar Evaluación" class="btn btn-primary">
                        </form><br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
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