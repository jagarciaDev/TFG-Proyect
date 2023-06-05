let productosEnCarrito = [];

document.addEventListener("DOMContentLoaded", function () {
    const agregarCarritoButtons = document.querySelectorAll(".agregar-carrito");

    agregarCarritoButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const producto = this.getAttribute("data-producto");
            const precio = this.getAttribute("data-precio");

            productosEnCarrito.push({ nombre: producto, precio: precio });

            setModalContent(producto, precio);
            showModal();
        });
    });

    const botonComprar = document.querySelector("#exampleModal .btn-primary");
    botonComprar.addEventListener("click", function () {
        mostrarProductosEnCarrito();
    });

    const botonEliminarCarrito = document.querySelector("#exampleModal .btn-warning");
    botonEliminarCarrito.addEventListener("click", function () {
        eliminarCarrito();
    });
});

function setModalContent(nombreProducto, precioProducto) {
    const modalTitle = document.getElementById("exampleModalLabel");
    modalTitle.innerText = "Producto agregado al carrito";
}

function showModal() {
    const modal = new bootstrap.Modal(document.getElementById("exampleModal"));
    modal.show();
}

function mostrarProductosEnCarrito() {
    const carritoModal = document.querySelector("#exampleModal .modal-body ul");
    carritoModal.innerHTML = "";

    productosEnCarrito.forEach(function (producto) {
        const li = document.createElement("li");
        const spanProducto = document.createElement("span");
        spanProducto.textContent = producto.nombre;
        const spanPrecio = document.createElement("span");
        spanPrecio.textContent = `Precio: ${producto.precio}€`;

        li.appendChild(spanProducto);
        li.appendChild(document.createElement("br"));
        li.appendChild(spanPrecio);
        carritoModal.appendChild(li);
    });
}

function eliminarCarrito() {
    productosEnCarrito = [];
    const carritoModal = document.querySelector("#exampleModal .modal-body ul");
    carritoModal.innerHTML = "";
}