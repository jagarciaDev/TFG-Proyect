const form = document.getElementById('formulario');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', function (event) {
    event.preventDefault(); // evita que se envíe el formulario

    if (username.value === '' || password.value === '') {
        alert('Por favor ingresa ambos usuario y contraseña');
        username.value = ''; // borra el valor del input de usuario
        password.value = ''; // borra el valor del input de contraseña
    } else {
        enviarFormulario();
    }
});

function enviarFormulario() {
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status === 200) {
            form.reset();
        }
    };
    xhr.open('POST', 'inicioSesion.php');
    xhr.send(formData);
}
