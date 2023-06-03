<?php
session_start();

if (isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array(); // Borra el contenido del carrito
}
?>

<?php if (empty($_SESSION["carrito"])) : ?>
    <p>No hay productos en el carrito.</p>
<?php else : ?>
    <ul>
        <?php foreach ($_SESSION["carrito"] as $producto) : ?>
            <li><?php echo $producto["nombre"]; ?> - <?php echo $producto["precio"]; ?>€</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>