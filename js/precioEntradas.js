function calcularPrecio() {
    var select1 = document.getElementById("select1");
    var select2 = document.getElementById("select2");
    var select3 = document.getElementById("select3");

    var precioUnitario1 = 55; // Price per ticket for select1
    var precioUnitario2 = 40;  // Price per ticket for select2
    var precioUnitario3 = 35;  // Price per ticket for select3

    var cantidad1 = select1.value;
    var cantidad2 = select2.value;
    var cantidad3 = select3.value;

    var total1 = precioUnitario1 * cantidad1;
    var total2 = precioUnitario2 * cantidad2;
    var total3 = precioUnitario3 * cantidad3;

    var totalPrice = total1 + total2 + total3;

    document.getElementById("totalPrice").innerText = totalPrice;
}