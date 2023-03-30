function validarFormularioLogin() {
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
            // aquí puedes hacer algo si la validación pasa
            alert('El formulario se envió correctamente');
            window.location.href = 'index.php';
        }
    });
};


