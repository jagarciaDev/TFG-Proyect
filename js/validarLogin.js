function validarFormulario() {
    var usuario = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();

    if (usuario === "" || password === "") {
        alert("Por favor, complete todos los campos.");
        return false;
    }

    return true;
}
