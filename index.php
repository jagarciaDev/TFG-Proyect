<?php
include("plantillaMenu.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    #video-background {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1;
    }
    </style>
</head>

<body>
    <video id="video-background" autoplay muted loop>
        <source src="images\video\videofondo.mp4" type="video/mp4">
    </video>

</body>

</html>