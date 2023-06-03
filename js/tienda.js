function borrarCarrito() {
    // Realizar la solicitud AJAX para borrar el carrito
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "borrar_carrito.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Actualizar el contenido del carrito en el modal
            var modalBody = document.getElementById("carritoModalBody");
            modalBody.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}