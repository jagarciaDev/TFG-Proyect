$(document).ready(function () {
    $('.clasificacion input').click(function () {
        var rating = $(this).val();
        console.log('Calificación:', rating);
    });
});
