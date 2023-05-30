function calcularPrecio() {
    var select1 = document.getElementById("select1");
    var select2 = document.getElementById("select2");
    var select3 = document.getElementById("select3");

    var precioUnitario1 = 55; // Precio por entrada para select1
    var precioUnitario2 = 40; // Precio por entrada para select2
    var precioUnitario3 = 35; // Precio por entrada para select3

    var indice1 = select1.selectedIndex;
    var indice2 = select2.selectedIndex;
    var indice3 = select3.selectedIndex;

    var cantidad1 = select1.options[indice1].value;
    var cantidad2 = select2.options[indice2].value;
    var cantidad3 = select3.options[indice3].value;

    var total1 = precioUnitario1 * cantidad1;
    var total2 = precioUnitario2 * cantidad2;
    var total3 = precioUnitario3 * cantidad3;

    var totalPrice = total1 + total2 + total3;

    document.getElementById("totalPrice").innerText = totalPrice;

    // Actualizar el valor del campo oculto con el precio total
    document.getElementById('totalPriceInput').value = totalPrice;
}
