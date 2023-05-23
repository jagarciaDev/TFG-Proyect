$(document).ready(function () {
    $('.star').click(function () {
        var rating = $(this).data('value');
        // Realizar acciones con la calificación, como enviarla al servidor
        // o actualizar la interfaz según sea necesario
        console.log('Calificación:', rating);
    });
});
