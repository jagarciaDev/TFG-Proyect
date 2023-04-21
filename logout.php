<?php
session_start();
session_destroy();
header("location: index.php"); // redirige al usuario a la página de inicio
exit;